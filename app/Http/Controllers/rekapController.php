<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class rekapController extends Controller
{
   
    public function index()
    {
        $datas = Kas::all();
        return view('rekap' , compact('datas'));
    }

}
