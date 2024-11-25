<section class="topics-section section-padding pb-0" id="section_3">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Products</h4>
                </div>
            </div>
            @foreach ($products->take(4) as $item)
                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block custom-block-overlay">
                        <a href="{{ route('catalouge.detail', $item->id) }}" class="custom-block-image-wrap">
                            <img src="{{ asset('storage/' . $item->photo) }}" class="custom-block-image img-fluid"
                                alt="">
                        </a>

                        <div class="custom-block-info custom-block-overlay-info">
                            <h5 class="mb-1">
                                <a href="listing-page.html">
                                    {{ $item->name }}
                                </a>
                            </h5>

                            <p class="badge mb-0">{{ $item->fkProductDetail->unit }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-overlay">
                    <a href="detail-page.html" class="custom-block-image-wrap">
                        <img src="{{ asset('frontend/images/topics/repairman-doing-air-conditioner-service.jpg') }}"
                            class="custom-block-image img-fluid" alt="">
                    </a>

                    <div class="custom-block-info custom-block-overlay-info">
                        <h5 class="mb-1">
                            <a href="listing-page.html">
                                Technician
                            </a>
                        </h5>

                        <p class="badge mb-0">12 Episodes</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-overlay">
                    <a href="detail-page.html" class="custom-block-image-wrap">
                        <img src="{{ asset('frontend/images/topics/woman-practicing-yoga-mat-home.jpg') }}"
                            class="custom-block-image img-fluid" alt="">
                    </a>

                    <div class="custom-block-info custom-block-overlay-info">
                        <h5 class="mb-1">
                            <a href="listing-page.html">
                                Mindfullness
                            </a>
                        </h5>

                        <p class="badge mb-0">35 Episodes</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-overlay">
                    <a href="detail-page.html" class="custom-block-image-wrap">
                        <img src="{{ asset('frontend/images/topics/delicious-meal-with-sambal-arrangement.jpg') }}"
                            class="custom-block-image img-fluid" alt="">
                    </a>

                    <div class="custom-block-info custom-block-overlay-info">
                        <h5 class="mb-1">
                            <a href="listing-page.html">
                                Cooking
                            </a>
                        </h5>

                        <p class="badge mb-0">12 Episodes</p>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</section>
