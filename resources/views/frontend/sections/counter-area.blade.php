<!-- counter area -->
<div class="counter-area pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                    <div class="icon">
                        <i class="flaticon-car-rental"></i>
                    </div>
                    <div>
                        <span class="counter" data-count="+" data-to="{{\App\Helpers\Helper::getCounters()->total_cars}}" data-speed="3000">{{\App\Helpers\Helper::getCounters()->total_cars}}</span>
                        <h6 class="title">+ Available Cars </h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                    <div class="icon">
                        <i class="flaticon-car-key"></i>
                    </div>
                    <div>
                        <span class="counter" data-count="+" data-to="{{\App\Helpers\Helper::getCounters()->total_clients}}" data-speed="3000">{{\App\Helpers\Helper::getCounters()->total_clients}}</span>
                        <h6 class="title">+ Happy Clients</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                    <div class="icon">
                        <i class="flaticon-screwdriver"></i>
                    </div>
                    <div>
                        <span class="counter" data-count="+" data-to="{{\App\Helpers\Helper::getCounters()->team_workers}}" data-speed="3000">{{\App\Helpers\Helper::getCounters()->team_workers}}</span>
                        <h6 class="title">+ Team Workers</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                    <div class="icon">
                        <i class="flaticon-review"></i>
                    </div>
                    <div>
                        <span class="counter" data-count="+" data-to="{{\App\Helpers\Helper::getCounters()->years_of_experience}}" data-speed="3000">{{\App\Helpers\Helper::getCounters()->years_of_experience}}</span>
                        <h6 class="title">+ Years Of Experience</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- counter area end -->