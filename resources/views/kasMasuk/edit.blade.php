@foreach ($datasMasuk as $data)
    
<div class="modal fade modal-borderless" id="edit-pemasukan{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemasukan Kas Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action={{url('/kas-pemasukan/edit/'. $data->id)}} method="POST" enctype="multipart/form-data">
            
            @csrf
            @method('put')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Uraian</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="uraian"  name="uraian" value="{{ $data->uraian }}">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Pemasukan</label> 
                <input type="number" min ="1" class="form-control" placeholder="nominal" name="kas" autocomplete="off" value="{{ $data->kas }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="tanggal" name="tanggal" value="{{ $data->tanggal }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
</div>
</div>
@endforeach
