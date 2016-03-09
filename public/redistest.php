<?php
/**
 * Created by PhpStorm.
 * User: yuzhe
 * Date: 2016/3/4
 * Time: 9:07
 */

//连接本地的 Redis 服务
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
echo "Connection to server sucessfully";
     //查看服务是否运行
echo "Server is running: " . $redis->ping();

//$redis->set("author","chenyuzhe");

//echo $redis->get("author");
unset($redis);

