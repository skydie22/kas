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

        $this_m = Carbon::parse('M')->now();
        $this_month = Carbon::now()->format('Y-m');

        $month_in = Kas::where('type', 'MASUK')->where('tanggal', 'like', $this_month . '%')->get();
        $month_out = Kas::where('type', 'KELUAR')->where('tanggal', 'like', $this_month . '%')->get();

        //chart masuk
        for ($i=1; $i <= $this_m->daysInMonth ; $i++) { 
            $data_pemasukan[(int)$i] = 0;
        }

        foreach ($month_in as $p) {
            $check = explode('-',carbon::parse($p->tanggal)->format('Y-m-d'))[2];
            $data_pemasukan[(int)$check] = $p->where('type', 'MASUK')->where('tanggal', $p->tanggal)->sum('kas');   
        }

        //chart keluar
        for ($i=1; $i <= $this_m->daysInMonth ; $i++) { 
            $data_pengeluaran[(int)$i] = 0;
        }

        foreach ($month_out as $p) {
            $check = explode('-',carbon::parse($p->tanggal)->format('Y-m-d'))[2];
            $data_pengeluaran[(int)$check] = $p->where('type', 'KELUAR')->where('tanggal', $p->tanggal)->sum('kas');   
        }

        $label_m = $this_m->daysInMonth;

        return view('dashboard.index' , compact('datasMasuk', 'datasKeluar', 'kas' , 'label_m' , 'data_pemasukan' , 'data_pengeluaran'));

    }

    public function filter(Request $request)
    {
        $datasMasuk = Kas::where('type' , 'MASUK')->sum('kas');
        $datasKeluar = Kas::where('type', 'KELUAR')->sum('kas');
        $kas = $datasMasuk - $datasKeluar;

        $this_month = Carbon::parse($request->date)->format('Y-m');
        $month = Carbon::parse($request->date)->format('Y-m-d H:i:s');
        $result = Carbon::parse($month);
        
        $month_p = Kas::where('tanggal' , 'like' , $this_month . '%')->get();

         //chart masuk
         for ($i=1; $i <= $result->daysInMonth ; $i++) { 
            $data_pemasukan[(int)$i] = 0;
        }

        foreach ($month_p as $p) {
            $check = explode('-',carbon::parse($p->tanggal)->format('Y-m-d'))[2];
            $data_pemasukan[(int)$check] = $p->where('type', 'MASUK')->where('tanggal', $p->tanggal)->sum('kas');   
        }

        //chart keluar

        for ($i=1; $i <= $result->daysInMonth ; $i++) { 
            $data_pengeluaran[(int)$i] = 0;
        }

        foreach ($month_p as $p) {
            $check = explode('-',carbon::parse($p->tanggal)->format('Y-m-d'))[2];
            $data_pengeluaran[(int)$check] = $p->where('type', 'KELUAR')->where('tanggal', $p->tanggal)->sum('kas');   
        }

        $label_m = $result->daysInMonth;

        return view('dashboard.indexFilltered' , compact('datasMasuk', 'datasKeluar', 'kas' , 'label_m' , 'data_pemasukan' , 'data_pengeluaran'));
    }
}