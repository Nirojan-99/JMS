@extends('Admin.layout.layout')
@section('title','')
@section('main-content')

<div class="w-100 container m-auto">

    <div class=" mt-3 fs-base fw-bold ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Order Management</li>
            </ol>
        </nav>
    </div>

    <div class=" text-right ">
        <button class="btn btn-primary float-end">
            <a class="text-white text-decoration-none add_new_btn fw-semibold fs-base" href="{{route('order_summary')}}">Order summary </a>
        </button>
        <br>
    </div>


    <div class="row  m-auto align-items-stretch  mt-5 px-0">
        <div class="col-md-3 col-xs-12"></div>

        <div class="col-md-6 col-xs-12 mb-3">
            <form action="" method="get" class="">
                <div class="d-flex flex-row gap-3 row">
                    <input name="searchQuery" class="  col-9 rounded px-3 py-1" type="text" placeholder="Search here">
                    <input class="btn btn-outline-primary col-2  search_btn border-2 fw-bold fs-5" value="Search"></input>
                </div>
            </form>
        </div>

        <div class="col-md-3 col-xs-12 text-right text-xs-left px-0">
            <div class="dropdown float-end ">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="statusDropdown">
                    Sort by Status
                </button>
                <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                    <li><a class="dropdown-item" href="#" data-status="Sort by Status ">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </a></li>
                    <li><a class="dropdown-item" href="#" data-status="Pending">Pending</a></li>
                    <li><a class="dropdown-item" href="#" data-status="Accept">Accept</a></li>
                    <li><a class="dropdown-item" href="#" data-status="Process">Process</a></li>
                    <li><a class="dropdown-item" href="#" data-status="Delivered">Delivered</a></li>
                    <li><a class="dropdown-item" href="#" data-status="Canceled">Canceled</a></li>
                </ul>
            </div>
        </div>

    </div>

</div>

@if(true)
<table class="table mt-4 w-75 m-auto ">
    <thead>
        <tr class="fs-4 fw-bold">
            <th scope="col"></th>
            <th scope="col">Order ID</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
            <th scope="col">Total</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody class="order_details  fs-base fw-semibold">

        @for ($i = 1; $i < 12; $i++)
            <tr>
            <th style="color: #686868;" scope="row">{{$i}}</th>
            <td style="color: #686868;">#6549802266</td>
            <td style="color: #686868;">Delivered</td>
            <td style="color: #686868;">Aug 7, 2024 10:32</td>
            <td style="color: #686868;">Rs. XXXXX </td>
            <td style="color: #686868;"><a href="{{route('order_details',['id'=>'todo'])}}" class="text-decoration-none float-end" style="color: #557AFF;">View</a></td>
            </tr>
            @endfor

    </tbody>
</table>

<!-- TODO: handle next pre btn click -->
<div class="container mt-5 mb-3">
    <nav class="d-flex flex-row justify-content-center">
        <ul class="pagination flx-grow-1">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i < 6; $i++)
                <li class="page-item"><a class="page-link" href="{{ route('order_management', ['page' => $i]) }}">{{$i}}</a></li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
</div>

@else
<div class="d-flex flex-column justify-content-center align-items-center">
    <div>
        <img src="{{ URL('img/icon/search-2.webp') }}" alt="" class="search_not_found">
    </div>
    <div class="fs-lg fw-medium mb-3">No products were found matching your selection.</div>
</div>
@endif

@endsection

{{-- asset link start --}}
@section('admin_styles')
<link rel="stylesheet" href="{{ asset('css/admin/order_management.css') }}">
@endsection
@section('admin_scripts')
<script src="{{ asset('js/admin/order_management.js') }}"></script>
@endsection
{{-- asset link end --}}