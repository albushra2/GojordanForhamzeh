@extends('layouts.frontend')
@section('title', 'GoJordan')
@section('content')

<!--==================== HOME ====================-->
<section>
    <div class="swiper-container">
        <div>
            <!--========== ISLANDS 1 ==========-->
            <section class="islands">
                <img
                    src="{{ asset('frontend/assets/img/waaderam.jpeg') }}"
                    alt=""
                    class="islands__bg"
                />
                <div class="bg__overlay">
                    <div class="islands__container container">
                        <div
                            class="islands__data"
                            style="z-index: 99; position: relative"
                        >
                        <h2 class="islands__subtitle">
                            Discover
                        </h2>
                        <h1 class="islands__title">
                            The Magic of Jordan
                        </h1>
                        <p class="islands__description">
                            It’s the perfect time to explore Jordan’s rich history,<br />
                            breathtaking nature, and unforgettable adventures.
                        </p>
                        
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<!--==================== LOGOS ====================-->
<section class="logos" style="margin-top: 9rem; padding-bottom: 3rem">
    <h2 class="section__title"  style="text-align: center;">Strategic Partners</h2>
<p class="section__subtitle"  style="text-align: center;" >Collaborating with Jordan's premier travel and tourism providers</p>
    <div class="logos__container container grid">
        <div class="logos__img" style="text-align: center;">
            <img src="{{ asset('frontend/assets/img/royal-jordanian.png') }}" alt="Royal Jordanian" />
            <p style="margin-top: 0.5rem;">Royal Jordanian Airlines</p>
        </div>
        <div class="logos__img" style="text-align: center;">
            <img src="{{ asset('frontend/assets/img/visit-jordan.png') }}" alt="Visit Jordan" />
            <p style="margin-top: 0.5rem;">Visit Jordan - Tourism Portal</p>
        </div>
        <div class="logos__img" style="text-align: center;">
            <img src="{{ asset('frontend/assets/img/jett.png') }}" alt="Jett" />
            <p style="margin-top: 0.5rem;">Jett - Jordan Express Tourist Transport</p>
        </div>
        <div class="logos__img" style="text-align: center;">
            <img src="{{ asset('frontend/assets/img/jordan-tourism-board.png') }}" alt="Jordan Tourism Board" />
            <p style="margin-top: 0.5rem;">Jordan Tourism Board</p>
        </div>
    </div>
</section>


{{-- Discover Jordan's Wonders --}}

<section class="section" id="popular" style="padding: 5rem 0; background: #f9f9f9;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
        <span class="section__subtitle" style="display: block; text-align: center; color: #666; font-size: 1.1rem; margin-bottom: 0.5rem;">
            Discover Jordan's Wonders
        </span>
        <h2 class="section__title" style="text-align: center; font-size: 2.2rem; color: #333; margin-bottom: 3rem;">
            Must-Visit Destinations
        </h2>

        <div class="popular__container swiper" style="padding-bottom: 3rem;">
            <div class="swiper-wrapper">
                <!-- All cards with consistent sizing -->
                <article class="popular__card swiper-slide" style="background: #fff; border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 400px; display: flex; flex-direction: column;">
                    <div style="height: 200px; overflow: hidden; flex-shrink: 0;">
                        <img src="{{ asset('images/petra.jpeg') }}" alt="Petra" style="width: 100%; height: 100%; object-fit: cover;"/>
                    </div>
                    <div class="popular__data" style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 style="font-size: 1.4rem; margin-bottom: 0.8rem; color: #222;">Petra</h3>
                        <p style="color: #555; line-height: 1.6; font-size: 0.95rem; margin-bottom: 0; flex-grow: 1;">
                            The legendary "Rose City" carved into pink sandstone cliffs, Petra is Jordan's most famous 
                            archaeological site and one of the New7Wonders of the World. Explore the Treasury, 
                            Monastery, and ancient Nabatean ruins.
                        </p>
                    </div>
                </article>

                <article class="popular__card swiper-slide" style="background: #fff; border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 400px; display: flex; flex-direction: column;">
                    <div style="height: 200px; overflow: hidden; flex-shrink: 0;">
                        <img src="{{ asset('images/deadsea.jpeg') }}" alt="Dead Sea" style="width: 100%; height: 100%; object-fit: cover;"/>
                    </div>
                    <div class="popular__data" style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 style="font-size: 1.4rem; margin-bottom: 0.8rem; color: #222;">Dead Sea</h3>
                        <p style="color: #555; line-height: 1.6; font-size: 0.95rem; margin-bottom: 0; flex-grow: 1;">
                            Float effortlessly in the hypersaline waters of Earth's lowest point. The Dead Sea's 
                            mineral-rich mud and waters have therapeutic properties, making it a perfect 
                            destination for relaxation and wellness.
                        </p>
                    </div>
                </article>

                <article class="popular__card swiper-slide" style="background: #fff; border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 400px; display: flex; flex-direction: column;">
                    <div style="height: 200px; overflow: hidden; flex-shrink: 0;">
                        <img src="{{ asset('images/waaderam.jpeg') }}" alt="Wadi Rum" style="width: 100%; height: 100%; object-fit: cover;"/>
                    </div>
                    <div class="popular__data" style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 style="font-size: 1.4rem; margin-bottom: 0.8rem; color: #222;">Wadi Rum</h3>
                        <p style="color: #555; line-height: 1.6; font-size: 0.95rem; margin-bottom: 0; flex-grow: 1;">
                            Known as the "Valley of the Moon", this stunning desert landscape features dramatic 
                            sandstone mountains, ancient rock carvings, and Bedouin culture. Experience 
                            jeep safaris, camel rides, and incredible stargazing.
                        </p>
                    </div>
                </article>

                <article class="popular__card swiper-slide" style="background: #fff; border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 400px; display: flex; flex-direction: column;">
                    <div style="height: 200px; overflow: hidden; flex-shrink: 0;">
                        <img src="{{ asset('images/Jerash.jpeg') }}" alt="Jerash" style="width: 100%; height: 100%; object-fit: cover;"/>
                    </div>
                    <div class="popular__data" style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 style="font-size: 1.4rem; margin-bottom: 0.8rem; color: #222;">Jerash</h3>
                        <p style="color: #555; line-height: 1.6; font-size: 0.95rem; margin-bottom: 0; flex-grow: 1;">
                            One of the best-preserved Roman provincial cities in the world, Jerash boasts 
                            impressive colonnaded streets, grand temples, and well-preserved theaters. 
                            Don't miss the chariot races at the hippodrome.
                        </p>
                    </div>
                </article>

                <article class="popular__card swiper-slide" style="background: #fff; border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 400px; display: flex; flex-direction: column;">
                    <div style="height: 200px; overflow: hidden; flex-shrink: 0;">
                        <img src="{{ asset('images/aqaba.jpeg') }}" alt="Aqaba" style="width: 100%; height: 100%; object-fit: cover;"/>
                    </div>
                    <div class="popular__data" style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 style="font-size: 1.4rem; margin-bottom: 0.8rem; color: #222;">Aqaba</h3>
                        <p style="color: #555; line-height: 1.6; font-size: 0.95rem; margin-bottom: 0; flex-grow: 1;">
                            Jordan's only coastal city offers pristine Red Sea coral reefs perfect for diving 
                            and snorkeling. Enjoy year-round sunshine, luxury resorts, and water sports 
                            in this tropical paradise.
                        </p>
                    </div>
                </article>

                <article class="popular__card swiper-slide" style="background: #fff; border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 400px; display: flex; flex-direction: column;">
                    <div style="height: 200px; overflow: hidden; flex-shrink: 0;">
                        <img src="{{ asset('images/Madaba3.jpeg') }}" alt="Madaba" style="width: 100%; height: 100%; object-fit: cover;"/>
                    </div>
                    <div class="popular__data" style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 style="font-size: 1.4rem; margin-bottom: 0.8rem; color: #222;">Madaba</h3>
                        <p style="color: #555; line-height: 1.6; font-size: 0.95rem; margin-bottom: 0; flex-grow: 1;">
                            Known as the "City of Mosaics", Madaba is famous for its Byzantine-era map of 
                            the Holy Land in St. George's Church. Explore numerous archaeological sites 
                            and beautiful churches with intricate mosaic floors.
                        </p>
                    </div>
                </article>

                <article class="popular__card swiper-slide" style="background: #fff; border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 400px; display: flex; flex-direction: column;">
                    <div style="height: 200px; overflow: hidden; flex-shrink: 0;">
                        <img src="{{ asset('images/BiosphereDana.jpeg') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;"/>
                    </div>
                    <div class="popular__data" style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <h3 style="font-size: 1.4rem; margin-bottom: 0.8rem; color: #222;">Dana Biosphere</h3>
                        <p style="color: #555; line-height: 1.6; font-size: 0.95rem; margin-bottom: 0; flex-grow: 1;">
                            Jordan's largest nature reserve encompasses four different bio-geographical zones. 
                            Hike through spectacular scenery, spot rare wildlife, and experience authentic 
                            village life in Dana.
                        </p>
                    </div>
                </article>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next" style="color: rgb(20, 20, 20); right: 10px; background: rgba(245, 247, 245, 0.8); padding: 20px; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chevron-right" style="font-size: 1.2rem;"></i>
            </div>
            <div class="swiper-button-prev" style="color: rgb(19, 19, 1Dana BiosphereDana Biosphere9); left: 10px; background: rgba(248, 250, 249, 0.8); padding: 20px; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chevron-left" style="font-size: 1.2rem;"></i>
            </div>
        </div>
    </div>
</section>


<!--==================== VALUE ====================-->
<section class="value section" id="value">
    <div class="value__container container grid">
        <div class="value__images">
            <div class="value__orbe"></div>

            <div class="value__img">
                <img src="{{ asset('frontend/assets/img/saltat.jpeg') }}" alt="Our Team in Jordan" />
            </div>
        </div>

        <div class="value__content">
            <div class="value__data">
                <span class="section__subtitle">Why Jordan?</span>
                <h2 class="section__title">
                    Discover the True Magic of Jordan with Us
                </h2>
                <p class="value__description">
                    Whether you’re seeking ancient wonders, natural beauty, or warm hospitality – Jordan has it all. 
                    We’re here to make your journey unforgettable with our expert guidance and personalized tours.
                </p>
            </div>

            <div class="value__accordion">
                <!-- Petra & Historical Sites -->
                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-landmark value-accordion-icon"></i>
                        <h3 class="value__accordion-title">Explore World Wonders</h3>
                        <div class="value__accordion-arrow">
                            <i class="bx bxs-down-arrow"></i>
                        </div>
                    </header>
                    <div class="value__accordion-content">
                        <p class="value__accordion-description">
                            We provides the best places around the
                            world and have a good quality of
                            service.
                        </p>
                    </div>
                </div>

                <!-- Affordable Travel -->
                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-wallet value-accordion-icon"></i>
                        <h3 class="value__accordion-title">Affordable Travel Packages</h3>
                        <div class="value__accordion-arrow">
                            <i class="bx bxs-down-arrow"></i>
                        </div>
                    </header>
                    <div class="value__accordion-content">
                        <p class="value__accordion-description">
                            We offer flexible pricing and customized packages to match every traveler's budget.
                        </p>
                    </div>
                </div>

                <!-- Natural Beauty -->
                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-sun value-accordion-icon"></i>
                        <h3 class="value__accordion-title">Nature & Adventure</h3>
                        <div class="value__accordion-arrow">
                            <i class="bx bxs-down-arrow"></i>
                        </div>
                    </header>
                    <div class="value__accordion-content">
                        <p class="value__accordion-description">
                            Dive into the beauty of Wadi Rum, the Dead Sea, and Dana Reserve – adventure awaits at every corner.
                        </p>
                    </div>
                </div>

                <!-- Safe & Welcoming -->
                <div class="value__accordion-item">
                    <header class="value__accordion-header">
                        <i class="bx bxs-shield-plus value-accordion-icon"></i>
                        <h3 class="value__accordion-title">Safe & Welcoming Country</h3>
                        <div class="value__accordion-arrow">
                            <i class="bx bxs-down-arrow"></i>
                        </div>
                    </header>
                    <div class="value__accordion-content">
                        <p class="value__accordion-description">
                            Jordan is known for its safety and the warm hospitality of its people – feel right at home!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- blog -->
<section class="blog section" id="blog">
    <div class="blog__container container">
        <span class="section__subtitle" style="text-align: center">
            Jordan Travel Guide
        </span>
        <h2 class="section__title" style="text-align: center">
            Articles & Tips to Explore Jordan
        </h2>

        <div class="blog__content grid">
            @foreach($blogs as $blog)
                <article class="blog__card">
                    <div class="blog__image">
                        <img
                            src="{{ Storage::url($blog->image) }}"
                            alt="Image - {{ $blog->title }}"
                            class="blog__img"
                        />
                        <a href="{{ route('blog.show', $blog->slug) }}" class="blog__button">
                            <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>

                    <div class="blog__data">
                        <h2 class="blog__title">
                            {{ $blog->title }}
                        </h2>
                        <p class="blog__description">
                            {{ $blog->excerpt }}
                        </p>

                        <div class="blog__footer">
                            <div class="blog__reaction">
                                {{ date('d M Y', strtotime($blog->created_at)) }}
                            </div>
                            <div class="blog__reaction">
                                <i class="bx bx-show"></i>
                                <span>{{ $blog->reads }}</span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

@endsection