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

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Booking Type</label>
                            <select class="form-control" name="group_type" id="group_type" required>
                                <option value="">Select booking type</option>
                                <option value="individual">Individual</option>
                                <option value="family">Family</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="guest_count" class="form-label">How many guests?</label>
                            <input type="number" class="form-control" id="guest_count" name="guest_count" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="guest_ages" class="form-label">Ages of the guests (separated by commas)</label>
                            <input type="text" class="form-control" id="guest_ages" name="guest_ages" placeholder="e.g., 30,28,5">
                        </div>
                                                

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="number_phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="number_phone" name="number_phone" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Travel Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>

                        <!-- New Fields -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="total_guests" class="form-label">Number of Guests</label>
                                <select class="form-control" id="total_guests" name="total_guests" required>
                                    <option value="1">1 Person</option>
                                    <option value="2">2 People</option>
                                    <option value="3">3 People</option>
                                    <option value="4">4 People</option>
                                    <option value="5">5 People</option>
                                    <option value="6+">6+ People (Contact Us)</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="children_count" class="form-label">Number of Children (under 12)</label>
                                <input type="number" class="form-control" id="children_count" name="children_count" min="0" value="0">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="special_requests" class="form-label">Special Requests</label>
                            <textarea class="form-control" id="special_requests" name="special_requests" rows="3"></textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms_agreed" name="terms_agreed" required>
                            <label class="form-check-label" for="terms_agreed">I agree to the terms and conditions</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('date');
    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);

    const closedDates = @json($closedDates ?? []);
    const maxGuests = @json($maxCapacity ?? 50); // يجب تمرير هذه القيمة من الكونترولر

    dateInput.addEventListener('input', function() {
        const selectedDate = this.value;
        if (closedDates.includes(selectedDate)) {
            alert('This date is fully booked. Please select another date.');
            this.value = '';
        }
    });

    // التحقق من عدد الضيوف
    const guestsSelect = document.getElementById('total_guests');
    guestsSelect.addEventListener('change', function() {
        if (this.value === '6+') {
            alert('For groups larger than 5, please contact us directly for special arrangements.');
        }
    });
});
</script>
@endsection