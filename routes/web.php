<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login',function (){
    return view ('auth.login');
});

Route::get('/register',function (){
    return view ('auth.register');
});


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){


    Route::get('/home',[

        'uses' => 'HomeController@index',

        'as'   => 'home'
    ]);

    Route::get('/categoryItem/{category_id}',[

        'uses' => 'MerchandiseController@categoryItem',

        'as'   => 'category.item'

    ]);


    Route::get('/product/{id?}',[

           'uses' => 'MerchandiseController@product',

           'as'   => 'product.{id}'
    ]);

    Route::get('/create',[

        'uses' => 'MerchandiseController@create',

        'as'   => 'merchandise.create'

    ]);

    Route::any('/add','MerchandiseController@store');

    Route::get('/edit/{id?}','MerchandiseController@edit');

    Route::any('/update/{id?}',[

        'uses' => 'MerchandiseController@update',

        'as'   => 'merchandise.update'

    ]);

    Route::delete('/delete/{id?}','MerchandiseController@destroy');

    Route::resource('merchandise', 'MerchandiseController');

    Route::any('/cart/add', [

           'uses' => 'CartController@cart',

           'as'   => 'cart.add'
        ]);

    Route::get('/cart/checkout',[

        'uses' => 'CheckoutController@index',

        'as'   => 'cart.checkout'
    ]);

    Route::post('/cart/checkout',[

        'uses' => 'CheckoutController@pay',

        'as'   => 'cart.checkout'
    ]);

});

Auth::routes();


