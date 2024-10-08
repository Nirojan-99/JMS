@extends('Admin.layout.layout')
@section('title','')
@section('main-content')


<div class="container mt-5">

    <div class="mb-4">

        <div class="container mt-3 fs-base fw-bold">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">User Management</li>
                </ol>
            </nav>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
            <div class="d-flex justify-content-center flex-grow-1 mb-3 mb-md-0">
                <input class="form-control me-2 border border-primary" type="search" placeholder="Search here" aria-label="Search" style="border-radius: 8px; width: 100%; max-width: 400px;">
                <button class="btn btn-outline-primary ms-2" style="border-radius: 8px;">Search</button>
            </div>
        </div>
    </div>



    <div class="table-responsive mx-5">
        <table class="table table-borderless align-middle mx-auto">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">
                        <h5>First Name</h5>
                    </th>
                    <th scope="col">
                        <h5>Last Name</h5>
                    </th>
                    <th scope="col">
                        <h5>Mail</h5>
                    </th>
                    <th scope="col">
                        <h5>Phone No</h5>
                    </th>
                    <th scope="col">
                        <h5>Status</h5>
                    </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                <tr style="border-bottom: 1px solid #dee2e6;">
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>John</td>
                    <td>john@gmail.com</td>
                    <td>XX XXXX XXX</td>
                    <td>Verified</td>
                    <td>
                        <button class="btn btn-outline-danger delete-btn" data-id="1">
                            <img src="{{ asset('img/icon/trash-can-solid.svg') }}" alt="Trash Icon" width="20" height="20">
                        </button>
                    </td>
                </tr>

                <tr style="border-bottom: 1px solid #dee2e6;">
                    <th scope="row">2</th>
                    <td>John</td>
                    <td>John</td>
                    <td>john@gmail.com</td>
                    <td>XX XXXX XXX</td>
                    <td>Verified</td>
                    <td>
                        <button class="btn btn-outline-danger delete-btn" data-id="2">
                            <img src="{{ asset('img/icon/trash-can-solid.svg') }}" alt="Trash Icon" width="20" height="20">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>


<!--
<div class="container mt-5">
    
    <div class="mb-5">   
        <div>
            <nav class="breadcrumb">
                <a href="{{ route('user_management') }}" class="text-decoration-none me-1">User Management</a>
                <span class="mx-1">&gt;</span>
                <a href="#" class="text-decoration-none ms-1">Search</a>
            </nav>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
            <div class="d-flex justify-content-center flex-grow-1 mb-3 mb-md-0">
                <input class="form-control me-2 border border-primary" type="search" placeholder="Search here" aria-label="Search" style="border-radius: 8px; width: 100%; max-width: 400px;">
                <button class="btn btn-outline-primary text-primary ms-2" style="border-radius: 8px;">Search</button>
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center my-5">
        <div class="col-12 text-center">
            <img src="{{ asset('img/icon/search.svg') }}" alt="No products icon" class="img-fluid mb-5 mt-4">
            <h5 class="text-muted">No products were found matching your selection.</h5>
        </div>
    </div>

</div>
-->



<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Alert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" id="confirmDelete">confirm</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>





@endsection

@section('admin_styles')
<link rel="stylesheet" href="{{ asset('css/admin/user_management.css') }}">
@endsection
@section('admin_scripts')
<script src="{{ asset('js/admin/user_management.js') }}"></script>
@endsection