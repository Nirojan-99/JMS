@extends('Admin.layout.layout')
@section('title','')
@section('main-content')

<div class="mb-5">
    <div class="container mt-3 fs-base fw-bold">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Admin" class="text-decoration-none">Jewelry Management</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Jewelry</li>
            </ol>
        </nav>
    </div>

    <div class="container mt-5">
        <form class="m-auto w-50 p-4 shadow" method="POST" action=" " enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="mb-2" for="jewelryName">Name:</label>
                <input name="name" type="text" class="form-control" id="jewelryName" required>
                <div id="nameErrMsg" class="pt-1 err_mg text-left w-100 fw-bold fs-base text-error"></div>
            </div>

            <div class="form-group mt-2">
                <label class="mb-2" for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="" selected></option>
                    <option value="rings">Rings</option>
                    <option value="necklaces">Necklaces</option>
                    <option value="bracelets">Bracelets</option>
                </select>
                <div id="categoryErrMsg" class="pt-1 err_mg text-left w-100 fw-bold fs-base text-error"></div>
            </div>

            <div class="form-group mt-2">
                <label for="storeAvailable" class="mb-1">Available in Store:</label>
                <select class="form-control" id="storeAvailable" name="store_available" required>
                    <option value="" selected></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <div id="storeAvailableErrMsg" class="pt-1 err_mg text-left w-100 fw-bold fs-base text-error"></div>
            </div>

            <div class="row mt-2">
                <div class="col-6">
                    <label class="mb-2" for="price">Price:</label>
                    <input type="text" name="price" class="form-control" id="price" required>
                    <div id="priceErrMsg" class="pt-1 err_mg text-left w-100 fw-bold fs-base text-error"></div>
                </div>
                <div class="col-6">
                    <label class="mb-2" for="weight">Weight (g):</label>
                    <input type="text" name="weight" class="form-control" id="weight" required>
                    <div id="weightErrMsg" class="pt-1 err_mg text-left w-100 fw-bold fs-base text-error"></div>
                </div>
            </div>

            <div class="form-group mt-2">
                <label class="mb-2" for="description">Description:</label>
                <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                <div id="descriptionErrMsg" class="pt-1 err_mg text-left w-100 fw-bold fs-base text-error"></div>
            </div>

            <div class="form-group mt-2">
                <label class="mb-2" for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="" selected></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="unisex">Unisex</option>
                </select>
                <div id="genderErrMsg" class="pt-1 err_mg text-left w-100 fw-bold fs-base text-error"></div>
            </div>

            <div class="form-group mt-2">
                <label class="mb-2" for="warranty">Warranty Period (months):</label>
                <input type="number" name="warranty" class="form-control" id="warranty" required>
                <div id="warrantyErrMsg" class="pt-1 err_mg text-left w-100 fw-bold fs-base text-error"></div>
            </div>

            <div class="w-100 text-center mb-2 fw-semibold my-2">Upload image</div>
            <div class="m-auto row">
                <div class="d-flex flex-row m-auto gap-3 text-center w-75">
                    <div class="d-flex align-items-center justify-content-center dashed-border img_container p-0 input_image_container1" id="img_label">
                        <div class="position-relative w-100 h-100">
                            <label for="imageInput0" class="w-100 h-100" id="label">
                                <img id="imagePreview0" src="{{ URL('img/icon/plus-solid.svg') }}" alt="Upload Image" class="add_img_container position-absolute">
                            </label>
                            <input type="file" class="form-control" id="imageInput0" accept="image/*" hidden name="images[0]">
                            <img id="trashIcon" src="{{ URL('img/icon/trash-can-solid.svg') }}" class="trash_img_container position-absolute d-none">
                        </div>
                    </div>
                    <div class="gap-3 g-col-6 d-flex flex-column justify-content-between" style="height: 332px;">
                        <div class="d-flex align-items-center justify-content-center dashed-border img_container p-0 input_image_container2" id="img_label1">
                            <div class="position-relative w-100 h-100">
                                <label for="imageInput1" class="w-100 h-100" id="label1">
                                    <img id="imagePreview1" src="{{ URL('img/icon/plus-solid.svg') }}" alt="Upload Image" class="add_img_container position-absolute">
                                </label>
                                <input type="file" class="form-control" id="imageInput1" accept="image/*" hidden name="images[1]">
                                <img id="trashIcon1" src="{{ URL('img/icon/trash-can-solid.svg') }}" class="trash_img_container position-absolute d-none">
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center dashed-border img_container p-0 input_image_container2" id="img_label2">
                            <div class="position-relative w-100 h-100">
                                <label for="imageInput2" class="w-100 h-100" id="label2">
                                    <img id="imagePreview2" src="{{ URL('img/icon/plus-solid.svg') }}" alt="Upload Image" class="add_img_container position-absolute">
                                </label>
                                <input type="file" class="form-control" id="imageInput2" accept="image/*" hidden name="images[2]">
                                <img id="trashIcon2" src="{{ URL('img/icon/trash-can-solid.svg') }}" class="trash_img_container position-absolute d-none">
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center dashed-border img_container p-0 input_image_container2" id="img_label3">
                            <div class="position-relative w-100 h-100">
                                <label for="imageInput3" class="w-100 h-100" id="label3">
                                    <img id="imagePreview3" src="{{ URL('img/icon/plus-solid.svg') }}" alt="Upload Image" class="add_img_container position-absolute">
                                </label>
                                <input type="file" class="form-control" id="imageInput3" accept="image/*" hidden name="images[3]">
                                <img id="trashIcon3" src="{{ URL('img/icon/trash-can-solid.svg') }}" class="trash_img_container position-absolute d-none">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-center">
                <input id="submit" class="btn btn-primary text-center mt-5 mb-2 fs-5 fw-semibold px-4" type="submit" value="Save" data-bs-toggle="modal" data-bs-target="#confirmationModal2"></input>
            </div>

            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Alert</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Jewelry product successfully added!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/add_product.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/add_product.js') }}"></script>
@endsection