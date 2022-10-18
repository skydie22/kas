<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index() 
    {
        $datasMasuk = Kas::where('type' , 'MASUK')->sum('kas');
        $datasKeluar = Kas::where('type', 'KELUAR')->sum('kas');
        $kas = $datasMasuk - $datasKeluar;

        //chart
        $this_year = Carbon::now()->format('Y');
        $chart_pemasukan = Kas::where('type', 'MASUK')->where('tanggal' , 'like' , $this_year . '%')->get();
        $chart_pengeluaran = Kas::where('type', 'KELUAR')->where('tanggal' , 'like' , $this_year . '%')->get();

        //chart masuk
        for ($i=0; $i <=12 ; $i++) { 
            $data_pemasukan[(int)$i] = 0;
        }

           foreach ($chart_pemasukan as $pemasukan) {
                $check = explode('-', $pemasukan->tanggal)[1];
                $data_pemasukan[(int)$check] = $pemasukan->where('type', 'MASUK')->where('tanggal', $pemasukan->tanggal)->sum('kas');
        }

        //chart keluar
        for ($i=0; $i <=12 ; $i++) { 
            $data_pengeluaran[(int)$i] = 0;
        }

           foreach ($chart_pengeluaran as $pengeluaran) {
                $check = explode('-', $pengeluaran->tanggal)[1];
                $data_pengeluaran[(int)$check] = $pengeluaran->where('type', 'KELUAR')->where('tanggal', $pengeluaran->tanggal)->sum('kas');
        }
        
        return view('dashboard' , compact('datasMasuk', 'datasKeluar', 'kas' , 'data_pemasukan' , 'data_pengeluaran'));

    }
}