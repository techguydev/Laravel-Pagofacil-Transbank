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

Route::get('/', function () {
    return view('start');
});

Route::post('/process', 'pagofacil@process');

//Callback URL
Route::post('/callback', 'pagofacil@callback');
//End Url
Route::post('/end', 'pagofacil@end');


// Route to check orders
Route::get('/orders', function(){
    $orders = App\Order::all();
    return view('orders', compact('orders'));
});
