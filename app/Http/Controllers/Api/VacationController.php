<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class VacationController extends Controller
{

    public function listbystate(Request $request){
        $data = array(
            "state" => "0",
            "message" => "待开发"
        );
        return response($data);
    }
    public function modify(Request $request){
        $data = array(
            "state" => "0",
            "message" => "待开发"
        );
        return response($data);
    }
    public function listproject(Request $request){
        $data = array(
            "state" => "0",
            "message" => "待开发"
        );
        return response($data);
    }
    public function create(Request $request){
        $data = array(
            "state" => "0",
            "message" => "待开发"
        );
        return response($data);
    }
    public function listholiday(Request $request){
        $data = array(
            "state" => "0",
            "message" => "待开发"
        );
        return response($data);
    }
    public function delete(Request $request){
        $data = array(
            "state" => "0",
            "message" => "待开发"
        );
        return response($data);
    }
}
