@extends('admin.layouts.app_admin')
@section('styles')

@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Add New Book</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add New Book</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Create Form</h3>
                    </div>
                    <form class="form-horizontal" action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">

                        <div class="form-group row">
                            <label for="title" class="">Title</label>
                              <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
                              @error('title')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>


                          <div class="row">
                                  <div class="form-group col-md-6">
                                      <label for="name" class="">Name</label>
                                      <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ old('name') }}">
                                      @error('name')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="technology" class="">Technology</label>
                                      <input type="text" class="form-control" id="technology" placeholder="technology" name="technology" value="{{ old('technology') }}">
                                      @error('technology')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>


                                  <div class="form-group col-md-6">
                                      <label for="simister" class="">Semester</label>
                                      <select name="simister" id="simister" class="form-control" name="status">
                                          <option {{ old('status') == '1st' ? 'selected' : '' }} value="1st">1st</option>
                                          <option {{ old('status') == '2nd' ? 'selected' : '' }} value="2nd">2nd</option>
                                          <option {{ old('status') == '3rd' ? 'selected' : '' }} value="3rd">3rd</option>
                                          <option {{ old('status') == '4th' ? 'selected' : '' }} value="4th">4th</option>
                                          <option {{ old('status') == '5th' ? 'selected' : '' }} value="5th">5th</option>
                                          <option {{ old('status') == '6th' ? 'selected' : '' }} value="6th">6th</option>
                                          <option {{ old('status') == '7th' ? 'selected' : '' }} value="7th">7th</option>
                                          <option {{ old('status') == '8th' ? 'selected' : '' }} value="8th">8th</option>
                                      </select>
                                      @error('status')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>


                                  <div class="form-group col-md-6">
                                      <label for="regulations" class="">Regulations (Probidhan)</label>
                                      <input type="text" class="form-control" id="regulations" placeholder="regulations" name="regulations" value="{{ old('regulations') }}">
                                      @error('regulations')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>

                                  <div class="form-group col-md-6">
                                      <label for="status">Status</label>
                                      <select name="status" id="status" class="form-control">
                                          <option value="">Select Status</option>
                                          <option {{ old('status') == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                          <option {{ old('status') == 'publish' ? 'selected' : '' }} value="publish">Publish</option>
                                          <option {{ old('status') == 'rejected' ? 'selected' : '' }} value="rejected">Rejected</option>
                                      </select>
                                      @error('status')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>


                                  <div class="form-group col-md-6">
                                    <label for="published_by" class="">Published By</label>
                                    <input type="text" class="form-control" id="published_by" placeholder="published_by" name="published_by" value="{{ old('published_by') }}">
                                    @error('published_by')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group col-md-2">
                                    <label for="price" class="">Price</label>
                                    <input type="number" class="form-control" id="price" placeholder="price" name="price" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="thumbnail" class="">Thumbnail</label>
                                      <input type="file" name="thumbnail" class="form-control">
                                      @error('thumbnail')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="pages" class="">Pages</label>
                                      <input type="file" name="pages[]" class="form-control" multiple>
                                      @error('pages')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-block">Add Book</button>
                      </div>
                      <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

@endsection

@section('scripts')

@endsection

