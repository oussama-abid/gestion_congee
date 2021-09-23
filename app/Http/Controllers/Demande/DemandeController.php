<?php

namespace App\Http\Controllers\Demande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Demande;
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

                ->get();
                return view('admin.demande.index', ['demande'=>$demande]);
                break;
            case 'employe':
                $demande= DB::table('demandes')
                ->where('user_id',Auth::user()->id)
                ->get();
                return view('employe.mesdemandes.index',['demande'=>$demande]);
                break;
            case 'pdg':
                $demande= DB::table('demandes')
                ->where('etat','accepterparadmin')

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
        $todayDate = date('m/d/Y');
        $nb=Auth::user()->nbjours_rest;

      
          


        $validatedData = $request->validate([

            'date_debut'    => 'required|after_or_equal:'.$todayDate,
            'date_fin'      => 'required|after_or_equal:date_debut',
            'nb_jours'      => 'required|integer|between:1,'.$nb,

        ]);

        
                $demande = new demande;
                $demande->date_debut = $request->date_debut;
                $demande->date_fin = $request->date_fin;
                $demande->nb_jours = $request->nb_jours;
                $demande->Raison = $request->Raison;
                $demande->etat = "enattente";
                $demande->user_id = Auth::user()->id ;
                ;


                
                
               
                
                $demande->save();

                return redirect()->route('demandes.index' ,$demande );
    
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
        return view('employe.mesdemandes.edit', ['demande' => $demande]);

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
      

        return redirect()->route('demandes.show', $demande)->with('updateDemande', "demande has been updated successfuly");
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
        return redirect()->route('mesdemandes.index')->with('deleteDemande', 'demande has been deleted');
    }
    
    public function accept(Demande $demande)
    {
        DB::table('demandes')
        ->where('id',$demande->id)
        ->update(['etat' => 'accepterparadmin'
        ]);
        return back();
  
    }
    
    public function refuse(Demande $demande)
    {
        DB::table('demandes')
        ->where('id',$demande->id)
        ->update(['etat' => 'refuse'
        ]);
        return back();
  
    }
    public function acceptpdg(Demande $demande)
    {
        DB::table('demandes')
        ->where('id',$demande->id)
        ->update(['etat' => 'accepterparpdg'
        ]);
        DB::table('users')
        ->where('id',$demande->user_id)
        ->decrement('nbjours_rest',$demande->nb_jours);
        return back();

      


  
    }
    
    public function refusepdg(Demande $demande)
    {
        DB::table('demandes')
        ->where('id',$demande->id)
        ->update(['etat' => 'refuse'
        ]);
        return back();
    }
}