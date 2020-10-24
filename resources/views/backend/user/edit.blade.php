@section('title')
    Profile
@endsection
@extends('layouts.backend.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        @include('layouts.backend.alert')
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <form method="POST" action="{{ route('backend.user.update') }}" class="form-horizontal form-material">
                    @csrf
                    @method('PUT')
                    <div class="card o-hidden">
                        <div class="card-header">
                            <h3 class="card-title">Profile Details</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Name</label>
                                        <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{old('name', auth()->user()->name)}}" autofocus autocomplete required>
                                        @error('name')
                                            <div class="alert alert-danger" role="alert">
                                                <strong >{{$message}}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" class="form-control" value="{{ auth()->user()->email }}" disabled readonly required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input id="password" name="password" class="form-control @error('password') is-invalid @enderror" type="password" autocomplete>
                                        @error('password')
                                            <div class="alert alert-danger" role="alert">
                                                <strong >{{$message}}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Confirm Password</label>
                                        <input id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password">
                                        @error('password_confirmation')
                                            <div class="alert alert-danger" role="alert">
                                                <strong >{{$message}}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-12 btn-toolbar d-block">
                                <a type="button" href="{{url()->previous()}}" class="btn btn-gray-300"><i class="i-Back1"></i> Cancel</a>
                                <button type="submit" class="btn btn-raised btn-raised-primary"><i class="i-Data-Save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
