<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class rekapController extends Controller
{
   //rekap
    public function indexRekap()
    {
        $datas = Kas::all();
        return view('rekap' , compact('datas'));
    }

    //rekap-periode
    public function indexPeriode()
    {
        $datas = Kas::all();
        return view('rekap-periode' , compact('datas'));
    }

    //rekap
    public function exportPdf(){
        $datasAll = Kas::all();
        $datasMasuk = Kas::where('type' , 'MASUK')->sum('kas');
        $datasKeluar = Kas::where('type' , 'KELUAR')->sum('kas');
        $datasSisa = $datasMasuk - $datasKeluar;

    	$pdf = PDF::loadview('export-pdf',
        ['datasAll'=>$datasAll , 
         'datasMasuk' => $datasMasuk,
         'datasKeluar' => $datasKeluar,
         'datasSisa' => $datasSisa
    ]);
        return $pdf->download('laporan-kas.pdf');
    }

    //rekap-periode
    public function cetak_periode_pdf(Request $request)
    {

        $tgl1 = Carbon::parse($request->tgl1)->format('Y-m-d H:i:s');
        $tgl2 = Carbon::parse($request->tgl2)->format('Y-m-d H:i:s');
        $data = Kas::whereBetween('tanggal', [$tgl1, $tgl2])->orderBy('tanggal','asc')->get();

   
        $pdf = PDF::loadview('laporan-kas-periode',[
            'data'=>$data,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
        ]);

        return $pdf->download('laporan-rekap-periode.pdf');
    }


    

}
