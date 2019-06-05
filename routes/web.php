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
    /** queue with async approach with database driver
     * php artisan queue:table
     * php artisan migrate
     * php artisan queue:failed-table
     * php artisan migrate
     * php artisan queue:work
     */
    /** Using callback */
    // dispatch(function(){
    //     logger("Hello World");
    // });
    /** Using Job Class */
    /** Important note : If the job class don't implement ShouldQueue then it will behave as sync and will not use the queue connection driver and no entries thus made to the jobs table.
     * One more thing if laravel horizon is being used when queue connection driver is being redis.
     */
    dispatch(new \App\Jobs\LogUser);
    // return view('welcome');
});
