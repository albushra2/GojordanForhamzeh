@extends('layouts.app')

@section('content')
<style
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
