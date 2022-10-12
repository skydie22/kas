<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as Session;


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

        Session::flash('sukses'  , 'berhasil menambah bendahara');
        return redirect()->route('manage.bendahara');
    }

  
    public function editProfile(Request $request)
    {


        $this->validate($request, [
            "name" => 'required|string',
            "email" => 'required|string|email',
            "password" => 'required|max:40',
            "foto" => "file|max:3072"
        ]);


        $id = Auth::user()->id;

        $data = User::find($id);

        $password_old  = $request->password_old;

        // Validating Password
        if (Hash::check($password_old, $data->password)) {
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password =  Hash::make($request->password);

            $filename = time() .'.jpg';
            // $data->foto = $filename;
            if ($request->foto == "") {

                $data->update();

                Session::flash('sukses' , 'berhasil mengedit profil');
                return redirect()->route('users.profile');
            } else {
                if ($request->hasFile('foto')) {
                    // $filename = $request->file('foto')->getClientOriginalName();
                    $request->file('foto')->storeAs('/galeri', $filename);

                    $data->foto = $filename;
                    $data->update();
                    
                    Session::flash('sukses' , 'berhasil mengedit profil');
                    return redirect()->back();
                }
            }
        }

        Session::flash('gagal' , 'gagal mengedit profil');
        return redirect()->back();

    }

    public function showProfile()
    {
        $data = Auth::user();

        return view('users.profile', compact("data"));
    }

    public function destroy($id)
    {
        $dataUser =User::find($id);
        $dataUser->delete();
        
        return redirect()->back();
    }

}
