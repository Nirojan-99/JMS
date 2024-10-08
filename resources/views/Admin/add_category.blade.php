@extends('Admin.layout.layout')
@section('title','')
@section('main-content')

<div>

    <div class="container mt-3 fs-base fw-bold">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Admin/Product-management" class="text-decoration-none">Product Management</a></li>
                <li class="breadcrumb-item"><a href="/Admin/Category-management" class="text-decoration-none">Categories Management</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Add Categories</li>
            </ol>
        </nav>
    </div>

    <div class="m-auto my-1 p-md-5 p-xs-0 container w-75 w-xs-100">
        <div class="rounded shadow-lg p-md-4 p-2">
            <form method="POST" action="{{ route('store_categories') }}" enctype="multipart/form-data" novalidate class="needs-validation">
                @csrf
                <div class="row align-items-stretch">
                    <div class="col-md-3">
                        <div class="fs-6 mb-2">Upload Image</div>
                        <div class="d-flex align-items-center justify-content-center dashed-border img_container p-0" id="img_label">
                            <div class="position-relative w-100 h-100">
                                <label for="imageInput" class="w-100 h-100 " id="label">
                                    <img id="imagePreview" src="{{ URL('img/icon/plus-solid.svg') }}" alt="Upload Image" class="add_img_container position-absolute ">
                                </label>
                                <img id="trashIcon" src="{{ URL('img/icon/trash-can-solid.svg') }}" class="trash_img_container position-absolute d-none">
                            </div>
                        </div>
                        <input type="file" class="form-control" id="imageInput" accept="image/*" hidden name="image">
                    </div>
                    <div class="col-md-9 d-flex flex-column align-items-end">
                        <label class="fs-6 mb-2 text-left w-100" for="categoryName">Category name</label>
                        <input type="text" class="rounded w-100 px-3 py-1" id="categoryName" placeholder="Category name" name="name" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        <div id="errMsg" class="pt-1 err_mg text-left w-100 fw-bold fs-base text-error"></div>
                        <div class=" flex-grow-1"></div>
                        <input id="submit" class="btn btn-primary float-end fw-semibold fs-5 px-4" type="submit" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Alert!</h5>
                </div>
                <div class="modal-body">
                    {{is_null(session('error')) ? session('success'):session('error')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/add_category.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('js/add_categories.js') }}"></script>

<script>
    const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
    @if(session('success') || session('error'))
    confirmationModal.show();
    @endif
</script>
@endsection