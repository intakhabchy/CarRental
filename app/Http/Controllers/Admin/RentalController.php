<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Rental ID, Customer Name, Car Details (Name, Brand), Rental Start Date and End Date, Total Cost, Status (Ongoing, Completed, Canceled)

        $rentallist = Rental::join('cars','cars.id','=','rentals.car_id')
            ->join('users','users.id','=','rentals.user_id')
            ->select('rentals.id as id','users.name as user_name','cars.name as car_name','cars.brand as car_brand','rentals.start_date as start_date','rentals.end_date as end_date','rentals.total_cost')
            ->get();
        // echo json_encode($rentallist);return;
        return view('admin.rentallist',['rentallist'=>$rentallist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $cars = Car::all();

        return view('admin.rentalcreate',['users'=>$users,'cars'=>$cars]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carInfo = Car::find($request->input('car_id'));
        $dailyPrice = $carInfo->daily_rent_price;

        $startTimestamp = strtotime($request->input('start_date'));
        $endTimestamp = strtotime($request->input('end_date'));

        // Calculate the difference in seconds, then convert to days
        $dayDifference = ($endTimestamp - $startTimestamp) / (60 * 60 * 24);
        $totalPrice = $dayDifference*$dailyPrice;

        Rental::create([
            'car_id'=>$request->input('car_id'),
            'user_id'=>$request->input('user_id'),
            'start_date'=>$request->input('start_date'),
            'end_date'=>$request->input('end_date'),
            'total_cost'=>$totalPrice            
        ]);

        return redirect()->route('admin.rentalcreate')->with('success','Rental stored');
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

    public function getCarPrice(Request $request)
    {
        // Get car by its ID
        $car = Car::find($request->car_id);

        // Check if car exists and return the price
        if ($car) {
            return response()->json(['price' => $car->price]);
        } else {
            return response()->json(['error' => 'Car not found'], 404);
        }
    }
}
