<?php
/**
 * Created by PhpStorm.
 * User: yuzhe
 * Date: 2016/3/2
 * Time: 22:31
 */

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PmsController extends Controller {

    public function __construct(){

    }

    public function getName(Request $request){
        return $request->session()->get("name");
    }
    public function postParamTest(Request $request){
        $name = $request->input('name');
        session(['name' => $name]);
//        Redis::connect();
        return $name;
    }

    public function curlTest2(Request $request){

        $curl = curl_init();
        $name = "linruheng"; //$request->input('j_username');
        $password = "13145820";  //$request->input('j_password');
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://pms.foreveross.com/j_spring_security_check",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_HEADER => true,
            CURLOPT_POST => true,
            CURLOPT_COOKIEJAR => "cookie.txt",
            CURLOPT_POSTFIELDS => "j_username=$name&j_password=$password",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
        return response($response);
    }
    public function curlTest(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://pms.foreveross.com/auth/Menu/findTopMenuByUser.koala",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
//            CURLOPT_HEADER => true,
            CURLOPT_POST => true,
//            CURLOPT_COOKIEFILE => "cookie.txt",
//            CURLOPT_POSTFIELDS => "j_username=linruheng&j_password=13145820",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                'Cookie:JSESSIONID=cYAubTJHWawFSu-V-j0KcfOU'
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return response($response);
        }
    }
} 