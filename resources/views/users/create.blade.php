
<div class="modal fade modal-borderless" id="tambah-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
      <form action={{url('/bendahara/tambah')}} method="POST">
         @csrf
          @method('POST')
          <div class="modal-body">
              <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Username</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username" name="name">
              </div>
              <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Email</label> 
              <input type="email"  class="form-control" placeholder="username@gmail.com" name="email" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput3" class="form-label">Password</label> 
        <input type="password"  class="form-control" placeholder="" name="password" autocomplete="new-password" required>
    </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
  </form>
</div>
</div>
</div>
