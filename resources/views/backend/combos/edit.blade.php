@extends('layouts.backend.master')
@section('title')
    Edit Combo
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
                <form method="POST" action="{{route('backend.combos.update', $combo->id)}}" class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="w-25 float-left card-title m-0">Combo Details</h3>
                            <div class="dropdown dropleft text-right w-75 float-right">
                                <a href="{{route('backend.combos.create')}}" class="btn btn-raised btn-raised-primary m-1 pull-right"><i class="i-Add"></i> Add Combo</a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" name="name" value="{{old('name', $combo->name)}}" class="form-control form-control-line @error('name') is-invalid  @enderror" required autofocus/>
                                        @if ($errors->has('name'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" id="price" name="price" value="{{old('price', $combo->price)}}" class="form-control @error('price') is-invalid  @enderror" required/>
                                        </div>
                                        @if ($errors->has('price'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="active">Active</label>
                                        <label id="active" class="switch pr-5 switch-primary mr-3 mt-2" style="display: block">
                                            <span>Yes</span>
                                            <input name="is_active" type="checkbox" @if($combo->is_active) checked @endif value="1">
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
                                        <label for="lunch_promotion">Lunch Promotion</label>
                                        <label id="lunch_promotion" class="switch pr-5 switch-primary mr-3 mt-2" style="display: block">
                                            <span>Yes</span>
                                            <input name="lunch_promotion" type="checkbox" @if($combo->lunch_promotion == 1) checked @endif value="1">
                                            <span class="slider"></span>
                                        </label>
                                        @if ($errors->has('lunch_promotion'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('lunch_promotion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="thumb_url">Thumbnail</label>
                                        <input type="file" id="thumb_url" name="thumb_url" value="{{old('thumb_url')}}" class="form-control form-control-line @error('thumb_url') is-invalid  @enderror" style="padding-top: 4px;"/>
                                        @if(!empty($combo->thumb_url))
                                            <div id="current_thumb">
                                                <div><a href="{{route('backend.combos.delete_thumb', $combo->id)}}"><span class="badge badge-outline-primary">X</span></a></div>
                                                <img src="{{asset('uploads/'.$combo->thumb_url)}}"/>
                                            </div>
                                        @endif
                                        @if ($errors->has('thumb_url'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('thumb_url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="foods_ids" >Foods</label>
                                        <select id="foods_ids" multiple class="form-control form-control-line @error('foods_ids') is-invalid  @enderror" name="foods_ids[]">
                                        @foreach($categories as $category)
                                            @if(count($category->foods)>0)
                                                <optgroup label="{{$category->name}}">
                                                    @foreach($category->foods as $food)
                                                        <option @if(in_array($food->id, $combo->foods->pluck('id')->toArray())) selected @endif value="{{$food->id}}">{{$food->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endif
                                        @endforeach
                                        </select>
                                        @if ($errors->has('foods_ids'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('foods_ids') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="addons_ids" >Addons</label>
                                        <select id="addons_ids" multiple class="form-control form-control-line @error('addons_ids') is-invalid  @enderror" name="addons_ids[]">
                                            @foreach($addons as $index=>$addon)
                                                <option @if(in_array($addon->id, $combo->addons->pluck('id')->toArray())) selected @endif value="{{$addon->id}}">{{$addon->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('addons_ids'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('addons_ids') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control form-control-line @error('description') is-invalid  @enderror" rows="4">{{old('description', $combo->description)}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('description') }}</strong>
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
