@section('title')
    Login
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
                    <h1 class="mb-0 text-22 text-center">Sign In</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="p-4">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if ($errors->has('password'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="input-right-icon">
                                            <input id="email" name="email" class="form-control form-control-lg" type="email" value="{{old('email')}}" autofocus autocomplete>
                                            <span class="span-right-input-icon">
                                                 <i class="ul-form__icon i-Mail"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-right-icon">
                                            <input id="password" name="password" class="form-control form-control-lg" type="password">
                                            <span class="span-right-input-icon">
                                                <i class="ul-form__icon i-Lock-2"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block mt-2">Sign In</button>
                                </form>

                                <div class="mt-3 text-center">
                                    <a href="{{route('password.request')}}" class="text-muted"><u>Forgot Password?</u></a>
                                </div>

                                {{--  <div class="mt-3 text-center">
                                      <a href="{{route('register')}}" class="text-muted"><u>Register as Administrator?</u></a>
                                  </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
