<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Frontend\UpdateFrontendRequest;
use App\Models\Frontend;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrontendRequest;
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

    public function index()
    {
        $frontends = Frontend::all()->keyBy('key');

        return view('admin.frontends.index', compact('frontends'));
    }
    public function update(FrontendRequest $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $values) {
            $frontend = Frontend::where('key', $key)->first();

            if ($frontend) {
                if ($request->hasFile("$key.image")) {
                    $frontend->clearMediaCollection('images');
                    $frontend->addMedia($request->file("$key.image"))->toMediaCollection('images');
                    $values['image'] = $frontend->getFirstMediaUrl('images');
                }

                $frontend->update(['values' => $values]);
            }
        }

        Frontend::where('key', 'like', 'opening_hours.element%')->delete();
        if (isset($data['opening_hours'])) {
            foreach ($data['opening_hours'] as $index => $values) {
                Frontend::create([
                    'key' => "opening_hours.element$index",
                    'values' => $values,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Frontend settings updated successfully!');
    }
}
