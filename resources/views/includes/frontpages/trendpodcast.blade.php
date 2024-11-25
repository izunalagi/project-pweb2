<section class="trending-podcast-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Trending Post</h4>
                </div>
            </div>
            @foreach ($posts->take(3) as $page)
                <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                    <div class="custom-block custom-block-full">
                        <div class="custom-block-image-wrap">
                            <a href="detail-page.html">
                                <img src="{{ asset('storage/' . $page->photo) }}" class="custom-block-image img-fluid"
                                    alt="">
                            </a>
                        </div>

                        <div class="custom-block-info">
                            <h5 class="mb-2">
                                <a href="detail-page.html">
                                    {{ $page->title }}
                                </a>
                            </h5>

                            <div class="profile-block d-flex">
                                <img src="{{ asset('frontend/images/profile/user.png') }}"
                                    class="profile-block-image img-fluid" alt="">

                                <p>Farel
                                    <strong>Staff</strong>
                                </p>
                            </div>

                            <p class="mb-0">{{ $page->description }}</p>

                            <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                <a href="#" class="bi-cursor me-1">
                                    <span>100k</span>
                                </a>

                                <a href="#" class="bi-heart me-1">
                                    <span>2.5k</span>
                                </a>

                                <a href="#" class="bi-chat me-1">
                                    <span>924k</span>
                                </a>
                            </div>
                        </div>

                        <div class="social-share d-flex flex-column ms-auto">
                            <a href="#" class="badge ms-auto">
                                <i class="bi-heart"></i>
                            </a>

                            <a href="#" class="badge ms-auto">
                                <i class="bi-bookmark"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-full">
                    <div class="custom-block-image-wrap">
                        <a href="detail-page.html">
                            <img src="{{ asset('frontend/images/podcast/27670664_7369753.jpg') }}"
                                class="custom-block-image img-fluid" alt="">
                        </a>
                    </div>

                    <div class="custom-block-info">
                        <h5 class="mb-2">
                            <a href="detail-page.html">
                                Vintage Show
                            </a>
                        </h5>

                        <div class="profile-block d-flex">
                            <img src="{{ asset('frontend/images/profile/cute-smiling-woman-outdoor-portrait.jpg') }}"
                                class="profile-block-image img-fluid" alt="">

                            <p>
                                Taylor
                                <img src="{{ asset('frontend/images/verified.png') }}" class="verified-image img-fluid"
                                    alt="">
                                <strong>Creator</strong>
                            </p>
                        </div>

                        <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                        <div class="custom-block-bottom d-flex justify-content-between mt-3">
                            <a href="#" class="bi-headphones me-1">
                                <span>100k</span>
                            </a>

                            <a href="#" class="bi-heart me-1">
                                <span>2.5k</span>
                            </a>

                            <a href="#" class="bi-chat me-1">
                                <span>924k</span>
                            </a>
                        </div>
                    </div>

                    <div class="social-share d-flex flex-column ms-auto">
                        <a href="#" class="badge ms-auto">
                            <i class="bi-heart"></i>
                        </a>

                        <a href="#" class="badge ms-auto">
                            <i class="bi-bookmark"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <div class="custom-block custom-block-full">
                    <div class="custom-block-image-wrap">
                        <a href="detail-page.html">
                            <img src="{{ asset('frontend/images/podcast/12577967_02.jpg') }}"
                                class="custom-block-image img-fluid" alt="">
                        </a>
                    </div>

                    <div class="custom-block-info">
                        <h5 class="mb-2">
                            <a href="detail-page.html">
                                Daily Talk
                            </a>
                        </h5>

                        <div class="profile-block d-flex">
                            <img src="{{ asset('frontend/images/profile/handsome-asian-man-listening-music-through-headphones.jpg') }}"
                                class="profile-block-image img-fluid" alt="">

                            <p>
                                William
                                <img src="{{ asset('frontend/images/verified.png') }}" class="verified-image img-fluid"
                                    alt="">
                                <strong>Vlogger</strong>
                            </p>
                        </div>

                        <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                        <div class="custom-block-bottom d-flex justify-content-between mt-3">
                            <a href="#" class="bi-headphones me-1">
                                <span>100k</span>
                            </a>

                            <a href="#" class="bi-heart me-1">
                                <span>2.5k</span>
                            </a>

                            <a href="#" class="bi-chat me-1">
                                <span>924k</span>
                            </a>
                        </div>
                    </div>

                    <div class="social-share d-flex flex-column ms-auto">
                        <a href="#" class="badge ms-auto">
                            <i class="bi-heart"></i>
                        </a>

                        <a href="#" class="badge ms-auto">
                            <i class="bi-bookmark"></i>
                        </a>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</section>
