@extends('layouts.master')
@section('content')
    
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

    <div class="page-heading">
        <h3>Tambah Bendahara</h3>
    </div>

    
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
