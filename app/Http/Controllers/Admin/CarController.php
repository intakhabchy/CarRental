<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carlist = Car::all();
        return view('admin.carlist',['carlist'=>$carlist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.carcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        Car::create([
            'name'=>$request->input('name'),
            'brand'=>$request->input('brand'),
            'model'=>$request->input('model'),
            'year'=>$request->input('year'),
            'car_type'=>$request->input('car_type'),
            'daily_rent_price'=>$request->input('daily_rent_price'),
            'availability'=>$request->input('availability'),
            'image'=>$filePath,
        ]);

        return redirect()->back()->with('success','Car info saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Car::where('id','=',$id)->get();

        return view('admin.caredit',['carinfo'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
