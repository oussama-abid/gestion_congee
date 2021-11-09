<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

        $role = Auth::user()->role;
        switch ($role) {
           
            case 'admin':
               



                return view('admin.profil', ['user'=>$user]);

                break;
            case 'employe':
             
               
                return view('employe.profil', ['user'=>$user]);

                break;
            case 'pdg':
             
                return view('pdg.profil', ['user'=>$user]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pdg.employe.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Auth::user()->role;
        switch ($role) {
           
            case 'admin':
               



                return view('admin.profiledit', ['user' => $user]);

                break;
            case 'employe':
             
               
                return view('employe.profiledit', ['user' => $user]);

                break;
            case 'pdg':
             
                return view('pdg.profiledit', ['user' => $user]);
                break;

            }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        DB::table('users')
        ->where('id',$user->id)
        ->update([

        'name'    => $request->name,
        'email'      => $request->email,
        'password' => Hash::make($request->password),
        'role'          => $user->role,
        'nbjours_tot'        => $user->nbjours_tot,
        'nbjours_rest'       =>$user->nbjours_rest,
        'statut'       =>$user->statut,


        ]);
      

        return redirect()->route('user.index', $user)->with('edit',"le profil est modifié ");
         }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $role = $user->role;
        switch ($role) {
           
            case 'admin':
                $user->delete();
                $users= DB::table('users')
                ->Where('role','admin')
                ->orderBy('id', 'desc')
                ->paginate(7);
                return view('pdg.admin.index',compact('users'))->with('delete',"l' admin est suprimé ");
                break;
            case 'employe':
                $user->delete();
                $users= DB::table('users')

                ->Where('role','employe')
                ->orderBy('id', 'desc')
                ->paginate(7);
                return view('pdg.employe.index',compact('users'))->with('delete'," l'employe est suprimé ");    
                break;
            }
          }
}
