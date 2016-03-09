<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Util\PmsApi;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController
{
    /**
     * 登陆接口 根据用户账号和密码换取有效 cookie
     * user_name 账号
     * password 密码
     * uri = "j_spring_security_check";
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request){
        $uri = "j_spring_security_check";
        $paramArray = array(
            "j_username" => $request->input("user_name"),
            "j_password" => $request->input('password'),
        );
        $array = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_NOBODY => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => parent::mergePostParams($paramArray),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        );
        $response = parent::api_post($uri,$array);
        $setCookie = PmsApi::responseHeaderItem($response,"Set-Cookie");
        $location = PmsApi::responseHeaderItem($response,"Location");
        $loginErrorCode =  self::getErrorCode($location);
        $data = array(
            'status' => $loginErrorCode,
            'message' => '登陆成功'
        );
        if( $loginErrorCode ){
            $data["message"] = "登陆失败，账号或者密码错误！";
        }else{
            //将获取到的 JSESSIONID 保存到 redis 队列中
            $jsessionId = self::getJsessionId($setCookie);
            session(['JSESSIONID'=>$jsessionId]);
        }
        return response($data);
    }

    /**
     * 提取字段中的 JSESSIONID 的值
     * @param $setCookie
     * @return string
     */
    public static function getJsessionId($setCookie){
        if(strpos($setCookie, "JSESSIONID") < 0){
            return "2";
        }
        $str =  explode(";",$setCookie);
        $str2 = explode("=",$str[0]);
        if(count($str2) == 2){
            return trim($str2[1]);
        }else{
            return "3";
        }

    }

    /**
     * 提取登陆接口中 返回的错误信息
     * @param $location
     * @return int
     * 返回值为 0 时表示登陆成功，即获取到有效的 JSESSIONID
     */
    public static function getErrorCode($location){
        // 如果存在 login_error 字段
        if(strpos($location, "login_error") >= 0){
            $str =  explode("?",$location);
            if(count($str) > 1){
                $str2 = explode("=",$str[1]);
                if(count($str2) == 2){
                    return (int)$str2[1];
                }else{
                    return 0;
                }
            }
        }
        return 0;
    }

}
