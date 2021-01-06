<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Users extends Controller
{
    //
    public function index(){
        $users = User::all();
        return response()->json($users);
    }
    public function delete($id){
        $user = User::find($id);
        $delete = $user->delete();
        if ($delete) {
            return response()->json($user);
        }
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string'
        ]);
        $user->email =  $request->email;
        $user->name =  $request->name;
        $user->role =  $request->role;
        $user->password =  bcrypt($request->password);
        $save = $user->save();
        if ($save) {
            return response()->json($user);
        }
    }

    public function user($id){
        $users = User::find($id);
        return response()->json($users);
    }
}
