<?php

namespace App\Http\Controllers;

use App\Models\Api;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Api::all();
        return response()->json([
            'message'=>'ok',
            'data'=>$items
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item=new api;
        $item->name=$request->name;
        $item->age=$request->age;
        $item->save();
        return response()->json([
            'message'=>'Api created successfully',
            'data'=>$item
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function show(Api $api)
    {
        $item=Api::where('id',$api->id)->first();
        if($item){
            return response()->json([
                'message'=>'OK',
                'data'=>$item
            ],200);
        }else{
            return response()->json([
                'message'=>'Api not found',
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Api $api)
    {
        $item=Api::where('id',$api->id)->first();
        $item->name=$request->name;
        $item->age=$request->age;
        $item->save();
        if($item){
            return response()->json([
                'message'=>'Api updated successfully',
            ],200);
        }else{
            return response()->json([
                'message'=>'Api not found',
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api  $api
     * @return \Illuminate\Http\Response
     */
    public function destroy(Api $api)
    {
        $item=Api::where('id',$api->id)->delete();
        if($item){
            return response()->json([
                'message'=>'Api deleted successfully',
            ],200);
        }else{
        return response()->json([
            'message'=>'Api not found',
        ],404);
        }
    }
}
