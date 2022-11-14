<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as Session;


class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function indexMasuk()
    {
        $datasMasuk = Kas::where('type', 'MASUK')->get();
        $datasKeluar = Kas::where('type', 'KELUAR')->get();

        $totalMasuk = $datasMasuk->sum('kas');
        $totalKeluar = $datasKeluar->sum('kas');
        
        $totalKas = $totalMasuk - $totalKeluar;

        return view('kasMasuk.index', compact('datasMasuk','totalKas'));
    }

    public function indexKeluar()
    {
        $datasMasuk = Kas::where('type', 'MASUK')->get();
        $datasKeluar = Kas::where('type', 'KELUAR')->get();

        $totalMasuk = $datasMasuk->sum('kas');
        $totalKeluar = $datasKeluar->sum('kas');
        
        $totalKas = $totalMasuk - $totalKeluar;

        return view('kasKeluar.index', compact('datasKeluar','totalKas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMasuk(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'uraian' => 'required',
            'kas' => 'required',
        ]);

        $datasMasuk = new Kas();
        $datasMasuk->tanggal = $request->tanggal;
        $datasMasuk->uraian = $request->uraian;
        $datasMasuk->kas = $request->kas;
        $datasMasuk->type = 'MASUK';

        $datasMasuk->save();
        Session::flash('sukses', 'berhasil menambah data');
        return redirect()->back();
    }

    public function storeKeluar(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'uraian' => 'required',
            'kas' => 'required',
        ]);

        $datasKeluar = new Kas();

        $KasMasuk = Kas::where('type', 'MASUK')->sum('kas');
        $KasKeluar = Kas::where('type', 'KELUAR')->sum('kas');
        $total = $KasMasuk - $KasKeluar;

        $datasKeluar->tanggal = $request->tanggal;
        $datasKeluar->uraian = $request->uraian;
        $datasKeluar->kas = $request->kas;
        $datasKeluar->type = 'KELUAR';


        // $datasKeluar->save();
        // Session::flash('sukses','berhasil menambah data');
        // return redirect()->back();

        if ($datasKeluar->kas >= $total) {
            Session::flash('gagal', 'gagal menambah data');
            return redirect()->back();
        } else {
            $datasKeluar->save();
            Session::flash('sukses', 'berhasil menambah data');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function show(Kas $kas)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kas $kas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function updateMasuk(Request $request,  $id)
    {
        $datasMasuk = Kas::where('id', $id)->firstOrFail();

        $this->validate($request, [
            'tanggal' => 'required',
            'uraian' => 'required',
            'kas' => 'required',

        ]);

        $datasMasuk->tanggal = $request->tanggal;
        $datasMasuk->uraian = $request->uraian;
        $datasMasuk->kas = $request->kas;

        $datasMasuk->update();
        Session::flash('suksesEdit', 'berhasil mengedit data');

        return redirect()->back();
    }

    public function updateKeluar(Request $request,  $id)
    {
        $datasKeluar = Kas::where('id', $id)->firstOrFail();

        $this->validate($request, [
            'tanggal' => 'required',
            'uraian' => 'required',
            'kas' => 'required',

        ]);

        $KasMasuk = Kas::where('type', 'MASUK')->sum('kas');
        $KasKeluar = Kas::where('type', 'KELUAR')->sum('kas');
        $total = $KasMasuk - $KasKeluar;


        $datasKeluar->tanggal = $request->tanggal;
        $datasKeluar->uraian = $request->uraian;
        $datasKeluar->kas = $request->kas;

        // $datasKeluar->update();
        // Session::flash('suksesEdit', 'berhasil mengedit data');

        // return redirect()->back();

        if ($datasKeluar->kas >= $total) {
            Session::flash('gagal', 'gagal menambah data');
            return redirect()->back();
        } else {
            $datasKeluar->update();
            Session::flash('sukses', 'berhasil menambah data');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = Kas::find($id);
        $datas->delete();
        Session::flash('suksesHapus', 'berhasil menghapus data');

        return redirect()->back();
    }
}
