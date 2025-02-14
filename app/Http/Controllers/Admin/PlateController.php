<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plate;
use App\Http\Requests\StorePlateRequest;
use App\Http\Requests\UpdatePlateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlateRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $plates = Plate::all();
        return view('admin.plates.index',compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plates.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlateRequest $request)
    {

        $plate = Plate::create($request->all());

        if ($request->has('image')) {
            $plate->uploadImage($request->get('image'));
        }
        session()->flash('success', 'Plate added successfully!');
        return redirect()->route('admin.plates.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plate $plate)
    {
        return view('admin.plates.show',compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plate $plate)
    {
        return view('admin.plates.edit',compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlateRequest $request, Plate $plate)
    {
        $plate->update($request->all());
        if ($request->has('image')) {
            $plate->uploadImage($request->get('image'));
        }
        session()->flash('success', 'Plate updated successfully!');
        return redirect()->route('admin.plates.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plate $plate)
    {
        abort_if(!Gate::allows('plate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $plate->delete();
        session()->flash('success', 'Plate deleted successfully!');
        return redirect()->route('admin.plates.index');
    }
}
