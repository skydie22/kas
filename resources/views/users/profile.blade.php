@extends('layouts.master');
@section('content')
    <style>
        .section {
            margin-bottom: 0px;
            margin-top: 0px;
        }

        .card {
            margin-bottom: 0px;
            margin-top: 0px;
        }
    </style>
    <section class="section">
        <div class="card">
            @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="card-header">
                <h4 class="card-title">Edit Profil</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <form action="{{ url('/edit-profile') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="form-group col-md-12">
                                <label for="name_profile">Username</label>
                                <input type="text" class="form-control mt-2" id="name" placeholder="Enter Username"
                                    name="name" value="{{ $data->name }} "required>
                            </div>


                            <div class="form-group col-md-12 mt-4">

                                <label for="image_profile">User Image</label>

                                <fieldset>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupFile01"><i
                                                    class="bi bi-upload"></i></label>
                                            <input type="file" class="form-control" id="inputGroupFile01"
                                                value="{{ $data->foto }}" name="foto">
                                        </div>
                                    </div>

                                </fieldset>


                            </div>

                            <div class="form-group
                                                col-md-12 mt-2 ">
                                <label for="email_profile">Email</label>
                                <input type="email" class="form-control mt-2" id="email" placeholder="Enter email"
                                    name="email" value="{{ $data->email }} "required readonly>
                            </div>



                            <div class="form-group col-md-12 mt-4">
                                <label for="password_old">Masukkan Password Lama</label>
                                <input type="password" class="form-control mt-2" id="password_old"
                                    placeholder="Masukkan Password Lama" name="password_old" value=""
                                    autocomplete="new-password" required>
                            </div>

                            <div class="form-group col-md-12 mt-4">
                                <label for="password_new">Masukkan Password Baru</label>
                                <input type="password" class="form-control mt-2" id="password_new"
                                    placeholder="Masukkan Password" name="password" autocomplete="new-password" required>
                            </div>



                            <button class="btn shadow btn-success btn-sm mt-4" type="submit">Edit Profile <span>
                                    <i class="bi bi-pencil-square"></i>
                                </span></button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/jquery.min.js" type="text/javascript"></script>

<script>

    $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });

    </script>
    
@endsection
