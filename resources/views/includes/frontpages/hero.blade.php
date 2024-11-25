<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center mb-5 pb-2">
                    <h1 class="text-white">Catalouge</h1>
                    <p class="text-white">Ca' Amang's Cafe</p>
                </div>

                <div class="owl-carousel owl-theme">
                    @foreach ($products->take(6) as $hero)
                        <div class="owl-carousel-info-wrap item">
                            <img src="{{ asset('storage/' . $hero->photo) }}" class="owl-carousel-image img-fluid"
                                alt=""
                                style="object-fit: cover; width: 100%; height: 100%; aspect-ratio: 1 / 1;">

                            <div class="social-share">
                                <ul class="social-icon">
                                    <li class="social-icon-item">
                                        <a href="{{ route('catalouge.detail', $hero->id) }}"
                                            class="social-icon-link bi-three-dots-vertical"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
