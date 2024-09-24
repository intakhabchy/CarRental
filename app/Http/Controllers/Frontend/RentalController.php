<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use DateTime;
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
                    'cars.brand as car_brand','cars.model as car_model','cars.car_type as car_type','daily_rent_price','start_date','end_date','cancel_status','total_cost')
                    ->get();

        return view('customer.bookinglist',['bookinglist'=>$bookinglist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carlist = Car::whereNotIn('id', function ($query) {
            $query->select('car_id')
                  ->from('rentals')
                  ->where('start_date', '<', now())
                  ->where('end_date', '>', now());
        })->get();
        
        return view('customer.bookingcreate',['carlist'=>$carlist]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carid = $request->input('car');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $chkAvailStart = Rental::where('car_id', $carid)
                    ->where('start_date', '<=', $start_date)
                    ->where('end_date', '>=', $start_date)
                    ->count();

        $chkAvailEnd = Rental::where('car_id', 1)
                    ->where('start_date', '<=', $end_date)
                    ->where('end_date', '>=', $end_date)
                    ->count();

        if($chkAvailStart>0){
            return redirect()->route('customer.bookingcreate')->with('success','Car not available on this date');
        }

        if($chkAvailEnd>0){
            return redirect()->route('customer.bookingcreate')->with('success','Car not available on this date');
        }

        $dailyRent = Car::where('id','=',$carid)->select('daily_rent_price')->get();
        $dailyRent = $dailyRent[0]['daily_rent_price'];

        $userid = User::where('email','=',Auth::user()->email)->select('id')->get();
        $userid = $userid[0]['id'];

        $start_date = new DateTime($start_date);
        $end_date = new DateTime($end_date);

        $interval = $start_date->diff($end_date);

        $diffInDays = $interval->days + 1;
        $totalCost = $diffInDays*$dailyRent;

        $rentinsert = Rental::create([
            'car_id'=>$carid,
            'user_id'=>$userid,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'total_cost'=>$totalCost
        ]);

        if($rentinsert)
            return redirect()->route('customer.bookingcreate')->with('success','Booking Successful');
        else
            return redirect()->route('customer.bookingcreate')->with('success','Booking Failed');
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
