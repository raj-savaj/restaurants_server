<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/','logincontroller@login');
Route::group(['middleware'=>'check'],function (){
    Route::get('Bill','RestorentController@seebill');
    Route::get('Menuorder','RestorentController@order');
    Route::get('Category','RestorentController@Categorys');
    Route::get('subcategory','RestorentController@viecategory');
    Route::get('tableseat','RestorentController@tbseat');
    Route::get('tableseat','RestorentController@seattable');
    Route::post('save','RestorentController@save');
    Route::post('savetable','RestorentController@savetable');
    Route::post('subsave','RestorentController@subsave');
    Route::post('Update','RestorentController@Update');
    Route::get('cateDelete/{Cid}','RestorentController@Cdelete');
    Route::get('CateEdit/{Cid}','RestorentController@edit');
    Route::get('subcategory','RestorentController@subCategorys');
    Route::get('sucateDelete/{scid}','RestorentController@SCdelete');
    Route::get('suCateEdit/{scid}','RestorentController@scedit');
    Route::post('subUpdate','RestorentController@subUpdate');
    Route::get('seatDelete/{stid}','RestorentController@Sdelete');
    Route::get('seatEdit/{stid}','RestorentController@stedit');
    Route::post('StUpdate','RestorentController@StUpdate');
    Route::get('Coldriks','RestorentController@coldrik');
    Route::post('coldsave','RestorentController@coldsave');
    Route::get('coldDelete/{colid}','RestorentController@Coddelete');
    Route::get('coldEdit/{colid}','RestorentController@cledit');
    Route::post('upcoldsave','RestorentController@upcoldsave');
    Route::get('FoodDish','RestorentController@FoodDishs');
    Route::post('Dishsave','RestorentController@Dishsave');
    Route::get('foodDelete/{fd_id}','RestorentController@fddelete');
    Route::get('EditDish/{fdid}','RestorentController@editDish');
    Route::post('DishUpdate','RestorentController@DishUpdate');
    Route::get("Logout",'RestorentController@Logout');
    Route::get("GST",'RestorentController@gst');
    Route::post('GST','RestorentController@gstslabs');
    Route::get('viewTable','RestorentController@viewTable');
    Route::get("AppLogo",'RestorentController@AppLogo');
    Route::post("AppLogo",'RestorentController@PostAppLogo');
    Route::get("msg",'RestorentController@msg');
    Route::post("msg",'RestorentController@Postmsg');
    Route::post("prodcutdata123",'RestorentController@prodcutdata123');
    Route::get('parsal','RestorentController@parsal');
    Route::get('sellReport','RestorentController@sellReport');
    Route::get('parsalPrint/{pid}','RestorentController@parsalPrint');
    Route::post('parsalAdd','RestorentController@parsalAdd');   
    Route::post('sellreportget','RestorentController@sellreportget');
    Route::get('Backup','RestorentController@backup');
});
Route::get('Kichansceen','RestorentController@kichen');
Route::get('Kichan-data','RestorentController@kichendata');
Route::get('serveOrder','RestorentController@orderServe');
Route::auth();


Auth::routes();

Route::get('print_bill/{id}','RestorentController@getprint');