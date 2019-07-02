<?php

Auth::routes();






Route::get('/getdata', 'HomeController@getAllData')->name('all.data');

// Route::get('/reset-pass', function(){
//     return view('auth.passwords.reset', ['token'=> 'hahaha', 'message' => 'hehehe']);
// });

Route::middleware(['auth'])->group(function(){

    Route::get('/', function () {return redirect('/home');});
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/dashboard-consumer', 'ConsumerController@index')->name('dashboard.consumer');

    // CONSUMER LOCATION BY CITY - KECAMATAN
    Route::get('/consumer-location', 'ConsumerController@locationsConsumer')->name('view.consumer.location');
    Route::get('/get-city-consumer', 'ConsumerController@getCityConsumer')->name('getCity.consumer');
    Route::get('/get-district-consumer', 'ConsumerController@getDistrictConsumer')->name('getDistrict.consumer');
    
    // CONSUMER LOCATION BY KTP_ID
    Route::get('/consumer-location-ktp', 'ConsumerController@locationKTPConsumer')->name('view.consumer.location.ktp');
    Route::get('/get-ktp', 'ConsumerController@getLocationKTPConsumer')->name('getKtp');
    
    Route::get('/product-type', 'ConsumerController@productType')->name('view.product.type');
    Route::get('/get-product-type', 'ConsumerController@getProductType')->name('getProductType.consumer');


    
    Route::resource('product', 'ProductMasterController');
    Route::get('/get-product-master', 'ProductMasterController@getAllProduct')->name('getAllProduct');

    Route::resource('location', 'LocationController');
    Route::get('/get-location', 'LocationController@getAllLocation')->name('getAllLocation');
    Route::get('/get-district', 'LocationController@getDistrict')->name('getDistrict');

});