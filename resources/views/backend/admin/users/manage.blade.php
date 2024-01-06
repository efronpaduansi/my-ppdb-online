@extends('layouts.backend.app')

@section('title', 'User Manajemen')

@section('page-title', 'User Manajemen')

@section('content')
<div class="ibox">
    <div class="ibox-head d-flex">
        <div class="ibox-title">Data User</div>
    </div>
    <div class="ibox-body">
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Tgl Gabung</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->role }}</td>
                        <td>{{ $u->created_at }}</td>
                        <td class="d-flex">
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#emailModal{{ $u->id }}">Ubah Email</a>
                            <a href="#" class="btn btn-sm btn-info ml-2" data-toggle="modal" data-target="#passwordModal{{ $u->id }}">Ubah Password</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('backend.admin.users.email_modal')
@include('backend.admin.users.pass_modal')


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
