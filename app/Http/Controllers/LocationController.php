<?php

namespace App\Http\Controllers;

use DataTables;
use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('location_master', [ 'judul' => 'Dashboard BatDE',
                                         'page'  => 'location_master'
                            ]);
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
        $data = [
            'province'      => $request['province'],
            'regency'       => $request['regency'],
            'district'      => $request['district'],
            'village'       => $request['village'],
            'id_province'   => $request['id_province'],
            'id_regency'    => $request['id_regency'],
            'id_district'   => $request['id_district'],
            'id_village'    => $request['id_village']
        ];

        Location::insert($data);
        return response()->json(['message' => 'Location data added successfully.']);
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
        $data = Location::where('id_village', $id)->first();
        return $data;
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
        $location                   = Location::find($id);
        $location->province         = $request['province'];
        $location->regency          = $request['regency'];
        $location->district         = $request['district'];
        $location->village          = $request['village'];
        $location->id_province      = $request['id_province'];
        $location->id_regency       = $request['id_regency'];
        $location->id_district      = $request['id_district'];
        $location->id_village       = $request['id_village'];
        $location->timestamps = false;
        $location->save();
        return response()->json(['message' => 'Location data updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::destroy($id);
        return response()->json(['message' => 'Location data deleted successfully.']);
    }

    public function getDistrict()
    {
        $data = Location::distinct()->get(['district', 'id_district']);
        return $data;
    }

    public function getAllLocation()
    {
        $location     = Location::select('*');

        $datatables   = Datatables::of($location)
                            ->addIndexColumn()
                            ->addColumn('action', function($location){
                                    return '<a onclick="editLocationForm('.$location->id_village.')" style="color : #FFF;" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>'.' '.
                                            '<a onclick="deleteLocationForm('.$location->id_village.')" style="color : #FFF;" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus_data" data-backdrop="static" data-keyboard="false"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
                                    });
        return $datatables->make(true);
    }
}
