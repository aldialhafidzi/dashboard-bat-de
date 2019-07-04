<?php

Auth::routes();






Route::get('/getdata', 'HomeController@getAllData')->name('all.data');

// Route::get('/reset-pass', function(){
//     return view('auth.passwords.reset', ['token'=> 'hahaha', 'message' => 'hehehe']);
// });

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return redirect('/home');
    });
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/dashboard-consumer', 'ConsumerController@index')->name('dashboard.consumer');

    // CONSUMER LOCATION BY CITY - KECAMATAN
    Route::get('/consumer-location', 'ConsumerController@locationsConsumer')->name('view.consumer.location');
    Route::get('/get-city-consumer', 'ConsumerController@getCityConsumer')->name('getCity.consumer');
    Route::get('/get-district-consumer', 'ConsumerController@getDistrictConsumer')->name('getDistrict.consumer');

    // CONSUMER LOCATION BY KTP_ID
    Route::get('/consumer-location-ktp', 'ConsumerController@locationKTPConsumer')->name('view.consumer.location.ktp');
    Route::get('/get-ktp', 'ConsumerController@getLocationKTPConsumer')->name('getKtp');
    Route::get('/get-ktp-2', 'ConsumerController@getLocationKTPConsumer2')->name('getKtp2');

    // CONSUMER LOCATION BY NCP
    Route::get('/consumer-location-ncp', 'ConsumerController@locationNCPConsumer')->name('view.consumer.location.ncp');
    Route::get('/get-ncp', 'ConsumerController@getLocationNCPConsumer')->name('getNcp');

    // CONSUMER LOCATION BY SS
    Route::get('/consumer-location-ss', 'ConsumerController@locationSSConsumer')->name('view.consumer.location.ss');
    Route::get('/get-ss', 'ConsumerController@getLocationSSConsumer')->name('getSs');

    // CONSUMER LOCATION BY Event
    Route::get('/consumer-location-event', 'ConsumerController@locationEventConsumer')->name('view.consumer.location.event');
    Route::get('/get-event', 'ConsumerController@getLocationEventConsumer')->name('getEvent');

    // CONSUMER LOCATION BY 121
    Route::get('/consumer-location-121', 'ConsumerController@location121Consumer')->name('view.consumer.location.121');
    Route::get('/get-121', 'ConsumerController@getLocation121Consumer')->name('get121');
    
    Route::get('/product-type', 'ConsumerController@productType')->name('view.product.type');
    Route::get('/get-product-type', 'ConsumerController@getProductType')->name('getProductType.consumer');



    Route::resource('product', 'ProductMasterController');
    Route::get('/get-product-master', 'ProductMasterController@getAllProduct')->name('getAllProduct');
    Route::get('product-export-excel', 'ProductMasterController@export_excel');

    Route::resource('location', 'LocationController');
    Route::get('/get-location', 'LocationController@getAllLocation')->name('getAllLocation');
    Route::get('location-export-excel', 'LocationController@export_excel');
    Route::get('/get-district', 'LocationController@getDistrict')->name('getDistrict');
});
