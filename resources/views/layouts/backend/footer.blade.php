<!-- Footer Start -->
<div class="flex-grow-1"></div>
<div class="app-footer">
   {{-- <div class="row">
        <div class="col-md-9">
            <p><strong>Palinus</strong></p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero quis beatae officia saepe perferendis voluptatum minima eveniet voluptates dolorum, temporibus nisi maxime nesciunt totam repudiandae commodi sequi dolor quibusdam
                sunt.
            </p>
        </div>
    </div>--}}
    <div class="footer-bottom  pt-3 d-flex flex-column flex-sm-row align-items-center">
{{--        <a class="btn btn-primary text-white btn-rounded" href="https://themeforest.net/user/mh_rafi" target="_blank">Buy--}}
{{--            Gull HTML</a>--}}
       <span class="flex-grow-1"></span>
        <div class="d-flex align-items-center">
            <img style="height:50px;" class="logo" src="{{asset('backend/assets/images/logo.png')}}" alt="">
            <div class="footer-content">
                <p class="m-0">&copy; {{date('Y')}} {{config('app.name')}}</p>
                <p class="m-0">All rights reserved</p>
            </div>
        </div>
    </div>
</div>
<!-- fotter end -->
