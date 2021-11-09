<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use App\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $notification=DB::table('notifications')->where('isadmin',0)->get();

    return view('admin.dashboard', ['notification'=>$notification]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        (int)$a = DB::table('users')
        ->where('name',$request->employe)
        ->first()->id;

        $b=DB::table('demandes')
        ->where('id',$request->id)
        ->first()->user_id;

        $c=DB::table('users')
        ->where('id',$b)
        ->first()->name;

        $d1=DB::table('demandes')
        ->where('id',$request->id)
        ->first()->date_debut;

        $d2=DB::table('demandes')
        ->where('id',$request->id)
        ->first()->date_fin;

        $notif= new notification;
        $notif->titre = "Mr/Mme $request->employe ";
        $notif->content ="le pdg vous informe que tu remplaceras votre collège $c pandant la periode de :   $d1  /  $d2    ; Merci ";
        $notif->isadmin = 1;
        $notif->user_id = $a;

$notif->save();
$s=$request->id;


$data = [
    'nom'=>$c,
    'date1'=>$d1,
    'date2'=>$d2,
    
  ];
  $mail = DB::table('users')
        ->where('name',$request->employe)
        ->first()->email;
Mail::to($mail)->send(new WelcomeMail($data));
return redirect()->route('acceptpdg',['demande'=> $s]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
