@extends('layouts.master')
@section('content')
    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Rekap Periode Kas</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url("home") }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">rekap</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    


    <section class="section">
        <div class="card">

            <div class="card-body">

                <div class="col-6 col-md-12">
                <form action="/rekap/cetak_pdf/periode" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-12 col-md-4">
                            <input class="form-control" type="date" name="tgl1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input class="form-control" type="date" name="tgl2">
                        </div>
                        <div class="col-12 col-md-4">
                            <button type="submit" class="btn btn-danger ">Cetak Periode</a>
                        </div>
                    </div>
                </form>
            </div>
    
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                        
                    <tbody>
                            @foreach ($datas as $rekap) 
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rekap->tanggal }}</td>
                            <td>{{ $rekap->uraian }}</td>
                            {{-- <td>{{ $rekap->type == 'MASUK' ? $rekap->kas : 0 }}</td> --}}
                            {{-- <td>{{ $rekap->type == 'KELUAR' ? $rekap->kas : 0 }}</td> --}}

                            @if( $rekap->type == 'MASUK' )

                            <td>@currency($rekap->kas)</td>
                            <td><p style="color: #47b576">Pemasukan</p></td>

                            @elseif($rekap->type == 'KELUAR' )

                            <td>@currency($rekap->kas)</td>
                            <td><p style="color: #ff7976">Pengeluaran</p></td>


                            @endif
                            {{-- <td>@currency($rekap->type == 'MASUK' ? $rekap->kas : 0)</td> --}}
                            {{-- <td>@currency($rekap->type == 'KELUAR' ? $rekap->kas : 0)</td> --}}

                            <td></td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>

    </section>
</div>

@endsection