<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('car_type')) {
            $query->where('car_type', $request->car_type);
        }

        if ($request->filled('price_range')) {
            $priceRange = explode('-', $request->price_range);
            $query->whereBetween('daily_rent_price', [$priceRange[0], $priceRange[1]]);
        }

        $carlist = $query->get();

        $brandlist = Car::select('brand')->distinct()->get();
        $cartypelist = Car::select('car_type')->distinct()->get();

        return view('customer.carlist', [
            'carlist' => $carlist,
            'brandlist' => $brandlist,
            'cartypelist' => $cartypelist
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
