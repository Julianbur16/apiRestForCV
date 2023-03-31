<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services=service::all();
        return response()->json($services);
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
        $services = new service();
        $services->url=$request->url;
        $services->title=$request->title;
        $services->description=$request->description;
        $services->type=$request->type;
        $services->save();
        return response()->json($services);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $service)
    {
        $services=service::where('type',$service)->get();
        return $services; 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
        $service->url=$request->url;
        $service->title=$request->title;
        $service->description=$request->description;
        $service->type=$request->type;
        $service->save();

        $data=[
            "message"=>"client update successfully",
            "client"=>"$service"
        ];

        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service $service)
    {
        $services=service::find($service->id);
        $services->delete();
        $data=["message"=>"client delete successfully"];
        return response()->json($data);
    }
}
