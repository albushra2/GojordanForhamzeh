{{-- resources/views/frontend/packages/partials/reviews.blade.php --}}

<div class="reviews-section">
    <h5 class="section-title">Customer Reviews</h5> {{-- Consistent title styling --}}

    @forelse ($reviews as $review)
        <div class="review-item mb-4 pb-4 border-bottom">
            <div class="d-flex align-items-center mb-2">
                <div class="avatar mr-3">
                    {{-- Placeholder or user avatar --}}
                    <i class="fas fa-user-circle fa-2x text-muted"></i>
                </div>
                <div>
                    <h6 class="mb-0 review-author">{{ $review->user->name ?? 'Anonymous' }}</h6>
                    <div class="review-rating">
                         @for ($i = 0; $i < 5; $i++)
                             @if ($review->rating > $i)
                                 <i class="fas fa-star text-warning"></i> {{-- Use Bootstrap warning for gold stars --}}
                             @else
                                 <i class="far fa-star text-muted"></i> {{-- Empty star --}}
                             @endif
                         @endfor
                    </div>
                </div>
            </div>
            <div class="review-comment">
                <p>{{ $review->comment }}</p>
            </div>
             <small class="text-muted review-date">{{ $review->created_at->format('M d, Y') }}</small>
        </div>
    @empty
        <div class="alert alert-info" role="alert">
            No reviews yet. Be the first to review this package!
        </div>
    @endforelse

    {{-- Review Submission Form --}}
    @auth('user') {{-- Only show the form if a user is logged in using the 'user' guard --}}
        <div class="add-review-form mt-5">
            <h5 class="section-title">Leave a Review</h5>

            {{-- Display validation errors --}}
             @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul class="mb-0">
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif

            {{--
                Assuming you have a route named 'reviews.store'
                that handles POST requests to save a new review.
                This form needs the travel_package_id to associate the review.
            --}}
            <form action="{{ route('reviews.store', $package) }}" method="POST"> {{-- Pass the package to the route --}}
                @csrf

                <div class="form-group">
                    <label for="rating">Your Rating</label>
                    <select name="rating" id="rating" class="form-control" required>
                        <option value="">Select Rating</option>
                        <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 Stars - Excellent</option>
                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Stars - Very Good</option>
                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Stars - Good</option>
                        <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Stars - Fair</option>
                        <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star - Poor</option>
                    </select>
                     @error('rating')
                         <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="comment">Your Review</label>
                    <textarea name="comment" id="comment" rows="4" class="form-control" required>{{ old('comment') }}</textarea>
                     @error('comment')
                         <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                </div>

                 {{-- Hidden field for package ID --}}
                 {{-- <input type="hidden" name="travel_package_id" value="{{ $package->id }}"> --}}
                 {{-- Passing package to the route params is often cleaner --}}

                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
    @else
        {{-- Message for users who are not logged in --}}
        <div class="alert alert-info mt-4" role="alert">
            <a href="{{ route('tourist_user.login') }}" class="alert-link">Login</a> to leave a review.
        </div>
    @endauth
</div>

<style>
    /* Styles for the Reviews Partial */
    .reviews-section {
        margin-top: 30px;
    }

    .section-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--color-primary); /* Primary color for section titles */
        margin-bottom: 25px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--color-light); /* Subtle separator */
    }

    .review-item {
        border-bottom: 1px solid #eee; /* Lighter separator for individual reviews */
    }
     .review-item:last-child {
         border-bottom: none; /* No border on the last item */
         padding-bottom: 0 !important;
     }

    .review-author {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--color-dark);
    }

    .review-rating i {
        font-size: 1rem;
        margin-right: 2px;
    }

    .review-comment p {
        font-size: 1rem;
        color: #444;
        line-height: 1.6;
        margin-bottom: 8px;
    }

    .review-date {
        font-size: 0.85rem;
        color: #888;
    }

    .add-review-form h5 {
         margin-bottom: 20px;
    }

    .add-review-form .form-group {
        margin-bottom: 20px;
    }

    .add-review-form label {
        font-weight: 600;
        color: var(--color-dark);
        margin-bottom: 8px;
    }

    .add-review-form .form-control {
        font-family: 'Open Sans', sans-serif;
        font-size: 1rem;
        border-radius: 5px;
         border-color: #ccc;
    }

    .add-review-form .btn-primary {
        background-color: var(--color-accent); /* Accent color for form button */
        border-color: var(--color-accent);
        color: var(--color-white);
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 25px;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .add-review-form .btn-primary:hover {
        background-color: #c0634d; /* Darker accent */
        border-color: #c0634d;
    }
     .add-review-form .alert {
         font-size: 0.95rem;
     }
      .add-review-form .invalid-feedback {
          font-size: 0.9rem;
      }

     .avatar i {
         color: var(--color-secondary); /* Secondary color for avatar icon */
     }
</style>