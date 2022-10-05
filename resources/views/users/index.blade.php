@extends('layouts.master')
@section('content')
    
<section class="section">
  <div class="card">

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
                   
                          <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-user{{ $data->id }}">delete</i></a>

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

@endsection
