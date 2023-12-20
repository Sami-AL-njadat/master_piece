<?php

namespace App\Http\Controllers;

use App\Models\coupons;
use Illuminate\Http\Request;
use App\DataTables\CouponsDataTable;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CouponsDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.coupons.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:7'],
            'discount' => ['required', 'digits:2'],
            'beginning' => ['required', ],
            'ending' => ['required', ],

        ]);
        $coupons = new coupons();


 
        $coupons->couponName = $request->name;
        $coupons->discount	 = $request->discount;
        $coupons->beginning =$request->beginning;
        $coupons->ending = $request->ending;
        $coupons->save();

        toastr('Updated Successfully', 'success');

        return redirect()->route('coupons.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function show(coupons $coupons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $coupons = coupons::findOrFail($id);
        return view('Admin.pages.coupons.edit', compact('coupons'));

 
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $request->validate([
            'name' => ['required', 'max:7'],
            'discount' => ['required', 'digits:2'],
            'beginning' => ['required',],
            'ending' => ['required',],

        ]);
        $coupons = coupons::where('id', $id)->first();



        $coupons->couponName = $request->name;
        $coupons->discount = $request->discount;
        $coupons->beginning = $request->beginning;
        $coupons->ending = $request->ending;
        $coupons->save();

        toastr('Updated Successfully', 'success');

        return redirect()->route('coupons.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $coupons = coupons::findOrFail($id);
         $coupons->delete();



        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    
    }
}
