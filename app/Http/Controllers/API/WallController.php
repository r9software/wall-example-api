<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=Wall::orderBy('created_date', 'desc')->paginate(25);
        return response()->json(['success' => $list], $this->successStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'wall_content' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $wall = Wall::create($input);
        $success['wall_element'] = $wall;
        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $wall=Wall::find($id);
        if($wall==null){
            return response()->json(['error' => ['message'=>'Wall content not found']], 404);
        }
        if($wall->user_id==$user['id']) {
            $wall->delete();
            return response()->json(['success' => ['message' => 'Wall content deleted']], $this->successStatus);
        }else{
            return response()->json(['error' => ['message'=>'Wall not belongs to you']], 401);
        }
        //
    }
}
