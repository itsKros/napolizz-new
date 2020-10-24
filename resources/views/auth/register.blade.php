@section('title')
    Register
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
                    <h1 class="mb-0 text-22 text-center">Sign Up</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="p-4">
                               @include('layouts.backend.alert')
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Name</label>
                                        <div class="input-right-icon">
                                            <input id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" value="{{old('name')}}" autofocus autocomplete required>
                                            <span class="span-right-input-icon">
                                                 <i class="ul-form__icon i-Checked-User"></i>
                                            </span>
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger" role="alert">
                                                <strong >{{$message}}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="input-right-icon">
                                            <input id="email" name="email" class="form-control form-control-lg" type="email" value="{{old('email')}}" autocomplete required>
                                            <span class="span-right-input-icon">
                                                 <i class="ul-form__icon i-Email"></i>
                                            </span>
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger" role="alert">
                                                <strong >{{$message}}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-right-icon">
                                            <input id="password" name="password" class="form-control form-control-lg" type="password" autocomplete required>
                                            <span class="span-right-input-icon">
                                                <i class="ul-form__icon i-Lock-2"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                            <div class="alert alert-danger" role="alert">
                                                <strong >{{$message}}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Confirm Password</label>
                                        <div class="input-right-icon">
                                            <input id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" type="password" required>
                                            <span class="span-right-input-icon">
                                                <i class="ul-form__icon i-Security-Check"></i>
                                            </span>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger" role="alert">
                                                <strong >{{$message}}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block mt-2">Sign Up</button>
                                </form>

                                <div class="mt-3 text-center">
                                    <a href="{{route('login')}}" class="text-muted"><u>Already have an account?</u></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
