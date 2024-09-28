<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerlist = User::where('role','=','customer')->get();

        return view('admin.customerlist',['customerlist'=>$customerlist]);
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
        $customerinfo = User::where('id','=',$id)->get();

        return view('admin.customerview',['customerinfo'=>$customerinfo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customerinfo = User::where('id','=',$id)->get();

        return view('admin.customeredit',['customerinfo'=>$customerinfo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customerinfo = User::find($id);

        $customerinfo->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address')
        ]);

        return redirect()->route('admin.customerlist')->with('success','Customer info updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = User::find($id);

        $customer->update([
            'delete_stat'=>1
        ]);

        return redirect()->route('admin.customerlist')->with('success','Customer deleted');
    }

    public function customerhistory(string $id){
        $customerhistory = DB::table('rentals as r')
            ->join('users as u', 'u.id', '=', 'r.user_id')
            ->join('cars as c', 'c.id', '=', 'r.car_id')
            ->where('u.id', $id)
            ->select(
                'u.name as user_name',
                'c.name as car_name',
                'c.brand as car_brand',
                'r.start_date',
                'r.end_date',
                'r.total_cost',
                'r.cancel_status'
            )
            ->get();

            $customerinfo = User::where('id','=',$id)->get();
        
            return view('admin.customerhistory',['customerhistory'=>$customerhistory,'customerinfo'=>$customerinfo]);

    }
}
