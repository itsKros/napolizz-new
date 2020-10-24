@php
    function isActive($str){
        return strpos(request()->route()->getAction()['as'] , $str)!==false;
    }
@endphp
<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left" >
            <li class="nav-item {{ isActive('backend.home')? 'active' : ''}}">
                <a class="nav-item-hold" href="{{route('backend.home')}}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ isActive('backend.users')? 'active' : ''}}">
                <a class="nav-item-hold" href="{{route('backend.users.index')}}">
                    <i class="nav-icon i-Business-ManWoman"></i>
                    <span class="nav-text">Users</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ isActive('backend.categories')? 'active' : ''}}">
                <a class="nav-item-hold" href="{{route('backend.categories.index')}}">
                    <i class="nav-icon i-Check"></i>
                    <span class="nav-text">Categories</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ isActive('backend.foods')? 'active' : ''}}">
                <a class="nav-item-hold" href="{{route('backend.foods.index')}}">
                    <i class="nav-icon i-Coffee-Machine"></i>
                    <span class="nav-text">Foods</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ isActive('backend.combos')? 'active' : ''}}">
                <a class="nav-item-hold" href="{{route('backend.combos.index')}}">
                    <i class="nav-icon i-Gift-Box"></i>
                    <span class="nav-text">Combos</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ isActive('backend.addons')? 'active' : ''}}">
                <a class="nav-item-hold" href="{{route('backend.addons.index')}}">
                    <i class="nav-icon i-Add"></i>
                    <span class="nav-text">Addons</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ isActive('backend.outlets')? 'active' : ''}}">
                <a class="nav-item-hold" href="{{route('backend.outlets.index')}}">
                    <i class="nav-icon i-Shop"></i>
                    <span class="nav-text">Outlets</span>
                </a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Leads -->
        {{--<ul class="childNav" data-parent="users">
            <li class="nav-item ">
                <a class="{{isActive('backend.leads.index')? 'open' : ''}}" href="--}}{{--{{route('backend.leads.index')}}--}}{{--">
                    <i class="nav-icon i-Receipt-4"></i>
                    <span class="item-name">List Leads</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{isActive('backend.leads.create')? 'open' : ''}}" href="--}}{{--{{route('backend.leads.create')}}--}}{{--">
                    <i class="nav-icon i-Add"></i>
                    <span class="item-name">Add Lead</span>
                </a>
            </li>
        </ul>--}}
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
