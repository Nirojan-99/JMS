@extends('Admin.layout.layout')
@section('title','')
@section('main-content')


<div>
    <div class="w-100">

        <div class="container mt-3 fs-base fw-bold">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Admin/Product-management" class="text-decoration-none">Product Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories Management</li>
                </ol>
            </nav>
        </div>

        <div class="container text-right">
            <button class="btn btn-primary float-end">
                <img src="{{ URL('img/icon/circle-plus-solid.svg') }}" alt="" class="plus_icon ">
                <a class="text-white text-decoration-none add_new_btn fw-semibold fs-base" href="{{route('add_categories')}}">ADD NEW CATEGORIES </a>
            </button>
            <br>
        </div>
        @if(count($categories)>0)
        <section class="w-75 container my-4 p-md-5 p-xs-0 ">
            <div class="container m-auto  ">
                <div class="row mb-4 row_titles fs-4 fw-semibold">
                    <div class="col-md-1 "></div>
                    <div class="col-md-4 ">
                        Categories Image
                    </div>
                    <div class="col-md-7">Categories Name</div>
                </div>
                @foreach ($categories as $category)
                @include('Admin.layout.category', ['category'=> $category])
                @endforeach
            </div>
        </section>
        @else
        <div class="text-center fs-4 fw-semibold my-5" style="color: red;">
            No Categories to display
        </div>
        @endif

    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endsection