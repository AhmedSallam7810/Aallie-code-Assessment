<?php

namespace App\Helpers;

trait ApiResponser{

    public function successResponse($data,$message){

        return response()->json([
            'status'=>true,
            'data'=>$data,
            'message'=>$message
        ]);

    }
    public function notFoundResponse(){

        return response()->json([
            'status'=>false,
            'message'=>'not found'
        ],404);

    }


}
