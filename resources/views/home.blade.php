@extends('layouts.app')


@push('botcss')
    <style>
        .carousel-caption {
            bottom: 220px;
            z-index: 2;
        }

        .carousel-caption h5 {
            font-size: 25px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 12px
        }

        .carousel-caption p {
            width: 60%;
            margin: auto;
            font-size: 18px;
            line-height: 1.9;
        }

        /* .carousel-inner::before {
                                                content: '';
                                                position: absolute;
                                                width: 100%;
                                                height: 100%;
                                                top: 0;
                                                left: 0;
                                                background-color: rgba(0, 0, 0, 0.7);
                                                z-index: 1;
                                            } */

        .carousel-inner>.carousel-item>img {
            width: 100%;
            height: 440px;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade mb-4">
            <div class="carousel-inner">
                @foreach ($posts as $head)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ asset('storage/' . $head->photo) }}" class="d-block w-100" alt="...">
                        {{-- <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div> --}}
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- ini card item -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $card)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $card->photo) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->name }}</h5>
                            <p class="card-text">{{ $card->stocks }}</p>
                            <p class="card-text">{{ $card->price }}</p>
                            <button type="button" class="btn btn-outline-primary">Add to cart</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
