@extends('layouts.backend.master')
@section('title')
    Create Coupon
@endsection
@section('css')
        <link  href="{{asset('backend/assets/css/datepicker.min.css')}}" rel="stylesheet">
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
                <form method="POST" action="{{route('backend.coupons.store')}}" class="form-horizontal form-material" id="form">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Coupon Details</h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input id="code" name="code" value="{{old('code')}}" class="form-control form-control-line @error('code') is-invalid  @enderror" required autofocus style="text-transform: uppercase"/>
                                        @if ($errors->has('code'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="coupon_type_id" >Coupon Type</label>
                                        <select id="coupon_type_id" class="form-control form-control-line @error('coupon_type_id') is-invalid  @enderror" name="coupon_type_id">
                                            @foreach($coupon_types as $coupon_type)
                                                <option @if(old('coupon_type_id')==$coupon_type->id) selected @endif value="{{$coupon_type->id}}">{{$coupon_type->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('coupon_type_id'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('coupon_type_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="active">Active</label>
                                        <label id="active" class="switch pr-5 switch-primary mr-3 mt-2" style="display: block">
                                            <span>Yes</span>
                                            <input name="is_active" type="checkbox" checked value="1">
                                            <span class="slider"></span>
                                        </label>
                                        @if ($errors->has('is_active'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('is_active') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 price">
                                    <div class="form-group">
                                        <label for="min_price">Minimum Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" id="min_price" name="min_price" value="{{old('min_price')}}" class="form-control @error('min_price') is-invalid  @enderror"/>
                                        </div>
                                        @if ($errors->has('min_price'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('min_price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 discount" style="display:none;">
                                    <div class="form-group">
                                        <label for="discount">Discount</label>
                                        <div class="input-group">
                                            <input type="text" id="discount" name="discount" value="{{old('discount')}}" class="form-control @error('discount') is-invalid  @enderror"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        @if ($errors->has('discount'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('discount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="valid_till">Valid Till</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="i-Calendar"></i></span>
                                            </div>
                                            <input data-toggle="datepicker" name="valid till" id="valid_till" value="{{old('valid_till')}}" class="form-control @error('valid_till') is-invalid  @enderror" required readonly>
                                        </div>
                                        @if ($errors->has('valid_till'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('valid_till') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 food" style="display:none;">
                                    <div class="form-group">
                                        <label for="foods_id" >Food</label>
                                        <select id="foods_id" class="form-control form-control-line @error('foods_id') is-invalid  @enderror" name="foods_id">
                                            <option value="0">Please select</option>
                                            @foreach($categories as $category)
                                                @if(count($category->foods)>0)
                                                    <optgroup label="{{$category->name}}">
                                                        @foreach($category->foods as $food)
                                                            <option value="{{$food->id}}">{{$food->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('foods_id'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('foods_id') }}</strong>
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
@section('js')
    <script src="{{asset('backend/assets/js/datepicker.min.js')}}"></script>
    <script>
        $('[data-toggle="datepicker"]').datepicker({autoPick:true, autoHide:true, startDate:new Date()});

        showHideFields($('#coupon_type_id').val());

        $('#coupon_type_id').on('change', function(){
            showHideFields($(this).val())
        });

        $("#code").on({
            keydown: function(e) {
                if (e.which === 32)
                    return false;
            },
            change: function() {
                this.value = this.value.replace(/\s/g, "");
            }
        });

        function showHideFields($coupon_type_id){
            resetForm();
            if($coupon_type_id == 1){
                $('.food').hide();
                $('.discount').hide();
                $('.price').show();
            }else if($coupon_type_id == 2){
                $('.discount').show();
                $('.food').hide();
                $('.price').hide();
            }else if($coupon_type_id == 3){
                $('.discount').show();
                $('.food').hide();
                $('.price').hide();
            }else if($coupon_type_id == 4){
                $('.food').hide();
                $('.discount').hide();
                $('.price').hide();
            }else{
                $('.food').show();
                $('.discount').hide();
                $('.price').hide();
            }
        }

        function resetForm(){
            $('#min_price').val('');
            $('#discount').val('');
            $('min_price').val('');
        }
    </script>
@endsection
