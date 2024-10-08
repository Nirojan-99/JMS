@extends('Admin.layout.layout')
@section('title','')
@section('main-content')

<div>
    <div class="container mt-3 fs-base fw-bold">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Admin/Order-Management" class="text-decoration-none">Order Management</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Order Summary</li>
            </ol>
        </nav>
    </div>

    <table class="table container mt-5">
        <thead>
            <tr class="fs-4 fw-bold">
                <th scope="col"></th>
                <th scope="col">Month</th>
                <th scope="col">Order</th>
                <th scope="col">Pending</th>
                <th scope="col">Accept</th>
                <th scope="col">Process</th>
                <th scope="col">Delivered</th>
                <th scope="col">Canceled</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i < 10; $i++)
                <tr class="fs-base fw-semibold">
                <th style="color: #686868;" scope="row">{{$i}}</th>
                <td style="color: #686868;">Oct, 2024</td>
                <td style="color: #686868;">XXXXXX</td>
                <td style="color: #686868;">XXXXXX</td>
                <td style="color: #686868;">XXXXXX</td>
                <td style="color: #686868;">XXXXXX</td>
                <td style="color: #686868;">XXXXXX</td>
                <td style="color: #686868;">XXXXXX</td>
                <td style="color: #686868;">XXXXXX</td>
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
                    <li class="page-item"><a class="page-link" href="{{ route('order_summary', ['page' => $i]) }}">{{$i}}</a></li>
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

@section('admin_styles')
<link rel="stylesheet" href="{{ asset('css/admin/order_summary.css') }}">
@endsection
@section('admin_scripts')
<script src="{{ asset('js/admin/order_summary.js') }}"></script>
@endsection
