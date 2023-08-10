@extends('institute.layouts.app_in')
@section('styles')

@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Edit Payment Method</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"> Edit Payment Method</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class=" card-info">
                    <div class="card-header">
                      <h3 class="card-title">Create From</h3>
                    </div>
                    <form class="form-horizontal" action="{{ route('payment-method.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="account_name" class="col-sm-3 col-form-label">Account Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="account_name" placeholder="Enter Account name" name="account_name" value="{{ old('account_name') ? old('account_name') : $data->account_name }}">
                                @error('account_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>

                            <div class="form-group row">
                                <label for="account_number" class="col-sm-3 col-form-label">Account Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="account_number" placeholder="Enter Account Number" name="account_number" value="{{ old('account_number') ? old('account_number') : $data->account_number }}">
                                    @error('account_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_description" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea name="short_description" class="form-control" id="short_description" placeholder="Enter Description" rows="5">{{ old('short_description') ? old('short_description') : $data->short_description }}</textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logo" class="col-sm-3 col-form-label">Logo</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="logo" id="logo">
                                    <img src="{{ asset($data->logo) }}" alt="" width="100" class="rounded border mt-1">
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-info btn-block">Update Payment Method</button>
                            </div>
                      </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2 m-0  p-0"></div>
    </div>

@endsection

@section('scripts')

@endsection

