<div class="modal fade" id="passwordModal{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.user.changePassword') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $u->id }}">
                <div class="form-group">
                    <label for="oldPass">Password Saat ini</label>
                    <input type="password" name="oldPass" id="oldPass" class="form-control" placeholder="Masukan Password Saat ini" required>
                </div>
                <div class="form-group">
                    <label for="newPass">Password Baru</label>
                    <input type="password" name="newPass" id="newPass" class="form-control" placeholder="Masukan Password Baru" required>
                </div>
                <div class="form-group">
                    <label for="passConf">Konfirmasi Password Baru</label>
                    <input type="password" name="passConf" id="passConf" class="form-control" placeholder="Masukan Konfirmasi Password Baru" required>
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
  