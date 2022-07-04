<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user', compact('users'));
    }

    public function updateUser(Request $request){
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
    
        return response()->json(['message' => $user->name.' status updated successfully.']);
    }
}
