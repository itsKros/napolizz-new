@extends('layouts.backend.master')
@section('title')
    Edit User
@endsection
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
            <div class="col-lg-12 col-xlg-12 col-md-12 p-0">
                <form method="POST" action="{{route('backend.users.update', $user->id)}}" class="form-horizontal form-material">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="w-25 float-left card-title m-0">User Details</h3>
                            <div class="dropdown dropleft text-right w-75 float-right">
                                <a href="{{route('backend.users.create')}}" class="btn btn-raised btn-raised-primary m-1 pull-right"><i class="i-Add"></i> Add User</a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" name="name" value="{{old('name', $user->name)}}" class="form-control form-control-line @error('name') is-invalid  @enderror" required autofocus/>
                                        @if ($errors->has('name'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="i-Email"></i></span>
                                            </div>
                                            <input id="email" value="{{old('email', $user->email)}}" class="form-control form-control-line" readonly disabled=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_id">Role</label>
                                        <select id="role_id" class="form-control form-control-line @error('role_id') is-invalid  @enderror" name="role_id">
                                            <option selected value="0">Please select</option>
                                            <option {{old('role_id', $user->role_id) == 2 ? 'selected' : ''}} value="2">Staff</option>
                                            <option {{old('role_id', $user->role_id) == 3 ? 'selected' : ''}} value="3">Rider</option>
                                            <option {{old('role_id', $user->role_id) == 4 ? 'selected' : ''}} value="4">Customer</option>
                                        </select>
                                        @if ($errors->has('role_id'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('role_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password"  class="form-control form-control-line @error('password') is-invalid  @enderror" />
                                        @if ($errors->has('password'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-line @error('password_confirmation') is-invalid  @enderror"/>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
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
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
