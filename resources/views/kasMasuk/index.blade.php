@extends('layouts.master')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pemasukan</h3>

                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 m-3">
                    <h6 class="text-muted font-semibold">Sisa Kas</h6>
                    <h6 class="font-extrabold mb-0">@currency($totalKas)</h6>
                </div>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">KasPemasukan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block"><i class="bi bi-check-circle"></i>
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

    <section class="section">
        <div class="card">
        
            <div class="card-header">
              
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-pemasukan">Tambah Pemasukan</button>

            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th>Pemasukan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datasMasuk as $data)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ $data->uraian }}</td>
                            <td>@currency($data->kas)</td>
                            <td>
                                <a class="btn shadow btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit-pemasukan{{ $data->id }}">Edit</i></a>
                                <a class="btn shadow btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapus-pemasukan{{ $data->id }}">Hapus</i></a>
                            </td>

                        </tr>
                       
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@include('kasMasuk/create')
@include('kasMasuk/edit')
@include('kasMasuk/delete')

<script src="assets/js/jquery.min.js" type="text/javascript"></script>

<script>

    $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });

    </script>

@endsection
