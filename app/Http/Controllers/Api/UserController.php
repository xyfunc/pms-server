<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function setpersonmessage(Request $request){
        $data = array(
            "state" => "0",
            "message" => "待开发"
        );
        return response($data);
    }
}
