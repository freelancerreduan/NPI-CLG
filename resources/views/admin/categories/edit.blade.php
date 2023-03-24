@extends('admin.layouts.app_admin')
@section('styles')

@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Edit Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Category</li>
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
                      <h3 class="card-title">Edit Form</h3>
                    </div>
                    <form class="form-horizontal" action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="name" class="col-sm-3 col-form-label">Category Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" placeholder="Category name" name="name" value="{{ old('name') ? old('name') : $category->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-9">
                              <select name="position" id="position" class="form-control">
                                <option {{ $category->position == 'main_menu' ? 'selected' : '' }} value="main_menu">Main Menu</option>
                                <option {{ $category->position == 'top' ? 'selected' : '' }} value="top">Top</option>
                                <option {{ $category->position == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                              </select>
                              @error('position')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="position" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                              <input type="file" class="form-control" name="image">
                              @error('image')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="position" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                              <img src="{{ asset($category->image) }}" alt="" width="200">
                            </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-block">Update Cateogry</button>
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

