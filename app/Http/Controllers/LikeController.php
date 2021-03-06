<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Like;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //echo("<script>console.log('testing: enter store function')</script>");
        $like=new Like([
            'id'=>$request->get('id'),
            'user_name'=>$request->get('user_name')
        ]); 
        
        if($request->ajax()){
            $like_record=Like::where([
                ['id',$request->get('id')],
                ['user_name',$request->get('user_name')]
            ])->get();
            if($like_record->isEmpty()){
                $like->save();
                return Response($like_record);
            }
            else{ 
                return Response($like_record);
            }
        }
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
    }

    public function unlike(Request $request){
        if($request->ajax()){
            $like_record=Like::where([
                ['id',$request->get('id')],
                ['user_name',$request->get('user_name')]
            ]);
            //echo("<script>console.log('like_record: ".$like_record->get()."');</script>");
            $like_record->delete();
            $like_record=null;
            return Response($like_record);
        }
    }
}
