<?php

namespace App\Http\Controllers\Demande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Demande;
use App\Notification;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewDemande;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;



class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        switch ($role) {
           
            case 'admin':
                $demande= DB::table('demandes')
                ->Where('etat','enattente')
                ->orderBy('id', 'desc')

                ->get();
                return view('admin.demande.index', ['demande'=>$demande]);
                break;
            case 'employe':
                $demande= DB::table('demandes')
                ->where('user_id',Auth::user()->id)
                ->orderBy('id', 'desc')

                ->get();
                return view('employe.mesdemandes.index',['demande'=>$demande]);
                break;
            case 'pdg':
                $demande= DB::table('demandes')
                ->where('etat','accepterparadmin')
                ->orderBy('id', 'desc')


                ->get();
                return view('pdg.demande.index', ['demande'=>$demande]);
                    break;

            }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employe.mesdemandes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id1=Auth::user()->id;
        $test=User::where('id','=',$id1);
        $todayDate = date('m/d/Y');
        $nb=Auth::user()->nbjours_rest;

      
          


     

         request()->validate([
            'Raison'      => 'required',
            'date_debut'    => 'required|after_or_equal:'.$todayDate,
            'date_fin'      => 'required|after_or_equal:date_debut',
            'nb_jours'      => 'required|integer|between:1,'.$nb,
            
    ],
    [
        'date_debut.required' => 'il faut choisir la date de debut !',
        'date_fin.required' => 'il faut choisir la date fin !',
        'nb_jours.required' => 'il ya un probleme !',
        'date_debut.after_or_equal' => 'la date est déjà passée !',
        'date_fin.after_or_equal' => 'la date fin doit etre egale ou apres  la date debut  !',
        'nb_jours.integer' => 'il ya un probleme !',
        'Raison.required' => 'il faut donner la raison de congé !',
        'nb_jours.between' => 'le nb de jours qui vous reste  est '.$nb






    ]);
        

        
                $demande = new demande;
                $demande->date_debut = $request->date_debut;
                $demande->date_fin = $request->date_fin;
                $demande->nb_jours = $request->nb_jours;
                $demande->Raison = $request->Raison;
                $demande->etat = "enattente";
                $demande->user_id = Auth::user()->id ;
                ;


               // $ctn ="l'employer "+ toString(Auth::user()->name) +"a demander un congé de"+toString($request->nb_jours)+"jours"; 
                
               if (Auth::user()->statut!='en_conge'){
                $demande->save();
                $notif= new notification;
                $notif->titre = Auth::user()->name;
                $notif->content ="a demandé un congé";
                $notif->isadmin = 0;
$notif->save();




                return redirect()->route('demandes.index' ,$demande )->with('creerdemande','la demande est cree');

               }
               else{
                return redirect()->route('demandes.index' )->with('enconge','vous ne pouvez pas faire une demandé vous êtes en congé');

               }
                

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        return view('employe.mesdemandes.show', ['demande' => $demande]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        $etat = $demande->etat;

        switch ($etat) {
           
            case 'enattente':
                return view('employe.mesdemandes.edit', ['demande' => $demande]);

                break;
            case 'termine':
                return redirect()->route('demandes.index'  )->with('etat','seules les demandes en attente peut etre modifié');

                break;
            case 'accepterparpdg':
                return redirect()->route('demandes.index'  )->with('etat','seules les demandes en attente peut etre modifié');

                    break;
            case 'accepterparadmin':
                return redirect()->route('demandes.index'  )->with('etat','seules les demandes en attente peut etre modifié');

                        break;
            }
    
      
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        DB::table('demandes')
        ->where('id',$demande->id)
        ->update([
        
        'date_debut'    => $request->date_debut,
        'date_fin'      => $request->date_fin,
        'nb_jours'      => $request->nb_jours,
        'etat'          => $demande->etat,
        'Raison'        => $request->Raison,
        'user_id'       =>$demande->user_id,

        ]);
      

        return redirect()->route('demandes.show', $demande)->with('updateDemande', "la demande est modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect()->route('mesdemandes.index')->with('deleteDemande', 'la demande est suprimé');
    }
    
    public function accept(Demande $demande)
    {
        DB::table('demandes')
        ->where('id',$demande->id)
        ->update(['etat' => 'accepterparadmin'
        ]);
  
        $notif= new notification;
        $notif->titre ='un Admin';
        $notif->content ="a accepté une demande";
        $notif->isadmin = 1;
        $notif->user_id = $demande->user_id;

$notif->save();

return back()->with('accept', 'la demande est accepté');

    }
    
    public function refuse(Demande $demande)
    {
        DB::table('demandes')
        ->where('id',$demande->id)
        ->update(['etat' => 'refuse'
        ]);
        $notif= new notification;
        $notif->titre ='la demande';
        $notif->content ="est refusé";
        $notif->isadmin = 1;
        $notif->user_id = $demande->user_id;

$notif->save();
        return back()->with('refuse', 'la demande est refusé');
  
    }
    public function acceptpdg(Demande $demande ,Request $request)
    {
        DB::table('demandes')
        ->where('id',$demande->id)
        ->update(['etat' => 'accepterparpdg'
        ]);
        DB::table('users')
        ->where('id',$demande->user_id)

        ->update(['statut' => 'en_conge'
    ]);

    DB::table('users')
    ->where('id',$demande->user_id)
    ->decrement('nbjours_rest',$demande->nb_jours);

    $notif= new notification;
    $notif->titre ='le PDG';
    $notif->content ="a accepté votre demande";
    $notif->isadmin = 1;
    $notif->user_id = $demande->user_id;

$notif->save();





        

        return back()->with('accept', 'la demande est accepté');

      


  
    }
    
    public function refusepdg(Demande $demande)
    {
        DB::table('demandes')
        ->where('id',$demande->id)
        ->update(['etat' => 'refuse'
        ]);
        $notif= new notification;
        $notif->titre ='la demande';
        $notif->content ="est refusé";
        $notif->isadmin = 1;
        $notif->user_id = $demande->user_id;

$notif->save();
        return back()->with('refuse', 'la demande est refusé');
    }
}