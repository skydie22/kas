@extends('layouts.master')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pengeluaran</h3>
            
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">KasPengeluaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            @if ($message = Session::get('sukses'))
                <div class="alert alert-success alert-block"><i class="bi bi-check-circle"></i>
                    <strong>{{ $message }}</strong>
                </div>        
            @endif

            @if ($message = Session::get('gagal'))
            <div class="alert alert-danger alert-block"><i class="bi bi-file-excel"></i>
                <strong>{{ $message }}</strong>
            </div>        
        @endif


            @if ($message = Session::get('suksesEdit'))
            <div class="alert alert-success alert-block"><i class="bi bi-check-circle"></i>
                <strong>{{ $message }}</strong>
            </div>        
        @endif

        @if ($message = Session::get('suksesHapus'))
        <div class="alert alert-success alert-block"><i class="bi bi-check-circle"></i>
            <strong>{{ $message }}</strong>
        </div>        
    @endif

            <div class="card-header">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-pengeluaran">Tambah Pengeluaran</button>            
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th>Pengeluaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($datasKeluar as $data)
                           <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ $data->uraian }}</td>
                            <td>@currency($data->kas)</td>
                            <td>
                                <a class="btn shadow btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit-pengeluaran{{ $data->id }}">Edit</i></a>
                                <a class="btn shadow btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapus-pengeluaran{{ $data->id }}">Hapus</i></a>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@include('kasKeluar/create')
@include('kasKeluar/edit')
@include('kasKeluar/delete')

<script src="assets/js/jquery.min.js" type="text/javascript"></script>

<script>

    $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });

    </script>

@endsection