<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class LaborController extends BaseController
{
    //state: 1.DRAFT：草稿 2.COMPLETE：已审核 3.INPUTER：退回 4.DRAFT|COMPLETE|INPUTER：审核中
    /**
     * 获取草稿、审核中、已审核、退回的工时记录
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function queryLaborByState(Request $request){
        $uri = "core/TimeSheet/selfPageJson.koala";
        $paramArray = array(
            "page" => $request->input("page"),
            "pagesize" => $request->input("page_size"),
            "state" => $request->input("state"),
        );
        $jsessionId = session('JSESSIONID');
        $array = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_NOBODY => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => parent::mergePostParams($paramArray),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "Cookie:JSESSIONID=$jsessionId",
            ),
        );
        $response = parent::api_post($uri,$array);
        return response($response);

    }

    public function submit(Request $request){
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
    public function history(Request $request){
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
    public function querylabortype(Request $request){
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
    public function countduration(Request $request){
        $data = array(
            "state" => "0",
            "message" => "待开发"
        );
        return response($data);
    }

}
