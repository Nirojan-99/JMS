@extends('layouts.layout')
@section('title','')
@section('main-content')


<section class=" mb-5">

    <div class="container mt-lg-5 mt-md-5 mt-2">
        <div class=" mt-3">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-2"></div>
                <div class="col-lg-5 col-md-6">
                    <form action="" method="get">
                        <div class="input-group mb-3">
                            <input value=" " type="text" class="form-control border-black rounded" placeholder="Search here" name="searchQuery">
                            <button class="btn btn-outline-primary border-3 ms-2 rounded fw-bold hoverbtn" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-4 text-end">
                    <div class="dropdown w-100">
                        <button class="btn categories btn-outline-dark dropdown-toggle px-2 px-lg-4 px-md-4 fs-6" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by category
                        </button>
                        <ul class="dropdown-menu p-0 bg-success text-center rounded-0 mw-100" aria-labelledby="sortDropdown">
                            <li><a class="dropdown-item fs-6" href="">name</a></li>
                            <li><a class="dropdown-item fs-6" href="">name</a></li>
                            <li><a class="dropdown-item fs-6" href="">name</a></li>
                            <li><a class="dropdown-item fs-6" href="">name</a></li>
                            <li><a class="dropdown-item fs-6" href="">name</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @if(10 > 0)
        <div id="productContainer" class="row mt-4">
            @for ($i =0;$i< 10;$i++)
                @include('layouts.product', ['product'=> $i])
                @endfor
        </div>

        <nav aria-label="Page navigation" class=" mt-2">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @for ($i = 1; $i <= 4; $i++)
                    <li class="page-item"><a class="page-link" href="">{{$i}}</a></li>
                    @endfor
                    <li class="page-item">
                        <a class="page-link" href="" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
            </ul>
        </nav>
        @else
        <div class="row justify-content-center">
            <div class=" col-8 d-flex flex-column align-items-center mt-5">
                <img src="/img/icon/search.svg" alt="No products found" class="img-fluid ">
                <p class="mt-3 text-center">No products were found matching your selection.</p>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection