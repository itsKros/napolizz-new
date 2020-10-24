@section('title')
    Forgot Password
@endsection

@extends('layouts.backend.master')

@section('content')
<div class="auth-layout-wrap" style="background-image: url('{{asset('backend/design/assets/images/photo-wide-6.jpg')}}')">
    <div class="auth-content">
        <div class="auth-logo text-center mb-4">
            <img src="{{asset('backend/assets/images/logo.png')}}" alt="">
        </div>
        <div class="card o-hidden">
            <div class="card-header">
                <h1 class="mb-0 text-22 text-center">Reset Password</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="p-4">
                            @include('layouts.backend.alert')
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                <strong >{{$message}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <div class="input-right-icon">
                                        <input id="email" name="email" class="form-control form-control-lg" type="email" value="{{old('email')}}" autofocus autocomplete>
                                        <span class="span-right-input-icon">
                                                 <i class="ul-form__icon i-Mail"></i>
                                        </span>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block mt-2">Submit</button>
                            </form>

                            <div class="mt-3 text-center">
                                <a href="{{route('login')}}" class="text-muted"><u>Back to Login</u></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
