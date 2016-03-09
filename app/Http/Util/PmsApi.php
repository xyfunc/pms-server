<?php
/**
 * Created by PhpStorm.
 * User: yuzhe
 * Date: 2016/3/3
 * Time: 16:35
 */

namespace App\Http\Util;


class PmsApi {
    public static function obj2String($data){

    }

    public static function responseHeaderItem($responseHead,$str){
        $headArr = explode("\r\n", $responseHead);
        foreach ($headArr as $loop) {
            if(strpos($loop, $str) !== false){
                $edengUrl = trim(substr($loop, strlen($str) +1));
                return $edengUrl;
            }
        }
        return "";
    }


} 