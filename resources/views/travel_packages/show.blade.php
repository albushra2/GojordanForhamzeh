@extends('layouts.frontend')
@section('title', 'Travel Package')
@section('content')
<!--==================== HOME ====================-->
<section>
  <div class="swiper-container gallery-top">
    <div class="swiper-wrapper">
      @foreach($travel_package->galleries as $gallery)
      <section class="islands swiper-slide">
        <img src="{{ Storage::url($gallery->images) }}" alt="" class="islands__bg" />

        <div class="islands__container container">
          <div class="islands__data">
            <h2 class="islands__subtitle">Explore</h2>
            <h1 class="islands__title">{{ $gallery->name }}</h1>
          </div>
        </div>
      </section>
      @endforeach
    </div>
  </div>

  <!--========== CONTROLS ==========-->
  <div class="controls gallery-thumbs">
    <div class="controls__container swiper-wrapper">
      @foreach($travel_package->galleries as $gallery)
      <img src="{{ Storage::url($gallery->images) }}" alt="" class="controls__img swiper-slide" />
      @endforeach
    </div>
  </div>
</section>

<section class="blog section" id="blog">
  <div class="blog__container container">
    <div class="content__container">
      <div class="blog__detail">
        {!! $travel_package->description !!}
      </div>
      <div class="package-travel">
        <h3>Booking Now</h3>
        <div class="card">
          <form id="bookingForm" action="{{ route('booking.store') }}" method="post" onsubmit="return validateForm()">
            @csrf
            <input type="hidden" name="travel_package_id" value="{{ $travel_package->id }}">
            @auth('travel_user')
            <input type="text" name="name" placeholder="Your Name" value="{{ Auth::guard('travel_user')->user()->name }}" />
            <input type="email" name="email" placeholder="Your Email" value="{{ Auth::guard('travel_user')->user()->email }}" />
            <input type="number" name="number_phone" placeholder="Your Number" value="{{ Auth::guard('travel_user')->user()->phone }}" />
            @else
            <input type="text" name="name" placeholder="Your Name" />
            <input type="email" name="email" placeholder="Your Email" />
            <input type="number" name="number_phone" placeholder="Your Number" />
            @endauth
            <input placeholder="Pick Your Date" class="textbox-n" type="text" name="date" onfocus="(this.type='date')" id="date" />

            @auth('travel_user')
            <div class="button-container">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
            @else
            <p>Please <a href="#" data-toggle="modal" data-target="#loginModal">Login</a> first to add the package.</p>
            @endauth
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section" id="popular">
  <div class="container">
    <span class="section__subtitle" style="text-align: center">Package Travel</span>
    <h2 class="section__title" style="text-align: center">The Best Tour For You</h2>

    <div class="popular__all">
      @foreach($travel_packages as $other_package)
      <article class="popular__card">
        <a href="{{ route('travel_package.show', $other_package->slug) }}">
          @if($other_package->galleries->first())
            <img src="{{ Storage::url($other_package->galleries->first()->images) }}" alt="" class="popular__img" />
          @else
            <img src="{{ asset('images/default-package.jpg') }}" alt="No Image" class="popular__img" />
          @endif
    
          <div class="popular__data">
            <h2 class="popular__price">{{ number_format($other_package->price,2) }}<span>JD</span></h2>
            <h3 class="popular__title">{{ $other_package->location }}</h3>
            <p class="popular__description">{{ $other_package->type }}</p>
          </div>
        </a>
      </article>
    @endforeach
    
</section>

@if(session()->has('message'))
<div id="alert" class="alert">
  {{ session()->get('message') }}
  <i class='bx bx-x alert-close' id="close"></i>
</div>
@endif
@endsection

@push('style-alt')
<style>
  .alert {
    position: absolute;
    top: 120px;
    left: 0;
    right: 0;
    background-color: var(--second-color);
    color: white;
    padding: 1rem;
    width: 70%;
    z-index: 99;
    margin: auto;
    border-radius: .25rem;
    text-align: center;
  }

  .alert-close {
    font-size: 1.5rem;
    color: #090909;
    position: absolute;
    top: .25rem;
    right: .5rem;
    cursor: pointer;
  }

  .button-container {
    text-align: center;
  }

  blockquote {
    border-left: 8px solid #b4b4b4;
    padding-left: 1rem;
  }

  .blog__detail ul li {
    list-style: initial;
  }

  .btn {
    display: inline-block;
    width: 100%;
    background: linear-gradient(101deg, #38c9d6, #29c4c7);
    color: #fff;
    padding: 14px 28px;
    border-radius: 0.5rem;
    font-size: 0.938rem;
    font-weight: 500;
    box-shadow: 0 4px 8px rgba(39, 69, 190, 0.25);
    transition: 0.3s;
    cursor: pointer;
  }

  .btn:hover {
    box-shadow: 0 4px 12px rgba(39, 69, 190, 0.25);
  }
</style>
@endpush

@push('script-alt')
<script>
  let galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 0,
    slidesPerView: 0,
  });

  let galleryTop = new Swiper('.gallery-top', {
    effect: 'fade',
    loop: true,
    thumbs: {
      swiper: galleryThumbs,
    },
  });

  const close = document.getElementById('close');
  const alert = document.getElementById('alert');
  if (close) {
    close.addEventListener('click', function () {
      alert.style.display = 'none';
    });
  }

  function validateForm() {
    const form = document.getElementById('bookingForm');
    const inputs = form.querySelectorAll('input[type="text"], input[type="email"], input[type="number"], input[name="date"]');
    let valid = true;

    inputs.forEach(input => {
      if (input.value.trim() === '') {
        valid = false;
        input.style.borderColor = 'red';
      } else {
        input.style.borderColor = '';
      }
    });

    if (!valid) {
      showAlert('Please fill out all fields.');
    }

    return valid;
  }

  function showAlert(message) {
    const alertDiv = document.createElement('div');
    alertDiv.classList.add('alert');
    alertDiv.innerHTML = `${message} <i class='bx bx-x alert-close' onclick="this.parentElement.style.display='none';"></i>`;
    document.body.appendChild(alertDiv);
    setTimeout(() => {
      alertDiv.style.display = 'none';
    }, 3000);
  }
</script>
@endpush
