@extends('layouts.frontend')

@section('title', 'Profile')

@section('content')
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-10 col-md-12">
                <div class="card user-card-full">
                    <div class="col-sm-4 bg-c-lite-green user-profile">
                        <div class="card-block text-center text-white">
                            <div class="m-b-25">
                                <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                            </div>
                            <h6 class="f-w-600">{{ Auth::user()->name }}</h6>
                            <p>Web Designer</p>
                            <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card-block">
                            <div class="btn-container" style="text-align: right; margin-top: 10px;">
                                <a href="{{ route('homepage') }}" class="btn btn-primary" style="margin-right: 10px;">Home</a>
                                <form action="{{ route('touristlogout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Sign Out</button>
                                </form>
                            </div>
                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Email</p>
                                    <h6 class="text-muted f-w-400">{{ Auth::user()->email }}</h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Phone</p>
                                    <h6 class="text-muted f-w-400">Not Available</h6>
                                </div>
                            </div>
                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Recent</p>
                                    <h6 class="text-muted f-w-400">Not Available</h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Most Viewed</p>
                                    <h6 class="text-muted f-w-400">Not Available</h6>
                                </div>
                            </div>
                            <ul class="social-link list-unstyled m-t-40 m-b-10">
                                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="facebook"><i class="mdi mdi-facebook feather icon-facebook facebook"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="twitter"><i class="mdi mdi-twitter feather icon-twitter twitter"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="instagram"><i class="mdi mdi-instagram feather icon-instagram instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
