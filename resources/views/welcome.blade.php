@extends('layouts.layout')
@section('title','')
@section('main-content')

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="height: 500px;width: 100%;">
        <div class="carousel-item active">
            <img src="{{ asset('img/img1.png') }}" class="d-block w-100" style="object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/img2.jpeg') }}" class="d-block w-100" style="object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/img3.jpg') }}" class="d-block w-100" style="object-fit: cover;">
        </div>
    </div>
</div>

<div class="container">
    <div class="my-3 fw-bold fs-4">New Releases</div>

    <div class="row gap-3 align-items-center justify-content-center mb-4">
        @for($i=0; $i < 4 ;$i++)
            <div class="card px-0" style="width: 17rem;">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('img/img4.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Jewellery Name</h5>
                    <p class="card-text mb-2">RS 100,000.00</p>
                    <a href="#" class="btn btn-outline-primary w-100 mb-3">Add to cart</a>
                    <a href="#" class="btn btn-secondary w-100">Customize</a>
                </div>
            </a>
    </div>
    @endfor
</div>
</div>

<div class="container">
    <div class="my-3 fw-bold fs-4">Categories</div>

    <div class="row gap-3 align-items-center justify-content-center mb-4">
        @for($i=0; $i < 4 ;$i++)
            <div class="card px-0" style="width: 17rem;">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('img/img5.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <p class="card-text fw-semibold">Category Name</p>
                </div>
            </a>
    </div>
    @endfor
</div>
</div>

<div class="container">
    <div class="my-3 fw-bold fs-4">Top Sellers</div>

    <div class="row gap-3 align-items-center justify-content-center mb-4">
        @for($i=0; $i < 4 ;$i++)
            <div class="card px-0" style="width: 17rem;">
            <a href="#" class="text-decoration-none">
                <img src="{{ asset('img/img4.jpg') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Jewellery Name</h5>
                    <p class="card-text mb-2">RS 100,000.00</p>
                    <a href="#" class="btn btn-outline-primary w-100 mb-3">Add to cart</a>
                    <a href="#" class="btn btn-secondary w-100">Customize</a>
                </div>
            </a>
    </div>
    @endfor
</div>
</div>

@endsection