@extends('layouts.backend.master')
@section('title')
    Edit Outlet
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
                <form method="POST" action="{{route('backend.outlets.update', $outlet->id)}}" class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="w-25 float-left card-title m-0">Outlet Details</h3>
                            <div class="dropdown dropleft text-right w-75 float-right">
                                <a href="{{route('backend.outlets.create')}}" class="btn btn-raised btn-raised-primary m-1 pull-right"><i class="i-Add"></i> Add Outlet</a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" name="name" value="{{old('name', $outlet->name)}}" class="form-control form-control-line @error('name') is-invalid  @enderror" required autofocus/>
                                        @if ($errors->has('name'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="active">Active</label>
                                        <label id="active" class="switch pr-5 switch-primary mr-3 mt-2" style="display: block">
                                            <span>Yes</span>
                                            <input name="is_active" type="checkbox" @if($outlet->is_active) checked @endif value="1">
                                            <span class="slider"></span>
                                        </label>
                                        @if ($errors->has('is_active'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('is_active') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input id="phone" name="phone" value="{{old('phone', $outlet->phone)}}" class="form-control form-control-line @error('phone') is-invalid  @enderror" required/>
                                        @if ($errors->has('phone'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">City</label>
                                        <input id="city" name="city" value="{{old('city', $outlet->city)}}" class="form-control form-control-line @error('city') is-invalid  @enderror" required/>
                                        @if ($errors->has('city'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input id="state" name="state" value="{{old('state', $outlet->state)}}" class="form-control form-control-line @error('state') is-invalid  @enderror" required/>
                                        @if ($errors->has('state'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="postal_code">Postal Code</label>
                                        <input id="postal_code" name="postal_code" value="{{old('postal_code', $outlet->postal_code)}}" class="form-control form-control-line @error('postal_code') is-invalid  @enderror" required/>
                                        @if ($errors->has('postal_code'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('postal_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea id="address" name="address" class="form-control form-control-line @error('address') is-invalid  @enderror" rows="4">{{old('address', $outlet->address)}}</textarea>
                                        @if ($errors->has('address'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('address') }}</strong>
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
