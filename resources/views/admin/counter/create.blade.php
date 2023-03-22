@extends('admin.layouts.app_admin')
@section('styles')

@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Add Counter</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Counter</li>
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
                    <form class="form-horizontal" action="{{ route('counter.store') }}" method="POST">
                        @csrf
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="heading" class="col-sm-3 col-form-label">Heading</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="heading" placeholder="Heading" name="heading" value="{{ old('heading') }}">
                            @error('heading')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="count" class="col-sm-3 col-form-label">Count</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="count" placeholder="count" name="count" value="{{ old('count') }}">
                              @error('count')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                          </div>


                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-block">Add Count</button>
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

