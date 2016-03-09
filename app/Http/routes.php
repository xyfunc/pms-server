<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('foo',function(){
    return 'foo';
});

Route::get('/koo',function(){
    return '/koo';
})->name("hello");

Route::get("/uri",function(){
    return url("foo");
});

// Named Routes
Route::get("/name/routes",["as" => "cover",function(){
    return config("app.timezone")." 1 ".env('REDIS_PASSWORD')." 2 ".env('REDIS_HOST');
} ]);

Route::get("/redis/test",function(){
    $dtr = \Illuminate\Support\Facades\Redis::get("author");
    return $dtr;
});
Route::get("/set/session",function(){
    session_start();
    $_SESSION['views']=1;
    return ;
});
Route::get("/get/session",function(){
    echo "hello ". $_SESSION['views'];
});


Route::post("curlTest",'Test\PmsController@curlTest');
Route::post("curlTest2",'Test\PmsController@curlTest2');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//测试session
/*Route::group(['middleware' => ['web']], function () {
    //
    Route::post("/postParamTest",'Test\PmsController@postParamTest');
    Route::get("/getName",'Test\PmsController@getName');
});*/

/*
 * 1. `'prefix' => 'admin'` 表示这个路由组的 url 前缀是 /admin，也就是说中间那一行代码 `Route::get('/'` 对应的链接不是 http://fuck.io:88/ 而是
 * http://fuck.io:88/admin ，如果这段代码是 `Route::get('fuck'` 的话，那么 URL 就应该是 http://fuck.io:88/admin/fuck 。
 * 2. `'namespace' => 'Admin'` 表示下面的 `AdminHomeController@index` 不是在 `\App\Http\Controllers\AdminHomeController@index` 而是在
 * `\App\Http\Controllers\Admin\AdminHomeController@index`，加上了一个命名空间的前缀。
 * */
Route::group(['prefix' => 'api/v1', 'namespace' => 'Api','middleware' => ['web']], function(){
    Route::group(['prefix' => 'login'],function(){
         Route::post("login",'LoginController@login');
    });
    Route::group(['prefix' => 'labor'],function(){
        Route::post("listbystate",'LaborController@queryLaborByState');
        Route::post("submit",'LaborController@submit');
        Route::post("delete",'LaborController@delete');
        Route::post("history",'LaborController@history');
        Route::post("create",'LaborController@create');
        Route::post("querylabortype",'LaborController@querylabortype');
        Route::post("modify",'LaborController@modify');
        Route::post("countduration",'LaborController@countduration');
    });
    Route::group(['prefix' => 'vacation'],function(){
        Route::post("listbystate",'VacationController@listbystate');
        Route::post("modify",'VacationController@modify');
        Route::post("listproject",'VacationController@listproject');
        Route::post("create",'VacationController@create');
        Route::post("listholiday",'VacationController@listholiday');
        Route::post("delete",'VacationController@delete');
    });
    Route::group(['prefix' => 'user'],function(){
        Route::post("setpersonmessage",'UserController@setpersonmessage');
    });
});
