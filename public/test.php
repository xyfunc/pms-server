<?php
/**
 * Created by PhpStorm.
 * User: yuzhe
 * Date: 2016/3/3
 * Time: 14:13
 */

/*$curl = curl_init();
$post_data = array (
    'j_username' => 'chenyuzhe',
    'j_password' => 'SW_cyz3293323'
);
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://pms.foreveross.com/j_spring_security_check",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_HEADER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => "j_username=linruheng&j_password=13145820",
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
}*/
$arrayBase = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_HEADER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded"
    ),
);
$arrayBase33 = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_HEADER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => array(
        "set-cookies sdsdas",
    ),
);
if(is_array($arrayBase33)){
    echo "ssss";
}
var_dump(array_merge($arrayBase,$arrayBase33));