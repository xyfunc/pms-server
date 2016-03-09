<?php
/**
 * Created by PhpStorm.
 * User: yuzhe
 * Date: 2016/3/3
 * Time: 16:42
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller {
    const HOSTNAME = "http://pms.foreveross.com/";
    public function api_post($uri,$array=array()){
        $curl = curl_init();
        $array[CURLOPT_URL ] = self::HOSTNAME.$uri;
        curl_setopt_array($curl,$array );
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function mergePostParams($paramArray){
        $str = array();
        foreach($paramArray as $key=>$value){
            array_push($str,"$key=$value");
        }
        return join("&",$str);
    }
} 