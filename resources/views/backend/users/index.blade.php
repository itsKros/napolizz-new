@section('title')
    List Users
@endsection

@extends('layouts.backend.master')
@section('content')
    <!-- content goes here -->

    <div class="row">
        <div class="col-md-12">
            <div class="card o-hidden">
                <div class="card-header d-flex align-items-center">
                    <h3 class="w-25 float-left card-title m-0">All Users</h3>
                    <div class="dropdown dropleft text-right w-75 float-right">
                        <form method="GET" style="display: inline;">
                            <input type="hidden" name="page" value="{{$page}}"/>
                            <input type="search" name="q" value="{{$q}}" placeholder="Enter search term" class="form-control"/>
                            <select id="role_id" class="form-control filter-input" name="role_id">
                                <option selected value="0">All Roles</option>
                                @foreach($roles as $role)
                                    <option @if($role_id == $role->id) selected @endif value="{{$role->id}}">{{ucfirst($role->name)}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-raised btn-raised-success m-1 pull-right" value="Filter"><i class="i-Filter-2"></i> Filter</button>
                        </form>
                        <a href="{{route('backend.users.index')}}" class="btn btn-raised btn-raised-secondary m-1 pull-right"><i class="i-Refresh"></i> Reset</a>
                        <div class="divider"></div>
                        <a href="{{route('backend.users.create')}}" class="btn btn-raised btn-raised-primary m-1 pull-right"><i class="i-Add"></i> Add User</a>
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
                                <th scope="col">Role</th>
                                <th scope="col">Email</th>
                                <th scope="col" width="150px">Created On</th>
                                <th scope="col" width="150px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users)===0)
                                <tr><td scope="col" colspan="6">Sorry, there are no users to display!</td></tr>
                            @endif
                            @foreach($users as $index=>$user)
                                <?php
                                switch ($user->role->id){
                                    case 1 :
                                        $class = 'badge-outline-danger';
                                        break;
                                    case 2 :
                                        $class = 'badge-outline-warning';
                                        break;
                                    case 3 :
                                        $class = 'badge-outline-info';
                                        break;
                                    case 4 :
                                        $class = 'badge-outline-success';
                                        break;
                                }

                                ?>
                                <tr>
                                    <th scope="row">{{(($users->currentPage()-1)*$users->perPage())+$index+1}}</th>
                                    <td>{{$user->name}}</td>
                                    <td><span class="badge {{$class}}">{{ucfirst($user->role->name)}}</span></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at->format('m/d/Y H:i')}}</td>
                                    <td>
                                        @if($user->role->id != 1)
                                            <a href="{{route('backend.users.edit', ['user'=>$user->id])}}" class="text-warning mr-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i> Edit
                                            </a>
                                            <a href="#" class="text-danger mr-2" data-value="form-delete-{{$user->id}}" data-toggle="modal" data-target=".bs-confirm-modal">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i> Delete
                                            </a>
                                            <form id="form-delete-{{$user->id}}" action="{{route('backend.users.destroy', ['user'=>$user->id])}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        @endif
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    @if(count($users)!=0)
                    <span>
                        Displaying {{(($users->currentPage()-1)*$users->perPage())+1}} to {{($users->currentPage()-1)*$users->perPage()+$index+1}}  of total {{$users->total()}} users
                    </span>
                    @endif
                    <div class="float-right">
                        {{$users->links()}}
                    </div>
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
