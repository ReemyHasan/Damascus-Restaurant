<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plate;
use App\Http\Requests\StorePlateRequest;
use App\Http\Requests\UpdatePlateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Plate::query();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('title', 'LIKE', "%{$search}%");
                  });
        }

        $plates = $query->paginate(10);
        return view('admin.plates.index', compact('plates'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.plates.create', compact('categories'));
    }

    public function store(PlateRequest $request)
    {

        $plate = Plate::create($request->only(['title', 'category_id', 'description', 'price']));

        if ($request->hasFile('image')) {
            $plate->addMedia($request->file('image'))->toMediaCollection('images');
        }

        return redirect()->route('admin.plates.index')->with('success', 'Plate created successfully.');
    }

    public function edit(Plate $plate)
    {
        $categories = Category::all();
        return view('admin.plates.create', compact('plate', 'categories'));
    }

    public function show(Plate $plate)
    {
        return view('admin.plates.show', compact('plate'));
    }
    public function update(PlateRequest $request, Plate $plate)
    {


        $plate->update($request->only(['title', 'category_id', 'description', 'price']));

        if ($request->hasFile('image')) {
            $plate->clearMediaCollection('images'); // Remove old image
            $plate->addMedia($request->file('image'))->toMediaCollection('images');
        }

        return redirect()->route('admin.plates.index')->with('success', 'Plate updated successfully.');
    }
    public function destroy(Plate $plate)
    {
        abort_if(!Gate::allows('plate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $plate->delete();
        session()->flash('success', 'Plate deleted successfully!');
        return redirect()->route('admin.plates.index');
    }
}
