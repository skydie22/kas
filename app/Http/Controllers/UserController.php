<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $dataUser = User::role('bendahara')->get();
        return view('users.index' , compact('dataUser'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required|string',
            "email" => 'required|string|unique:users,email',
            "password" => 'required|max:40'
        ]);

        $dataUser = new User();
        $dataUser->name = $request->name;
        $dataUser->email = $request->email;
        $dataUser->password = Hash::make($request->password);
        $dataUser->assignRole('bendahara');
        $dataUser->save();

        return redirect()->route('manage.bendahara');
    }

    public function destroy($id)
    {
        $dataUser =User::find($id);
        $dataUser->delete();
        
        return redirect()->back();
    }

}
