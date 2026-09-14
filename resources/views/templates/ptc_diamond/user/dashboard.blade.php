@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="row g-4 g-lg-3 g-xxl-4">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                    <span class="dashboard-widget__title">
                        @lang('Total Post')
                    </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            {{ showAmount($post) }}
                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                    <span class="dashboard-widget__title">
                        @lang('Total Your Post')
                    </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            {{ $my }}
                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                        <i class="fas fa-credit-card"></i>
                    </span>
                </div>
            </div>
        </div>


    </div>
@endsection
