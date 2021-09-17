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
use App\Employe;
use App\Pdg;
use App\Admin;


Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




 
 Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('employes', 'Admin\EmployeController');
Route::resource('demandes', 'Admin\DemandeController');
Route::resource('employe', 'Admin\EmployeController');



Route::resource('mesdemandes', 'Employe\DemandeController');

Route::get('/employe-dashboard', function () {
  return view('employe.dashboard');
})->name('employe.dashboard');


Route::get('/pdg-dashboard', function () {
  return view('pdg.dashboard');
})->name('pdg.dashboard');