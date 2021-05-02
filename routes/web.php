<?php
use App\Http\Controllers\Grades;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::group(['middleware'=>['guest']],function(){

    Route::get('/',function(){
        return view('auth.login');
    });
});





Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){ //...

        // Route::get('/', function () {
        //     return view('dashboard');
        // });

        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        // Route::group(['namespace'=>'Grades'], function(){ // Grades is the name of the folder containing the controller name
        //     Route::resource('Grades', 'GradeController');
        // });

        Route::resource('Grades', 'GradesController');
    });







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
