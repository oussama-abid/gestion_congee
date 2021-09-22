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
use Illuminate\Support\Facades\Input;
use App\Employe;
use App\Pdg;
use App\Admin;
use App\Demande;
use App\Http\Controllers\Demande\DemandeController;
use App\Http\Controllers\Employe\EmployeController;



Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/forgot_password', function () {
  return view('security.forgot');
});





//admin 

Route::middleware('auth')->group(function () {

  Route::resource('demandes', 'Demande\DemandeController');

  Route::middleware('admin')->group(function () {

   Route::get('/admin-dashboard', function () {
     return view('admin.dashboard');
 });
 Route::resource('employes', 'Employe\EmployeController');
 Route::resource('employe', 'Employe\EmployeController');

 Route::get('/accept/{demande}', 'Demande\DemandeController@accept')->name('accept');
 Route::resource('accept', 'Demande\DemandeController');
 
 Route::get('/refuse/{demande}', 'Demande\DemandeController@refuse')->name('refuse');
 Route::resource('refuse', 'Demande\DemandeController');
});

});


//***************************************************************** */
//employe
Route::middleware('auth')->group(function () {


  Route::middleware('employe')->group(function () {
    Route::get('/employe-dashboard', function () {
      return view('employe.dashboard');
    });
   
    Route::resource('mesdemandes', 'Demande\DemandeController');

});

});




//***************************************************************


Route::middleware('auth')->group(function () {


  Route::middleware('pdg')->group(function () {
    Route::get('/pdg-dashboard', function () {
      return view('pdg.dashboard');
    })->name('pdg.dashboard');

});
Route::resource('demandes', 'Demande\DemandeController');
Route::resource('employes', 'Employe\EmployeController');
Route::resource('employe', 'Admin\EmployeController');
Route::resource('admins', 'Pdg\AdminController');

Route::get('/acceptpdg/{demande}', 'Demande\DemandeController@acceptpdg')->name('acceptpdg');
Route::resource('acceptpdg', 'Demande\DemandeController');

Route::get('/refusepdg/{demande}', 'Demande\DemandeController@refusepdg')->name('refusepdg');
Route::resource('refusepdg', 'Demande\DemandeController');


});





