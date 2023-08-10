@extends('admin.layouts.app_admin')
@section('styles')

@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Add Teacher</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Teacher</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Create Form</h3>
                    </div>
                    <form class="form-horizontal" action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="name" class="col-sm-3 col-form-label">Teacher Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" placeholder="teacher name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="title" class="col-sm-3 col-form-label">Title</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="number" class="col-sm-3 col-form-label">Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="number" placeholder="Mobile number" name="number" value="{{ old('number') }}">
                            @error('number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="fb_link" class="col-sm-3 col-form-label">Facebook URL <small>Optional</small></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="fb_link" placeholder="Enter facebook profile link" name="fb_link" value="{{ old('fb_link') }}">
                            @error('fb_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="ins_link" class="col-sm-3 col-form-label">Instagram URL <small>Optional</small></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="ins_link" placeholder="Enter instagram profile link" name="ins_link" value="{{ old('ins_link') }}">
                            @error('ins_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="tw_link" class="col-sm-3 col-form-label">Twitter URL <small>Optional</small></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="tw_link" placeholder="Enter twitter profile link" name="tw_link" value="{{ old('tw_link') }}">
                            @error('tw_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="li_link" class="col-sm-3 col-form-label">Linkedin URL <small>Optional</small></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="li_link" placeholder="Enter linkedin profile link" name="li_link" value="{{ old('li_link') }}">
                            @error('li_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="short_description" class="col-sm-3 col-form-label">Short Description</label>
                          <div class="col-sm-9">
                            <textarea name="short_description" id="short_description" rows="5" class="form-control" placeholder="Enter short description">{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image">
                                <small class="text-success">Image size must be 612*408</small>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-block">Add Teacher</button>
                      </div>
                      <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection

@section('scripts')

@endsection

