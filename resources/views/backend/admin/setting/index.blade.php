@extends('layouts.backend.app')

@section('title', 'Website Setting')

@section('page-title', 'Website Setting')

@section('content')
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="bi bi-buildings-fill"></i> Company</button>
      <button class="nav-link" id="nav-sliders-tab" data-toggle="tab" data-target="#nav-sliders" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="bi bi-sliders"></i> Sliders</button>
      <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="bi bi-telephone-fill"></i> Contact</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <div class="col-md-12">
        <form action="{{ route('website.setting.company') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-group row">
              <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ $web->company_name }}" autofocus>
                @error('company_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="logo" class="col-sm-2 col-form-label">Logo</label>
              <div class="col-sm-10">
                <input type="file" class="form-control @error('logo')is-invalid @enderror" id="logo" name="logo">
                @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="address" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $web->address }}">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-sliders" role="tabpanel" aria-labelledby="nav-sliders-tab">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Desc</th>
                            <th>Button Link</th>
                            <th>Button Text</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($sliders as $slider)   
                      <tr>
                        <td class="d-flex">
                          <form action="{{ route('website.sliders.disable', $slider->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <button class="btn btn-sm btn-secondary mr-1"  data-toggle="tooltip" data-placement="right" title="Disable"><i class="bi bi-info-circle"></i></button>
                          </form>
                          <form action="{{ route('website.sliders.destroy', $slider->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete"><i class="bi bi-trash"></i></button>
                          </form>
                        </td>
                        <td><img src="{{ asset('uploads/frontend/' . $slider->image) }}" alt="sliders" width="80"></td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->description }}</td>
                        <td>{{ $slider->button_link }}</td>
                        <td>{{ $slider->button_text }}</td>
                        <td>
                          @if ($slider->is_active == 1)
                            <span class="badge badge-success">Active</span>
                          @else
                            <span class="badge badge-danger">Disable</span>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
               <div class="card">
                    <div class="card-body">
                        <form action="{{ route('website.setting.sliders') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="form-group">
                                <label for="image">Image <small class="text-danger">*</small></label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title">Title <small class="text-danger">*</small></label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description <small class="text-danger">*</small></label>
                               <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="button_link">Button Link <small class="text-danger">*</small></label>
                              <input type="text" id="button_link" name="button_link" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="button_text">Button Text <small class="text-danger">*</small></label>
                            <input type="text" id="button_text" name="button_text" class="form-control">
                          </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
               </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('website.setting.update', $web->id) }}" method="POST">
                   @csrf
                   @method('put')
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="phonenumber">Telepon</label>
                        <input type="text" class="form-control" id="phonenumber" name="phonenumber">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" class="form-control">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" name="zip">
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="website">Website</label>
                          <input type="text" class="form-control" id="website" name="website">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="facebook">Facebook</label>
                          <input type="text" class="form-control" id="facebook" name="facebook">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
            </div>
        </div>
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
@elseif ($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <div class="alert-body">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
</div>
@endif
@endsection

