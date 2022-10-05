@extends('layouts.master');
@section('content')
<style>
.section{
  margin-bottom:0px;
  margin-top:0px;
}

.card{
  margin-bottom:0px;
  margin-top:0px;
}
</style>
<section class="section">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title">Edit Profile</h4>
      </div>

      <div class="card-body">
          <div class="row">
              <div class="col-md-12">

                <form action="{{url('/edit-profile')}}" method="POST">

                  @csrf
                  @method("PUT")
                  <div class="form-group col-md-12">
                      <label for="name_profile">Username</label>
                      <input type="text" class="form-control mt-2" id="name" placeholder="Enter Username" name="name" value="{{$data->name}} "required>
                  </div>

                  <div class="form-group col-md-12 mt-4">
                    <label for="email_profile">Email</label>
                    <input type="email" class="form-control mt-2" id="email" placeholder="Enter email" name="email" value="{{$data->email}} "required>
                  </div>

               

                  <div class="form-group col-md-12 mt-4">
                    <label for="password_old">Enter Old Password</label>
                    <input type="password" class="form-control mt-2" id="password_old" placeholder="Enter Old Password" name="password_old" value="" autocomplete="new-password" required>
                  </div>

                  <div class="form-group col-md-12 mt-4">
                    <label for="password_new">Enter New Password</label>
                    <input type="password" class="form-control mt-2" id="password_new"  placeholder="Enter Password" name="password" autocomplete="new-password" required>
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
@if(Session::has('success'))

<script>
    Swal.fire({
  title: 'Success',
  text: "{{ Session::get('success') }}",
  icon: 'success',
  confirmButtonText: 'Okay'
})
</script>

@elseif(Session::has('error'))
<script>
  Swal.fire({
title: 'Error',
text: "{{ Session::get('error') }}",
icon: 'error',
confirmButtonText: 'Okay'
})
</script>

@endif

@endsection