<?php
use Illuminate\Http\Request;

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
     * But with telescope using driver as database also works
     */
    dispatch(new \App\Jobs\LogUser);
    // return view('welcome');
});
Route::get('/upload-image', function(){
    return view('welcome');
});

// Route::post('/upload-image', function(Request $request){
//     // dump($request);
//     // dd(request());
//     dispatch(new \App\Jobs\UploadImages($request));
// });

Route::post('/upload-image', 'UploadImageController');
/**
 * Please note Serialization of 'Illuminate\Http\UploadedFile' is not allowed On queue
 * so the above was not successfull. But there is an approach that image upload 
 * can be done first and save on disk and then thumbnail processing can be done
 * on the images being saved with respect to a model.
 */
