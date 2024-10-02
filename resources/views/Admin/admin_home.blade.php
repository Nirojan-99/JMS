@extends('Admin.layout.layout')
@section('title','')
@section('main-content')

<div class="container">

    <div class="w-100 mb-4">
        <div class="container mt-3 fs-base fw-bold">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Product Management</li>
                </ol>
            </nav>
        </div>

        <div class="row container m-auto justify-start align-items-start">
            <div class="col-md-3 col-xs-12"></div>
            <div class="col-md-6 col-xs-12 mb-3">
                <form action="" method="get" class="">
                    <div class="d-flex flex-row gap-3 row">
                        <input name="searchQuery" class="  col-9 rounded px-3 py-1" type="text" placeholder="Search here">
                        <input class="btn btn-outline-primary col-2  search_btn border-2 fw-bold fs-5" value="Search"></input>
                    </div>
                </form>
            </div>

            <div class="col-md-3 col-xs-12  text-right text-xs-left">
                <button class="btn btn-primary float-end">
                    <img src="{{ URL('img/icon/circle-plus-solid.svg') }}" alt="" class="plus_icon">
                    <a class="text-white text-decoration-none  fs-base" href=" ">ADD NEW PRODUCT </a>
                </button>
                <br>
                <button class="btn btn-outline-primary mt-3 float-end">
                    <a class=" text-decoration-none  fw-semibold fs-base" href=" ">Category Management </a>
                </button>
            </div>
        </div>
    </div>

    <div class="row gap-3 align-items-center justify-content-center mb-4">
        @for($i=0; $i < 4 ;$i++)
            @include('Admin.layout.product')
            @endfor
            </div>

            <div class="container mt-5 mb-3">
                <nav class="d-flex flex-row justify-content-center">
                    <ul class="pagination flx-grow-1">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for ($i = 1; $i < 6; $i++)
                            <li class="page-item"><a class="page-link" href="">{{$i}}</a></li>
                            @endfor
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                    </ul>
                </nav>
            </div>

    </div>


    @endsection