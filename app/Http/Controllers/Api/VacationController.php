<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class VacationController extends BaseController
{

    /**
     * 获取休假
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function listbystate(Request $request){

        $uri = "core/Leave/selfPageJson.koala";
        $paramArray = array(
            "page" => $request->input("page"),
            "pagesize" => $request->input("page_size"),
            "state" => $request->input("state"),
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 修改休假
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function modify(Request $request){
        $uri = "core/Leave/update.koala";
        $paramArray = array(
            "projectId" => $request->input("project_id"),
            "leaveType" => $request->input("leave_type"),
            "reson" => $request->input("reson"),
            "submitType" => $request->input("submit_type"),
            "startDate" => $request->input("start_date"),
            "endDate" => $request->input("end_date"),
            "duration" => $request->input("duration"),
            "id" => $request->input("id"),
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 列出所有可以填的项目
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function listproject(Request $request){
        $uri = "core/Select/leave.koala";
        $paramArray = array();
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 填写休假
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request){
        $uri = "core/Leave/add.koala";
        $paramArray = array(
            "projectId" => $request->input("project_id"),
            "leaveType" => $request->input("leave_type"),
            "reson" => $request->input("reson"),
            "submitType" => $request->input("submit_type"),
            "startDate" => $request->input("start_date"),
            "endDate" => $request->input("end_date"),
            "duration" => $request->input("duration")
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 获取假期和对应的补休日期
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function listholiday(Request $request){
        $uri = "core/holiday/getHolidayType.koala";
        $paramArray = array(
            "startDate" => $request->input("start_date"),
            "endDate" => $request->input("end_date")
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 删除休假
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function delete(Request $request){
        $uri = "core/Leave/delete.koala";
        $paramArray = array(
            "ids[]" => $request->input("id")
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }
}
