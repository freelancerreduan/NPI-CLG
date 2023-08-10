@extends('layouts.app')
@section('content')
    @include('partials.navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-6 coloffset-3 mx-auto">
                <div class="card my-5">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    <div class="card-header"><h4>Payment With <b class="text-danger text-decoration-underline">{{ $method->account_name }}</b></h4></div>
                    <div class="card-body">
                        <div class="fw-bold">
                            <h5p>{{ $method->account_number }} {{ $method->short_description }}</h5p>
                        </div>
                        <form action="{{ route('frontend.pay.store', Crypt::encrypt($method->id)) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" placeholder="Enter amount">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="send_from_number">Send From Number</label>
                                <input type="text" class="form-control" name="send_from_number" value="{{ old('send_from_number') }}" placeholder="Enter Send From Number">
                                @error('send_from_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="transaction_id">Transaction ID</label>
                                <input type="text" class="form-control" name="transaction_id" value="{{ old('transaction_id') }}" placeholder="Enter transaction ID">
                                @error('transaction_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="screenshoot">Prove Screenshoots</label>
                                <input type="file" class="form-control" name="screenshoot" required>
                                @error('screenshoot')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
