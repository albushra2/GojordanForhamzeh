@extends('layouts.app')

@section('content')
<style>
    /* Dashboard General Styles */
.content-header {
    background-color: #f8f9fa;
    padding: 20px 0;
    border-bottom: 1px solid #dee2e6;
}

.dashboard-card {
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,.1);
}

.card-body {
    padding: 20px;
}

/* Text Colors */
.text-primary {
    color: #007bff;
}

/* Statistics Boxes */
.statistics {
    display: flex;
    justify-content: space-around;
    padding: 20px 0;
}

.stat-box {
    text-align: center;
    padding: 10px;
    flex-grow: 1;
}

/* Responsiveness */
@media (max-width: 768px) {
    .statistics {
        flex-direction: column;
    }
}

</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary">{{ __('Dashboard') }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <p class="card-text">
                            {{ __('Welcome') }} {{ auth()->user()->name }}!
                        </p>
                        <div class="statistics">
                            <div class="stat-box">
                                <h4>{{ __('Total Bookings') }}</h4>
                                <p>123</p>
                            </div>
                            <div class="stat-box">
                                <h4>{{ __('Total Revenue') }}</h4>
                                <p>$45,670</p>
                            </div>
                            <div class="stat-box">
                                <h4>{{ __('Active Trips') }}</h4>
                                <p>56</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
