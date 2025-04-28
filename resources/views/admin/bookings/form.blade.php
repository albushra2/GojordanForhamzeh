@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Booking Form for {{ ucfirst($location) }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf
                        <input type="hidden" name="travel_package_id" value="{{ $location }}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="number_phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="number_phone" name="number_phone" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Travel Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// سكريبت التحكم بالتاريخ
document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('date');
    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today); // يمنع اختيار تاريخ قبل اليوم

    // الأيام المغلقة (مثال)
    const closedDates = @json($closedDates ?? []);

    dateInput.addEventListener('input', function() {
        const selectedDate = this.value;
        if (closedDates.includes(selectedDate)) {
            alert('This date is fully booked. Please select another date.');
            this.value = '';
        }
    });
});
</script>
@endsection
