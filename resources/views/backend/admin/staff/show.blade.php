@extends('layouts.backend.app')

@section('title', 'Staff')

@section('page-title', 'Staff')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-4">
        <div class="ibox">
            <div class="ibox-body text-center">
                <div class="m-t-20">
                    {{-- <img class="img-circle" src="{{ asset('uploads/' . $siswa->pas_foto) }}" /> --}}
                </div>
                <h5 class="font-strong m-b-10 m-t-10">{{ $staff->nama }}</h5>
                <div class="m-b-20 text-muted">{{ $staff->email }}</div>
                <div class="profile-social m-b-20">
                    <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                    <a href="javascript:;"><i class="fa fa-pinterest"></i></a>
                    <a href="javascript:;"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8">
        <div class="ibox">
            <div class="ibox-body">
                <ul class="nav nav-tabs tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="bi bi-pencil"></i> Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-3" data-toggle="tab"><i class="ti-announcement"></i> Feeds</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-1">
                        <div class="row">
                            <div class="col-md-6" style="border-right: 1px solid #eee;">
                                <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-user"></i> Biodata</h5>
                                <div class="m-b-20">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" value="{{ $staff->nama }}" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" value="{{ $staff->email }}" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Gabung</label>
                                            <input type="text" value="{{ date('d F Y, H:i:s', strtotime($staff->created_at)) }}" class="form-control" readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-user-plus"></i> Latest Followers</h5>
                                <ul class="media-list media-list-divider m-0">
                                    <li class="media">
                                        <a class="media-img" href="javascript:;">
                                            <img class="img-circle" src="./assets/img/users/u1.jpg" width="40" />
                                        </a>
                                        <div class="media-body">
                                            <div class="media-heading">Jeanne Gonzalez <small class="float-right text-muted">12:05</small></div>
                                            <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <a class="media-img" href="javascript:;">
                                            <img class="img-circle" src="./assets/img/users/u2.jpg" width="40" />
                                        </a>
                                        <div class="media-body">
                                            <div class="media-heading">Becky Brooks <small class="float-right text-muted">1 hrs ago</small></div>
                                            <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <a class="media-img" href="javascript:;">
                                            <img class="img-circle" src="./assets/img/users/u3.jpg" width="40" />
                                        </a>
                                        <div class="media-body">
                                            <div class="media-heading">Frank Cruz <small class="float-right text-muted">3 hrs ago</small></div>
                                            <div class="font-13">Lorem Ipsum is simply dummy.</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <a class="media-img" href="javascript:;">
                                            <img class="img-circle" src="./assets/img/users/u6.jpg" width="40" />
                                        </a>
                                        <div class="media-body">
                                            <div class="media-heading">Connor Perez <small class="float-right text-muted">Today</small></div>
                                            <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <a class="media-img" href="javascript:;">
                                            <img class="img-circle" src="./assets/img/users/u5.jpg" width="40" />
                                        </a>
                                        <div class="media-body">
                                            <div class="media-heading">Bob Gonzalez <small class="float-right text-muted">Today</small></div>
                                            <div class="font-13">Lorem Ipsum is simply dummy.</div>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                        {{-- <h4 class="text-info m-b-20 m-t-20"><i class="fa fa-shopping-basket"></i> Latest Orders</h4> --}}
                        {{-- <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th width="91px">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>11</td>
                                    <td>@Jack</td>
                                    <td>$564.00</td>
                                    <td>
                                        <span class="badge badge-success">Shipped</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>@Amalia</td>
                                    <td>$220.60</td>
                                    <td>
                                        <span class="badge badge-success">Shipped</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>@Emma</td>
                                    <td>$760.00</td>
                                    <td>
                                        <span class="badge badge-default">Pending</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>@James</td>
                                    <td>$87.60</td>
                                    <td>
                                        <span class="badge badge-warning">Expired</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>@Ava</td>
                                    <td>$430.50</td>
                                    <td>
                                        <span class="badge badge-default">Pending</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>@Noah</td>
                                    <td>$64.00</td>
                                    <td>
                                        <span class="badge badge-success">Shipped</span>
                                    </td>
                                    <td>10/07/2017</td>
                                </tr>
                            </tbody>
                        </table> --}}
                    </div>
                    <div class="tab-pane fade" id="tab-2">
                        <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" id="staffUpdateForm">
                            {{-- <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="First Name">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" placeholder="First Name">
                                </div>
                            </div> --}}
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="nama" value="{{ $staff->nama }}" >
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="form-control" type="email" name="email" value="{{ $staff->email }}" >
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input class="form-control" type="password" name="newPass" id="newPass">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" name="newPassConf">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tab-3">
                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-bullhorn"></i> Latest Feeds</h5>
                        <ul class="media-list media-list-divider m-0">
                            <li class="media">
                                <div class="media-img"><i class="ti-user font-18 text-muted"></i></div>
                                <div class="media-body">
                                    <div class="media-heading">New customer <small class="float-right text-muted">12:05</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-img"><i class="ti-info-alt font-18 text-muted"></i></div>
                                <div class="media-body">
                                    <div class="media-heading text-warning">Server Warning <small class="float-right text-muted">12:05</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-img"><i class="ti-announcement font-18 text-muted"></i></div>
                                <div class="media-body">
                                    <div class="media-heading">7 new feedback <small class="float-right text-muted">Today</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-img"><i class="ti-check font-18 text-muted"></i></div>
                                <div class="media-body">
                                    <div class="media-heading text-success">Issue fixed <small class="float-right text-muted">12:05</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-img"><i class="ti-shopping-cart font-18 text-muted"></i></div>
                                <div class="media-body">
                                    <div class="media-heading">7 New orders <small class="float-right text-muted">12:05</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-img"><i class="ti-reload font-18 text-muted"></i></div>
                                <div class="media-body">
                                    <div class="media-heading text-danger">Server warning <small class="float-right text-muted">12:05</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .profile-social a {
        font-size: 16px;
        margin: 0 10px;
        color: #999;
    }

    .profile-social a:hover {
        color: #485b6f;
    }

    .profile-stat-count {
        font-size: 22px
    }
</style>

<script type="text/javascript">
    $(function() {
        $('#staffUpdateForm').validate({
            errorClass: "help-block",
            rules: {
                nama: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                newPass: {
                    required: true
                },
                newPassConf: {
                    required: true,
                    equalTo: "#newPass"
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

{{-- tampil pesan --}}
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <div class="alert-body">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
</div> 
@elseif ($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <div class="alert-body">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
</div>
@endif
@endsection

