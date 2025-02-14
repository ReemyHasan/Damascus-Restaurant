<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Frontend\UpdateFrontendRequest;
use App\Models\Frontend;
use App\Http\Controllers\Controller;
use App\Services\FrontendService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpFoundation\Response;

class FrontendController extends Controller
{
    protected $frontendService;

    public function __construct(FrontendService $frontendService)
    {
        $this->frontendService = $frontendService;
    }

    public function index()
    {
        abort_if(!Gate::allows('frontend_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $frontends = getFrontendMainKeys();

        return view('admin.frontends.index', compact('frontends'));
    }

    public function edit($key)
    {
        abort_if(!Gate::allows('frontend_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $frontend = getFrontendByKey($key);
        $elements = $frontend->elements();
        $sectionConfig = getFrontendSections($key);

        return view('admin.frontends.edit', compact('frontend', 'sectionConfig', 'elements'));
    }

    public function update(Request $request, $key)
    {
        abort_if(!Gate::allows('frontend_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
// dd($request->all());
        $frontend = getFrontendByKey($key);
        $sectionConfig = getFrontendSections($key);
        $validationRules = $this->frontendService->generateValidationRules($sectionConfig['content']);
        $validator = Validator::make($request->values['es'], $validationRules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        foreach (getAvailableLanguage() as $lang => $value) {
            $content[$lang] = $this->frontendService->processContent($request->values[$lang], $sectionConfig['content'], $frontend, $lang);
            if ($lang != 'es') {
                $content[$lang] = $this->fillImageFields($content, $lang);
            }
        }
        $frontend->update(['values' => $content]);

        if (str_starts_with($key, 'footer_')) {
            Cache::forget('footers');
        } else {
            Cache::forget('frontend_' . md5($key));
        }
        session()->flash('success', 'section updated successfully!');

        return redirect()->route('admin.frontends.index')->with('success', 'Frontend updated successfully');
    }

    public function storeElement(Request $request, $sectionKey)
    {
        abort_if(!Gate::allows('frontend_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sectionConfig = getFrontendSections($sectionKey);

        $elementValidationRules = $this->frontendService->generateValidationRules($sectionConfig['elements']);

        $validator = Validator::make($request->values['es'], $elementValidationRules);

        if ($validator->fails()) {
            session()->flash('errors', $validator->errors()->all());
            return back()->withInput();
        }
        $validatedElementData = $validator->validated();

        DB::transaction(function () use ($sectionConfig, $validatedElementData, $sectionKey) {
            $this->frontendService->storeElement($validatedElementData, $sectionConfig, $sectionKey);
        });

        if (str_starts_with($sectionKey, 'footer_')) {
            Cache::forget('footers');
        } else {
            Cache::forget('frontend_' . md5($sectionKey));
        }
        session()->flash('success', 'element added successfully!');

        return response()->json(['success' => true]);
    }

    public function editElement($sectionKey, $elementKey)
    {
        abort_if(!Gate::allows('frontend_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $frontend = getFrontendByKey($elementKey);
        $sectionConfig = getFrontendSections($sectionKey);

        return view('admin.frontends.partials.edit-elements', compact('frontend', 'sectionConfig', 'sectionKey'));
    }

    public function updateElement(Request $request, $sectionKey, $elementKey)
    {
        abort_if(!Gate::allows('frontend_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $frontend = getFrontendByKey($elementKey);
        $sectionConfig = getFrontendSections($sectionKey)['elements'];
        $elementValidationRules = $this->frontendService->generateValidationRules($sectionConfig);
        $validatedElementData=Validator::make($request->values['es'], $elementValidationRules);
        foreach (getAvailableLanguage() as $lang => $value) {
            $content[$lang] = $this->frontendService->processContent($request->values[$lang], $sectionConfig, $frontend, $lang);
            if ($lang != 'es') {
                $content[$lang] = $this->fillImageFields($content, $lang);
            }
        }
        $frontend->update(['values' => $content]);
        if (str_starts_with($sectionKey, 'footer_')) {
            Cache::forget('footers');
        } else {
            Cache::forget('frontend_' . md5($sectionKey));
        }
        return redirect()->route('admin.frontends.edit', ['key' => $sectionKey])->with('success', 'Element updated successfully');
    }

    public function destroyElement($elementKey)
    {
        abort_if(!Gate::allows('frontend_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->frontendService->deleteElement($elementKey);
        $sectionKey = explode('.', $elementKey)[0];
        if (str_starts_with($sectionKey, 'footer_')) {
            Cache::forget('footers');
        } else {
            Cache::forget('frontend_' . md5($sectionKey));
        }
        return back()->with('success', 'Element deleted successfully');
    }

    public function fillImageFields($values, $lang)
    {
        foreach ($values[$lang] as $key => $value) {
            if (str_ends_with($key, 'image') && is_null($value)) {
                $values[$lang][$key]=$values['es'][$key];
            }
        }
        return $values[$lang];
    }
}
