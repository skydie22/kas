@extends('layouts.master')
@section('content')

    
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Managemen Bendahara</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url("home") }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bendahara</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

<div class="card">
  @if ($message = Session::get('sukses'))
  <div class="alert alert-success alert-block"><i class="bi bi-check-circle"></i>
      <strong>{{ $message }}</strong>
  </div>
@endif

  @if ($message = Session::get('gagal'))<i class="bi bi-file-excel"></i>
  <div class="alert alert-danger alert-block">
      <strong>{{ $message }}</strong>
  </div>
  @endif
  
<section class="section">
    
      <div class="card-body">
          <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah-user">
              Tambah Data
          </button>
          <table class="table table-striped" id="table1">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Created</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Aksi</th>
                  </tr>
              </thead>

            
              <tbody>
                  @foreach ($dataUser as $data)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->created_at }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->email }}</td>
                      <td>
                   
                          <a class="btn shadow btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-user{{ $data->id }}">Hapus</i></a>

                      </td>
                  </tr>
                  @endforeach
              </tbody>

          </table>
      </div>
  </div>

</section>


@include('users/create')
@include('users/delete')

<script src="assets/js/jquery.min.js" type="text/javascript"></script>

<script>

    $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });

    </script>

@endsection
