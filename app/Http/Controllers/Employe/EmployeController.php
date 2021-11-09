<?php

namespace App\Http\Controllers\Employe;

use App\Employe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Mail\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class EmployeController extends Controller
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


                $users= DB::table('users')
                ->Where('role','employe')
                ->orderBy('id', 'desc')
                ->paginate(7);
                

                return view('admin.employe.index',compact('users'));

            break;
            case 'pdg':

                $users= DB::table('users')

                ->Where('role','employe')
                ->orderBy('id', 'desc')
                ->paginate(7);
                return view('pdg.employe.index',compact('users'));
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
        return view('pdg.employe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'email' => 'unique:users,email',
         
            
    ],
    [
        'email.unique' => 'email utilisé choisir un autre ',

    ]);
        $user= new user;
        $user ->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role = 'employe';

$user->save();
$data=$request['password'];
Mail::to($user->email)->send(new Password($data));
        return redirect()->route('employes.index'  )->with('ajout',"l'employe est ajouté ");
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        return view('pdg.employe.edit', ['employe' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        DB::table('users')
        ->where('id',$user->id)
        ->update([
        
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),


        ]);
      

        return redirect()->route('employes.show', $user)->with('updateuser', "demande has been updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        //
    }
}
