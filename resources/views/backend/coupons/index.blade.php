@section('title')
    List Coupons
@endsection

@extends('layouts.backend.master')
@section('content')
    <!-- content goes here -->

    <div class="row">
        <div class="col-md-12">
            <div class="card o-hidden">
                <div class="card-header d-flex align-items-center">
                    <h3 class="w-25 float-left card-title m-0">All Coupons</h3>
                    <div class="dropdown dropleft text-right w-75 float-right">
                        <form method="GET" style="display: inline;">
                            <input type="hidden" name="page" value="{{$page}}"/>
                            <input type="search" name="q" value="{{$q}}" placeholder="Enter search term" class="form-control"/>
                            <select id="active" class="form-control filter-input" name="active">
                                <option @if($active == 0) selected @endif value="0">All Active Status</option>
                                <option @if($active == 1) selected @endif value="1">No</option>
                                <option @if($active == 2) selected @endif value="2">Yes</option>
                            </select>
                            <select id="coupon_type_id" class="form-control filter-input" name="coupon_type_id">
                                <option @if($coupon_type_id == 0) selected @endif value="0">All Coupon Types</option>
                                @foreach($coupon_types as $coupon_type)
                                    <option @if($coupon_type_id == $coupon_type->id) selected @endif value="{{$coupon_type->id}}">{{$coupon_type->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-raised btn-raised-success m-1 pull-right" value="Filter"><i class="i-Filter-2"></i> Filter</button>
                        </form>
                        <a href="{{route('backend.coupons.index')}}" class="btn btn-raised btn-raised-secondary m-1 pull-right"><i class="i-Refresh"></i> Reset</a>
                        <div class="divider"></div>
                        <a href="{{route('backend.coupons.create')}}" class="btn btn-raised btn-raised-primary m-1 pull-right"><i class="i-Add"></i> Add Coupon</a>
                    </div>
                </div>
                <div class="card-body">
                    @include('layouts.backend.alert')
                    <div  class="table-responsive table-hover table-striped table-bordered">
                        <table id="zero_configuration_table" class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="20px">#</th>
                                <th scope="col">Code</th>
                                <th scope="col" width="150px">Type</th>
                                <th scope="col" width="50px">Active</th>
                                <th scope="col" width="75px">Valid Till</th>
                                <th scope="col" width="100px">Created On</th>
                                <th scope="col" width="120px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($coupons)===0)
                                <tr><td scope="col" colspan="6">Sorry, there are no coupons to display!</td></tr>
                            @endif
                            @foreach($coupons as $index=>$coupon)
                                <tr>
                                    <th scope="row">{{(($coupons->currentPage()-1)*$coupons->perPage())+$index+1}}</th>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->coupon_type->name}}</td>
                                    <td><span class="badge @if($coupon->is_active) badge-outline-success @else badge-outline-danger @endif">{{$coupon->is_active==1 ? 'Yes' : 'No'}}</span></td>
                                    <td>{{\Carbon\Carbon::parse($coupon->valid_till)->format('m/d/Y')}}</td>
                                    <td>{{$coupon->created_at->format('m/d/Y H:i')}}</td>
                                    <td>
                                        <a href="{{route('backend.coupons.show', ['coupon'=>$coupon->id])}}" class="text-primary mr-2">
                                            <i class="nav-icon i-Eye-Visible font-weight-bold"></i> View
                                        </a>
                                        <a href="#" class="text-danger mr-2" data-value="form-delete-{{$coupon->id}}" data-toggle="modal" data-target=".bs-confirm-modal">
                                            <i class="nav-icon i-Close-Window font-weight-bold"></i> Delete
                                        </a>
                                        <form id="form-delete-{{$coupon->id}}" action="{{route('backend.coupons.destroy', ['coupon'=>$coupon->id])}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    @if(count($coupons)!=0)
                        <span>
                        Displaying {{(($coupons->currentPage()-1)*$coupons->perPage())+1}} to {{($coupons->currentPage()-1)*$coupons->perPage()+$index+1}}  of total {{$coupons->total()}} coupons.
                    </span>
                    <div class="float-right">
                        {{$coupons->links()}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- end of col-->
    </div>
    <!-- end of row-->
    @include('layouts.backend.confirm-delete')
    <!-- end of main content -->
@endsection
@section('js')
    <script>
        $('#zero_configuration_table').DataTable({"paging": false, 'info':false, 'searching':false});

       /* $(document).ready(function(){
            $('#category_id').on('change', function () {
                if(window.location.href.indexOf('?page')>-1){
                    window.location.href = window.location.href + '&category_id=' + $(this).val();
                }else{
                    window.location.href = window.location.href + '?category_id=' + $(this).val();
                }
            });
        });*/
    </script>
@append
