@extends('layouts.layout')
@section('title','')
@section('main-content')

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center position-relative"
    style="background-image: url('img/images/login_bg.svg'); background-size: cover; background-position: center;">

    <div class="col-12 col-md-6 col-lg-4 p-0 position-relative mt-4">
        <div class="reset-box p-3 p-md-5 bg-white rounded shadow text-center password-box">
            <h1 class="font-weight-bold">Reset Password</h1>

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">

                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach

            </div>
            @endif


            <form class="mt-4" action="{{route('updatePassword')}}" method="POST">
                @csrf

                <div class="form-group d-flex flex-column align-items-center">
                    <label for="password" class="form-label text-start w-75">Create Password</label>
                    <div class="position-relative w-75">
                        <input type="password" class="form-control form-control-sm" id="password" name="password">
                        <div class="invalid-feedback" id="passwordError" style="display: none;">
                            Password is required and must be at least 8 characters.
                        </div>
                        <img src="{{ asset('img/icon/eye-solid.svg') }}"
                            alt="Show Password"
                            width="20"
                            height="20"
                            loading="lazy"
                            class="position-absolute eye-icon"
                            id="togglePassword"
                            style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"
                            onclick="togglePassword('password', 'togglePassword')">
                    </div>
                </div>

                <div class="form-group d-flex flex-column align-items-center mt-4">
                    <label for="confirmPassword" class="form-label text-start w-75">Re-Enter Password</label>
                    <div class="position-relative w-75">
                        <input type="password" class="form-control form-control-sm" id="confirmPassword" name="password_confirmation">
                        <div class="invalid-feedback" id="confirmPasswordError" style="display: none;">
                            Password confirmation is required and must match the new password.
                        </div>
                        <img src="{{ asset('img/icon/eye-solid.svg') }}"
                            alt="Show Password"
                            width="20"
                            height="20"
                            loading="lazy"
                            class="position-absolute eye-icon"
                            id="toggleConfirmPassword"
                            style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"
                            onclick="togglePassword('confirmPassword', 'toggleConfirmPassword')">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-4 custom-btn" id="resetPasswordButton">
                        <span id="resetButtonText">Reset Password</span>
                        <span id="resetLoadingSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span id="resetLoadingText" class="d-none">Loading...</span>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successMessage = document.querySelector('.alert-success');
        if (successMessage && successMessage.innerText.includes('Your password has been reset successfully.')) {
            setTimeout(function() {
                window.location.href = "{{ route('login') }}";
            }, 3000); // 3 seconds delay
        }
    });
</script>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/change_password.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('js/change_password.js') }}"></script>


@endsection
