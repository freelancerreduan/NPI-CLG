@extends('layouts.app')
@section('styles')
<style>
.option-style{
    font-size: 19px;
    color: white;
}


</style>
@endsection
@section('content')
    <div class="Form-style py-5 text-dar login-bg" style="padding: 9% 18% !important;">
        <div class="container">
            <div class="row">
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link " href="{{ route('login') }}" >Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-register" href="{{ route('register') }}">Register</a>
                </li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane fade show active text-white" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form action="{{ route('register') }}" method="POST" >
                        @csrf
                    <div class="text-center mb-3">
                        <h6 class="py-4">Sign in with:</h6>
                        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab icon-style fa-facebook-f"></i></button>
                        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab icon-style fa-google"></i></button>
                        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab icon-style fa-twitter"></i></button>
                        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab icon-style fa-github"></i></button>
                    </div>
                    <p class="text-center">or:</p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Name / Institute Name  </label>
                                <input type="text" id="name" class="form-control text-white" name="name" value="{{ old('name') }}"/>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" class="form-control text-white" name="email" value="{{ old('email') }}"/>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control text-white" name="phone" value="{{ old('phone') }}"/>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="type">Select User Type</label>
                                <select name="type" id="type" class="form-control option-style " onchange="getInstitute(this)">
                                    <option value="">Select Type</option>
                                    <option value="user">User Only</option>
                                    <option value="institute">Institute Registration</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div id="parent">
                            <div class="col-12" id="collageInput">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="institutes">Select Institute / Collage</label>
                                    <select name="ins_id" id="institutes" class="form-control" >
                                        <option value="">select collage</option>
                                    </select>
                                    @error('ins_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">A&#x2022;C Password</label>
                                <input type="text" id="password" class="form-control text-white" name="password" value="{{ old('password') }}"/>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password_confirmation">Re-type Password</label>
                                <input type="text" id="password_confirmation" class="form-control text-white" name="password_confirmation" value="{{ old('password_confirmation') }}"/>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Email input -->


                    </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class=" mb-4 btn btn-primary">Sign up</button>
                    <!-- Register buttons -->
                    <div class="text-center"><p>Not a member? <a href="{{ route('login') }}">Login</a></p></div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script>
    $('#collageInput').hide();
    function getInstitute(el){
        var type = $(el).val();
            $.ajax({
            type: 'POST',
            url: '{{ route('getInstitute') }}',
            data: {type:type},
            success:function(data){
                if(type == 'user'){
                    $('#collageInput').show();
                    $('#institutes').html(data);
                }else{
                    $('#collageInput').hide();
                }
            }
        });
    }
</script>
@endsection


