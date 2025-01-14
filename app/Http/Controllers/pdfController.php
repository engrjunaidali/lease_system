<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = DB::table('properties')->get();
        $count = $properties->count();
        
        return view('vendor.voyager.properties.propertiesPDF',[
            'properties'=>$properties,
            'no_of_properties'=>$count]);

        // $pdf = PDF::loadView('vendor.voyager.properties.propertiesPDF', ['properties'=>$properties]);
        // return $pdf->download('propertiesPDF.pdf');
    }

    public function search($query)
    {
        // return $query;

        $properties = DB::table('properties')->where('unit_no',$query)->get();
        return view('vendor.voyager.properties.propertiesPDF',[
            'properties'=>$properties
        ]);

        // $pdf = PDF::loadView('vendor.voyager.properties.propertiesPDF', ['properties'=>$properties]);
        // return $pdf->download('propertiesPDF.pdf');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}