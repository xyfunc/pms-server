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
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 提交草稿中的工时记录
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function submit(Request $request){
        $uri = "core/TimeSheet/submit.koala";
        $paramArray = array(
            "ids[]" => $request->input("id")
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);

        return response($response);
    }

    /**
     * 删除草稿中的工时
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function delete(Request $request){
        $uri = "core/TimeSheet/delete.koala";
        $paramArray = array(
            "ids[]" => $request->input("id")
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 获取工时记录
     * core/TimeSheet/pageCalendarJson.koala
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function history(Request $request){
        $uri = "core/TimeSheet/pageCalendarJson.koala";
        $paramArray = array(
            "startDate" => $request->input("start_date"),
            "endDate" => $request->input("end_date")
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 填写工时
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request){
        $uri = "core/TimeSheet/add.koala";
        $paramArray = array(
            "state" => $request->input("state"),
            "sheetTime" => $request->input("sheet_time"),
            "lines[0].duration" => $request->input("duration"),
            "lines[0].projectId" => $request->input("project_id"),
            "lines[0].taskTypeKey" => $request->input("task_type_key"),
            "lines[0].taskSummary" => $request->input("task_summary"),
            "lines[0].timeSheetType" => $request->input("time_sheet_type"),
            "lines[0].progress" => $request->input("progress"),
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 获取工时类型
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function querylabortype(Request $request){
        $uri = "core/Select/timeSheet.koala";
        $paramArray = array(
            "sheetTime" => $request->input("sheet_time")
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 修改工时
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function modify(Request $request){
        $uri = "core/TimeSheet/selfUpdate.koala";
        $paramArray = array(
            "state" => $request->input("state"),
            "id" => $request->input("id"),
            "sheetTime" => $request->input("sheet_time"),
            "lines[0].duration" => $request->input("duration"),
            "lines[0].projectId" => $request->input("project_id"),
            "lines[0].taskTypeKey" => $request->input("task_type_key"),
            "lines[0].taskSummary" => $request->input("task_summary"),
            "lines[0].timeSheetType" => $request->input("time_sheet_type"),
            "lines[0].progress" => $request->input("progress"),
            "lines[0].id" => $request->input("lines_id"),
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

    /**
     * 计算工时长度
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function countduration(Request $request){
        $uri = "core/TimeSheet/selfUpdate.koala";
        $paramArray = array(
            "startDate" => $request->input("start_date"),
            "endDate" => $request->input("end_date"),
            "orgType" => $request->input("org_type"),
            "projectId" => $request->input("project_id"),
        );
        $array = parent::getPostArray($paramArray);
        $response = parent::api_post($uri,$array);
        return response($response);
    }

}
