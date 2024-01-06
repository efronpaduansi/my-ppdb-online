<div class="modal fade" id="emailModal{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Alamat Email</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.user.changeEmail') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $u->id }}">
                <div class="form-group">
                    <label for="newEmail">Email Aktif <small class="text-danger">*</small></label>
                    <input type="email" name="newEmail" id="newEmail" class="form-control" placeholder="Masukan Email Aktif" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  