@section('title')
    Dashboard
@endsection

@extends('layouts.backend.master')
@section('content')
    <!-- content goes here -->

    <div class="row">
        <!-- ICON BG -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center p-4">
                    <i class="i-MaleFemale"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">All Users</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{$all_users_count}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center p-4">
                    <i class="i-Check"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">All Categories</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{$all_categories_count}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center p-4">
                    <i class="i-Coffee-Machine"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">All Foods</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{$all_foods_count}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center p-4">
                    <i class="i-Add"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">All Addons</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{$all_addons_count}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center p-4">
                    <i class="i-Gift-Box"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">All Combos</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{$all_combos_count}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center p-4">
                    <i class="i-Shop"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">All Outlets</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{$all_outlets_count}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center p-4">
                    <i class="i-Remove"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Refunded Transactions</p>
                        <p class="text-primary text-24 line-height-1 mb-2">0</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center p-4">
                    <i class="i-Yes"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Succeeded Transactions</p>
                        <p class="text-primary text-24 line-height-1 mb-2">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ Body content End ============= -->

    <!-- end of main content -->
@endsection
