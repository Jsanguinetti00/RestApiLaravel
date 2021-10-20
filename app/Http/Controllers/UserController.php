<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::All();
        return $user;
    }
    public function store(Request $request){
        $user = User::create($request->all());
        return response()->json($user,201);
    }
    public function update(Request $request, $id)
    {
        // $user = User::findOrFail($id);
        // $user->update($request->all());
        // return response()->json($user,200);
        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->avatar = $request->avatar;

        $user->save();

        return response()->json($user,200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }


    


}
