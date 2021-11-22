<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request){
        
        if(count($request->all())>0){
            $user = new User;
            $user->id = $request->id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
        }
        
        $users = User::all();
        return view('welcome', [
            'users' => $users
        ]);
    }

    public function destroy($id){
        User::findOrFail($id)->delete();

        return redirect('/');
    }
}
