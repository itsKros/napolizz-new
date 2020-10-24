@section('title')
    List Categories
@endsection

@extends('layouts.backend.master')
@section('content')
    <!-- content goes here -->

    <div class="row">
        <div class="col-md-12">
            <div class="card o-hidden">
                <div class="card-header d-flex align-items-center">
                    <h3 class="w-25 float-left card-title m-0">All Categories</h3>
                    <div class="dropdown dropleft text-right w-75 float-right">
                        <form method="GET" style="display: inline;">
                            <input type="hidden" name="page" value="{{$page}}"/>
                            <input type="search" name="q" value="{{$q}}" placeholder="Enter search term" class="form-control"/>
                            <button type="submit" class="btn btn-raised  btn-raised-success m-1 pull-right" value="Filter"><i class="i-Filter-2"></i> Filter</button>
                        </form>
                        <a href="{{route('backend.categories.index')}}" class="btn btn-raised btn-raised-secondary m-1 pull-right"><i class="i-Refresh"></i> Reset</a>
                        <div class="divider"></div>
                        <a href="{{route('backend.categories.create')}}" class="btn btn-raised btn-raised-primary m-1 pull-right"><i class="i-Add"></i> Add Category</a>
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
                                <th scope="col" width="150px">Created On</th>
                                <th scope="col" width="150px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($categories)===0)
                                <tr><td scope="col" colspan="4">Sorry, there are no categories to display!</td></tr>
                            @endif
                            @foreach($categories as $index=>$category)
                                <tr>
                                    <th scope="row">{{(($categories->currentPage()-1)*$categories->perPage())+$index+1}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at->format('m/d/Y H:i')}}</td>
                                    <td>
                                        <a href="{{route('backend.categories.edit', ['category'=>$category->id])}}" class="text-warning mr-2">
                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i> Edit
                                        </a>
                                        <a href="#" class="text-danger mr-2" data-value="form-delete-{{$category->id}}" data-toggle="modal" data-target=".bs-confirm-modal">
                                            <i class="nav-icon i-Close-Window font-weight-bold"></i> Delete
                                        </a>
                                        <form id="form-delete-{{$category->id}}" action="{{route('backend.categories.destroy', ['category'=>$category->id])}}" method="POST">
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
                    @if(count($categories)!=0)
                    <span>
                        Displaying {{(($categories->currentPage()-1)*$categories->perPage())+1}} to {{($categories->currentPage()-1)*$categories->perPage()+$index+1}}  of total {{$categories->total()}} categories.
                    </span>
                    <div class="float-right">
                        {{$categories->links()}}
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
