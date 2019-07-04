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

    //CONSUMER LOCATION BY SOURCE = ncp
    Route::get('/consumer-location-ncp', 'ConsumerController@locationNCPConsumer')->name('view.consumer.location.ncp');
    Route::get('/get-ncp', 'ConsumerController@getCityNCPConsumer')->name('getCityNCP.consumer');

    //CONSUMER LOCATION BY SOURCE = 121
    Route::get('/consumer-location-121', 'ConsumerController@location121Consumer')->name('view.consumer.location.121');
    Route::get('/get-121', 'ConsumerController@getCity121Consumer')->name('getCity121.consumer');

    //CONSUMER LOCATION BY SOURCE = event
    Route::get('/consumer-location-event', 'ConsumerController@locationEventConsumer')->name('view.consumer.location.event');
    Route::get('/get-event', 'ConsumerController@getCityEventConsumer')->name('getCityEvent.consumer');

    //CONSUMER LOCATION BY SOURCE = ss
    Route::get('/consumer-location-ss', 'ConsumerController@locationSSConsumer')->name('view.consumer.location.ss');
    Route::get('/get-ss', 'ConsumerController@getCitySSConsumer')->name('getCitySS.consumer');

    Route::get('/product-type', 'ConsumerController@productType')->name('view.product.type');
    Route::get('/get-product-type', 'ConsumerController@getProductType')->name('getProductType.consumer');



    Route::resource('product', 'ProductMasterController');
    Route::get('/get-product-master', 'ProductMasterController@getAllProduct')->name('getAllProduct');

    Route::resource('location', 'LocationController');
    Route::get('/get-location', 'LocationController@getAllLocation')->name('getAllLocation');
    Route::get('/get-district', 'LocationController@getDistrict')->name('getDistrict');
});
