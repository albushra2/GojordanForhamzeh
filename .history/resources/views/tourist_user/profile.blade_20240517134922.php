@extends('layouts.frontend')

@section('title', 'Profile')

@section('content')
<style>
    body {
        background-color: #3DCFD3;
    }
    .padding {
        padding: 5rem !important;
    }
    .user-card-full {
        overflow: hidden;
        display: flex;
        flex-direction: row;
        height: 450px;
        background-color: #ffffff;
    }
    .card {
        border-radius: 5px;
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        margin-bottom: 30px;
        width: 100%;
    }
    .user-profile {
        border-radius: 5px 0 0 5px;
        background: linear-gradient(to right, #ee5a6f, #f29263);
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        height: 100%;
    }
    .user-profile img {
        border-radius: 50%;
    }
    .card-block {
        padding: 1.25rem;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    .btn-container {
        margin-top: auto;
    }
    .col-half {
        flex: 0 0 50%;
        max-width: 50%;
    }
    /* CSS for Sign Out button */
.btn {
    font-size: 14px;
    font-weight: 600;
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #dc3545; /* Red color for Sign Out button */
    border: none;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #c82333; /* Darker red color on hover */
}

</style>

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-10 col-md-12">
                <div class="card user-card-full">
                    <div class="col-half user-profile">
                        <div class="card-block text-center text-white">
                            <div>
                                <div class="m-b-25">
                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                </div>
                                <h6 class="f-w-600">{{ Auth::user()->name }}</h6>
                                <p>Web Designer</p>
                                <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                            <div class="btn-container">
                                <form action="{{ route('touristlogout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Sign Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-half">
                        <div class="card-block">
                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Email</p>
                                    <h6 class="text-muted f-w-400">{{ Auth::user()->email }}</h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Phone</p>
                                    <h6 class="text-muted f-w-400">{{ Auth::user()->phone }}</h6>
                                </div>
                            </div>
                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Bookings</h6>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list-group">
                                    @foreach($bookings as $booking)
                                            <li class="list-group-item">
                                                <strong>Booking ID:</strong> {{ $booking->id }}<br>
                                                <strong>Date:</strong> {{ $booking->date }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection