@extends('layouts.app_user')
@section('content')
    <div class="Form-style py-5 text-dar login-bg" style="padding: 9% 18% !important;">
        <div class="container">
            <div class="row">
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="{{ route('login') }}" >Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-register" href="{{ route('register') }}">Register</a>
                </li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane fade show active text-white" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form action="{{ route('login') }}" method="POST" >
                        @csrf
                    <div class="text-center mb-3">
                        <h6 class="py-4">Sign in with:</h6>
                        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab icon-style fa-facebook-f"></i></button>
                        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab icon-style fa-google"></i></button>
                        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab icon-style fa-twitter"></i></button>
                        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab icon-style fa-github"></i></button>
                    </div>
                    <p class="text-center">or:</p>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginName">Email</label>
                        <input type="email" id="loginName" class="form-control " name="email" value="{{ old('email') }}"/>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginPassword">Password</label>
                        <input type="password" id="loginPassword" class="form-control" name="password"/>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-3 mb-md-0">
                            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                        </div>
                        </div>

                        <div class="col-md-6 d-flex justify-content-center">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                    </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class=" mb-4 btn btn-primary">Sign in</button>
                    <!-- Register buttons -->
                    <div class="text-center"><p>Not a member? <a href="#!">Register</a></p></div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>

@endsection

