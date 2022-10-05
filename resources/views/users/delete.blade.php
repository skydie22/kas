@foreach ($dataUser as $data)
<div class="modal fade" id="delete-user{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action={{ url('/hapus-bendahara/' . $data->id) }} method="POST" >
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <center class="mt-3">
                        <h5>
                            apakah anda yakin ingin menghapus user ini?
                        </h5>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Hapus!</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach