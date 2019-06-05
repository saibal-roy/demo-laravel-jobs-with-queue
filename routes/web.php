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
    // logger("Hello World");
    /** synchronous job since config/queue.php is set to sync for QUEUE_CONNECTION
     * 
     * 'default' => env('QUEUE_CONNECTION', 'sync'),
     */
    // dispatch(function(){
    //     logger("Hello World");
    // });
    
    // return view('welcome');
});
