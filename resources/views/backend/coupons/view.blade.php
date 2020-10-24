@extends('layouts.backend.master')
@section('title')
    View Coupon
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
                <form class="form-horizontal form-material">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="w-25 float-left card-title m-0">Coupon Details</h3>
                            <div class="dropdown dropleft text-right w-75 float-right">
                                <a href="{{route('backend.coupons.create')}}" class="btn btn-raised btn-raised-primary m-1 pull-right"><i class="i-Add"></i> Add Coupon</a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input id="code" value="{{old('code', $coupon->code)}}" readonly class="form-control form-control-line" style="text-transform: uppercase"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="coupon_type_id" >Coupon Type</label>
                                        <select id="coupon_type_id" class="form-control form-control-line" readonly disabled>
                                            @foreach($coupon_types as $coupon_type)
                                                <option @if(old('coupon_type_id', $coupon->coupon_type_id)==$coupon_type->id) selected @endif value="{{$coupon_type->id}}">{{$coupon_type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="active">Active</label>
                                        <label id="active" class="switch pr-5 switch-primary mr-3 mt-2" style="display: block">
                                            <span>Yes</span>
                                            <input id="active" type="checkbox" @if($coupon->is_active==1) checked @endif value="1" readonly disabled>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 price">
                                    <div class="form-group">
                                        <label for="min_price">Minimum Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" id="min_price" value="{{ $coupon->min_price }}" class="form-control" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 discount" style="display:none;">
                                    <div class="form-group">
                                        <label for="discount">Discount</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">%</span>
                                            </div>
                                            <input type="text" id="discount" value="{{$coupon->discount}}" class="form-control" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="valid_till">Valid Till</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="i-Calendar"></i></span>
                                            </div>
                                            <input data-toggle="datepicker" id="valid_till" value="{{$coupon->valid_till}}" class="form-control" readonly disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 food" style="display:none;">
                                    <div class="form-group">
                                        <label for="food_id" >Food</label>
                                        <select id="food_id" class="form-control form-control-line" readonly disabled>
                                            <option value="0">Please select</option>
                                            @foreach($categories as $category)
                                                @if(count($category->foods)>0)
                                                    <optgroup label="{{$category->name}}">
                                                        @foreach($category->foods as $food)
                                                            <option @if($food->id == $coupon->food_id) selected @endif value="{{$food->id}}">{{$food->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-12 btn-toolbar d-block">
                                <a type="button" href="{{url()->previous()}}" class="btn btn-gray-300"><i class="i-Back1"></i> Back</a>
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
