@extends('Admin.layout.layout')
@section('title','')
@section('main-content')

<div>

    <div class="container mt-3 fs-base fw-bold">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Admin/Order-Management" class="text-decoration-none">Order Management</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Order Details</li>
            </ol>
        </nav>
    </div>

    <div class="container w-75">
        <div class="row">
            <div class="col-6">
                <div class="fw-bold fs-4">Customer</div>
                <div class="fw-semibold fs-5 customer_details">Full Name: Shristi Singh</div>
                <div class="fw-semibold fs-5 customer_details">Email: shristi@gmail.com</div>
                <div class="fw-semibold fs-5 customer_details">Phone: +91 904 231 1212</div>
                <div class="fw-semibold fs-5 customer_details">Message: Good </div>
                <div class="d-flex flex-row align-items-center gap-2 mt-2">
                    <div class="fw-bold fs-4 ">Status : </div>
                    <div class="">
                        <div class="dropdown  ">
                            <button class="btn btn-outline-primary dropdown-toggle status fw-bold fs-4 py-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="statusDropdown">
                                Pending
                            </button>
                            <ul class="dropdown-menu bg-primary " aria-labelledby="statusDropdown">
                                <li><a class="dropdown-item" style="color: #fff;" href="#" data-status="Pending">Pending</a></li>
                                <li><a class="dropdown-item" style="color: #fff;" href="#" data-status="Accept">Accept</a></li>
                                <li><a class="dropdown-item" style="color: #fff;" href="#" data-status="Process">Process</a></li>
                                <li><a class="dropdown-item" style="color: #fff;" href="#" data-status="Delivered">Delivered</a></li>
                                <li><a class="dropdown-item" style="color: #fff;" href="#" data-status="Canceled">Canceled</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 ">
                <div class="d-flex flex-row justify-content-end align-items-center gap-3">
                    <img src="{{ URL('img/icon/calendar-days-solid.svg') }}" alt="" class="" style="width: 24px;height: 24px;">
                    <div class="customer_details fs-5 fw-semibold">Aug 7, 2024 10:32</div>
                </div>
                <div class="d-flex flex-row justify-content-end align-items-center gap-3">
                    <div class="fs-5 fw-semibold">Order ID:</div>
                    <div class="customer_details fs-5 fw-semibold">XXXXXXXXXX</div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 text-center fs-3 fw-bold mb-4 mt-5" style="color: #A66F3E;">Products Details</div>

    <div class="container w-75">
        <div class="row align-items-center w-100 text-center fs-3 fw-bold mb-3 border-bottom pb-3">
            <div class="col-4">Product</div>
            <div class="col-4 ">Quantity</div>
            <div class="col-4 row justify-content-end">Total</div>
        </div>
        @for ($i = 1; $i < 4; $i++)
            <div class="row align-items-center text-center mb-3 border-bottom pb-3 ">
            <div class="row gap-3 align-items-center col-4 ">
                <div class="fs-base fw-bold customer_details col-1">{{$i}}</div>
                <div class="col d-flex flex-row align-items-center w-100 text-center gap-3">
                    <img src="{{ URL('img/images/cinnamon-stick.webp') }}" alt="" class="prod_img ">
                    <div class="fs-base fw-bold customer_details">Product Name</div>
                </div>
            </div>
            <div class="col-4">2</div>
            <div class="col-4 row justify-content-end ">RS 800.00 </div>
    </div>
    @endfor

    <div class="d-flex flex-row align-items-center gap-5  justify-content-end p-4 py-1">
        <div class="fs-4 fw-bold customer_details">Total</div>
        <div class="fs-4 fw-bold">Rs800.00</div>
    </div>

</div>


@endsection

{{-- asset link start --}}
@section('admin_styles')
<link rel="stylesheet" href="{{ asset('css/admin/order_details.css') }}">
@endsection
@section('admin_scripts')
<script src="{{ asset('js/admin/order_details.js') }}"></script>
@endsection
{{-- asset link end --}}