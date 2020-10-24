@section('title')
    List Outlets
@endsection

@extends('layouts.backend.master')
@section('content')
    <!-- content goes here -->

    <div class="row">
        <div class="col-md-12">
            <div class="card o-hidden">
                <div class="card-header d-flex align-items-center">
                    <h3 class="w-25 float-left card-title m-0">All Outlets</h3>
                    <div class="dropdown dropleft text-right w-75 float-right">
                        <form method="GET" style="display: inline;">
                            <input type="hidden" name="page" value="{{$page}}"/>
                            <input type="search" name="q" value="{{$q}}" placeholder="Enter search term" class="form-control"/>
                            <select id="active" class="form-control filter-input" name="active">
                                <option @if($active == 0) selected @endif value="0">All Active Status</option>
                                <option @if($active == 1) selected @endif value="1">No</option>
                                <option @if($active == 2) selected @endif value="2">Yes</option>
                            </select>
                            <button type="submit" class="btn btn-raised btn-raised-success m-1 pull-right" value="Filter"><i class="i-Filter-2"></i> Filter</button>
                        </form>
                        <a href="{{route('backend.outlets.index')}}" class="btn btn-raised btn-raised-secondary m-1 pull-right"><i class="i-Refresh"></i> Reset</a>
                        <div class="divider"></div>
                        <a href="{{route('backend.outlets.create')}}" class="btn btn-raised btn-raised-primary m-1 pull-right"><i class="i-Add"></i> Add Outlet</a>
                    </div>
                </div>
                <div class="card-body">
                    @include('layouts.backend.alert')
                    <div  class="table-responsive table-hover table-striped table-bordered">
                        <table id="zero_configuration_table" class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="20px">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" width="75px">Phone</th>
                                <th scope="col" width="75px">Active</th>
                                <th scope="col" width="75px">City</th>
                                <th scope="col" width="120px">Created On</th>
                                <th scope="col" width="120px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($outlets)===0) 
                                <tr><td scope="col" colspan="7">Sorry, there are no outlets to display!</td></tr>
                            @endif
                            @foreach($outlets as $index=>$outlet)
                                <tr>
                                    <th scope="row">{{(($outlets->currentPage()-1)*$outlets->perPage())+$index+1}}</th>
                                    <td>{{$outlet->name}}</td>
                                    <td>{{$outlet->phone}}</td>
                                    <td><span class="badge @if($outlet->is_active) badge-outline-success @else badge-outline-danger @endif">{{$outlet->is_active==1 ? 'Yes' : 'No'}}</span></td>
                                    <td>{{$outlet->city}}</td>
                                    <td>{{$outlet->created_at->format('m/d/Y H:i')}}</td>
                                    <td>
                                        <a href="{{route('backend.outlets.edit', ['outlet'=>$outlet->id])}}" class="text-warning mr-2">
                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i> Edit
                                        </a>
                                        <a href="#" class="text-danger mr-2" data-value="form-delete-{{$outlet->id}}" data-toggle="modal" data-target=".bs-confirm-modal">
                                            <i class="nav-icon i-Close-Window font-weight-bold"></i> Delete
                                        </a>
                                        <form id="form-delete-{{$outlet->id}}" action="{{route('backend.outlets.destroy', ['outlet'=>$outlet->id])}}" method="POST">
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
                    @if(count($outlets)!=0)
                    <span>
                        Displaying {{(($outlets->currentPage()-1)*$outlets->perPage())+1}} to {{($outlets->currentPage()-1)*$outlets->perPage()+$index+1}}  of total {{$outlets->total()}} outlets.
                    </span>
                    <div class="float-right">
                        {{$outlets->links()}}
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
    </script>
@append
