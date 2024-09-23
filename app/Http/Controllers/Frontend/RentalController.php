<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $useremail = Auth::user()->email;

        $bookinglist = Rental::join('users','users.id','=','rentals.user_id')
                    ->join('cars','cars.id','=','rentals.car_id')
                    ->where('email','=',$useremail)
                    ->select('rentals.id as rent_id','cars.name as car_name',
                    'cars.brand as car_brand','cars.model as car_model','cars.car_type as car_type','daily_rent_price','start_date','end_date','cancel_status')
                    ->get();

        return view('customer.bookinglist',['bookinglist'=>$bookinglist]);
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
        $rentalinfo = Rental::find($id);

        $rentalinfo->update([
            'cancel_status'=>1
        ]);

        return redirect()->route('customer.bookinglist')->with('success','booking cancelled');
    }
}
