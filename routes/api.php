<?php



Route::group([

    'namespace'=>'App\Http\Controllers\Admin'

], function ($router) {

    Route::apiResource('customer', 'CustomerController');

    Route::apiResource('employee', 'EmployeeController');
    Route::apiResource('supplier', 'SupplierController');
    Route::apiResource('category', 'CategoryController');
    Route::apiResource('brand', 'BrandController');
    Route::apiResource('subcategory', 'SubCategoryController');
    Route::apiResource('product', 'ProductController');
    Route::apiResource('expense', 'ExpenseController');


    Route::get('/getting/product/{id}', 'PosController@GetProduct');

    Route::get('/todaysell', 'PosController@todaysell');
    Route::get('/todayincome', 'PosController@todayincome');
    Route::get('/todaydue', 'PosController@todaydue');
    Route::get('/todayexpense', 'PosController@todayexpense');

    

    Route::get('/addtocard/{id}', 'CartController@addtocard');
    Route::get('/cart/product', 'CartController@cartproduct');
    Route::get('/remove/cart/{id}', 'CartController@removeCart');


    Route::get('/increment/{id}', 'CartController@increment');
    Route::get('/decrement/{id}', 'CartController@decrement');
    Route::get('/vat', 'CartController@vat');

    Route::post('/orderdone', 'OrderController@orderdone');

    Route::get('/order', 'OrderController@order');
    Route::get('/all/order', 'OrderController@allorder');


  
    Route::get('/delete/allorder/{id}', 'OrderController@deleteallorder');

      Route::get('/delete/order/{id}', 'OrderController@deleteorder');

    

     Route::get('/allexpense', 'ExpenseController@allexpense');






   

});