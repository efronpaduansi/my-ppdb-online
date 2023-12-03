@extends('layouts.backend.app')

@section('title', 'Staff')

@section('page-title', 'Staff')

@section('content')
<div class="ibox">
    <div class="ibox-head d-flex">
        <div class="ibox-title">Data Staff</div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#newStaffModal"><i class="bi bi-plus-circle-fill"></i> Add new staff</button>
    </div>
    <div class="ibox-body">
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Tgl Gabung</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staff as $item)  
                <tr>
                    <td class="d-flex">
                        <a href="{{ route('admin.staff.show', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                        <form action="{{ route('admin.staff.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Yakin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ date('d F Y, H:i:s', strtotime($item->created_at)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- tampil pesan --}}
@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert">×</button>
        </div>
    </div> 
@elseif ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="newStaffModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Staff</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.staff.store') }}" method="POST" id="newStaffForm">
            @csrf
                <div class="form-group">
                    <label for="nama">Name <small class="text-danger">*</small></label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Name" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="email">Email Address <small class="text-danger">*</small></label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" autocomplete="off">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password <small class="text-danger">*</small></label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(function() {
        $('#newStaffForm').validate({
            errorClass: "help-block",
            rules: {
                nama: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true
                }
            },
            highlight: function(e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight: function(e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
        });
    });
</script>
@endsection