<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index() 
    {
        $datasMasuk = Kas::where('type' , 'MASUK')->sum('kas');
        $datasKeluar = Kas::where('type', 'KELUAR')->sum('kas');
        $kas = $datasMasuk - $datasKeluar;
        
        return view('dashboard' , compact('datasMasuk', 'datasKeluar', 'kas'));

    }
}
