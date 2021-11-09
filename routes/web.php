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
use App\User;
use App\Notification;
use Carbon\Carbon;
use App\Pdg;
use App\Admin;
use App\Demande;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Demande\DemandeController;
use App\Http\Controllers\Employe\EmployeController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

Route::resource('profile', 'User\UserController');


Route::get('/', 'HomeController@index');

Route::get('/email', function () {
  Mail::to('email@email.com')->send(new WelcomeMail());
  return new WelcomeMail();
});

Route::resource('notifiactionad', 'Notification\NotificationController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('notifications', 'Notification\NotificationController');

Route::get('/forgot_password', function () {
  return view('security.forgot');
});


Route::resource('user', 'User\UserController');



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

      $stat = Auth::user()->statut;
      switch ($stat) {
         
          case 'disponible':
            return view('employe.dashboard');

              break;
          case 'en_conge':
             
            
            $todayDate = date('d/m/Y');
            if (Demande::where('user_id',Auth::user()->id )->exists()) 
            {
              $d= Demande::where('user_id',Auth::user()->id )
              ->where('etat','accepterparpdg')
              ->first()->date_fin; 
              $d = new Carbon($d);
         $d->format('d/m/Y');
         $now = Carbon::now();
         $now->format('d/m/Y');

            if ( $d ->lt ($now)  ) {
              
              DB::table('users')
              ->where('id',Auth::user()->id)
              ->update(['statut' => 'disponible'
              ]);
              DB::table('demandes')
              ->where('user_id',Auth::user()->id)
              ->where('etat','accepterparpdg')

              ->update(['etat' => 'termine'
              ]);


              $notif= new notification;
              $notif->titre ="votre congé ";
              $notif->content ="est terminé ";
              $notif->isadmin = 1;
              $notif->user_id = Auth::user()->id;
      
      $notif->save();

      return view('employe.dashboard');
        
             }
             else {
              return view('employe.dashboard');

            }
          }
          else {
            return view('employe.dashboard');

          }
           
            
        


            
           
          
            
              break;
              default:
              return view('employe.dashboard');
          }
         

    
    
          

    
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

Route::get('/search','SearchController@search');
});





