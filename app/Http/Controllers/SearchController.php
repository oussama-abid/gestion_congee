<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
    public function index()
    {
    return view('pdg.search');
    }
    public function search(Request $request)
    {
    if($request->ajax())
    {
    $output="";
    $users=DB::table('users')->where('name','LIKE','%'.$request->search."%")
    
    ->get();
    if($users)
    {
    foreach ($users as $key => $user) {
    $output.='<tr>'.
    '<td>'.$user->id.'</td>'.
    '<td>'.$user->name.'</td>'.
    '<td>'.$user->role.'</td>'.
    '<td>'.$user->email.'</td>'.
   
    '<td> <a href= '.route ('user.show',['user' => $user->id]).'" class="btn btn-warning"> show </a> </td>'.


    '</tr>';
    }
    return Response($output);
       }
       }
    }
}
