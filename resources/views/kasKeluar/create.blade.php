<div class="modal fade modal-borderless" id="tambah-pengeluaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">pengeluaran Kas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action={{route('tambah.pengeluaran')}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Uraian</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="uraian" required>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Pengeluaran</label> 
                <input type="number" min ="1" class="form-control" placeholder="" name="kas" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="" name="tanggal" required>
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