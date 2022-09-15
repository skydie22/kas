@extends('layouts.master')
@section('content')
    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Rekap Kas</h2>
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

                    <a class="btn btn-danger mb-3" href=#" style="color:white"  >
                    Export To Pdf</a>
    
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

                            <td>{{ $rekap->kas }}</td>
                            <td>Pemasukan</td>

                            @elseif($rekap->type == 'KELUAR' )

                            <td>{{ $rekap->kas }}</td>
                            <td>Pengeluaran</td>


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