<?php

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
Route::get('/login', function () {
    if (Auth::user()) {
        return redirect()->route('dashboard.index');
    }else{
        return view('auth.login');
    }
    
})->name('login');; 
// Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/', function () {
    return view('user.shop');
});
Route::get('/laporanorder/cari','CariLaporan@cari');
Route::get('/order/cetak_pdf/{awal}/{akhir}', 'CariLaporan@cetak_pdf');
Route::get('/history', function () {
    return view('user.history');
});
Route::get('/detail/history', function () {
    return view('user.detailhistory');
});
Route::get('/detailhistory/{id}','HistoryController@show');

Route::get('/test',function () {
   
        return view('user.history');
    
    
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' =>['auth','checkrole:admin,kasir']], 
    function(){
        Route::resource('dashboard', 'DashboardController');

        Route::resource('product', 'ProductController');

        Route::resource('variant', 'VariantController');

        Route::resource('meja', 'MejaController');

        Route::resource('kasir', 'KasirController');

        


       

    }
);
Route::group(['namespace' => 'Admin', 'prefix' => 'admin',  'middleware'=>['auth','checkrole:admin']], 
    function(){
        
        Route::resource('report', 'ReportController');

        Route::resource('user','UserController');

        


    }
);

Route::group(['middleware'=>['auth','checkrole:admin,kasir']], 
    function(){

        // Route::resource('order','OrderController');
        Route::get('/order/{any}', function () {
            return view('admin.order.index');
        })->where('any','.*');

        


    }
);


    
