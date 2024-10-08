@extends('layouts.layout')
@section('title','')
@section('main-content')

<div class="container-fluid d-flex flex-column" style="background-image: url('img/images/login_bg.svg'); background-size: cover; background-position: center;">

    <div class="row flex-grow-1 justify-content-center align-items-center mt-5 mx-2">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
            <div class="card bg-white shadow rounded p-3 p-sm-4 p-md-5">
                <div class="card-body">
                    <h1 class="text-center mb-5 mt-2 text-primary">Register</h1>
                    <div class="container">
                        @if (session('success') || isset($success))
                        <div id="success-message" class="alert alert-success">
                            {{ session('success') ?? $success }}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-warning" style="background-color: #e3645b;color: #000;border: 1px solid red;">
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <form id="registrationForm" method="POST" action="{{route('register_user')}}" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="first_name">
                                <div class="invalid-feedback mb-2" id="firstNameError">
                                    First name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="last_name">
                                <div class="invalid-feedback  mb-2" id="lastNameError">
                                    Last name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                                <div class="invalid-feedback  mb-2" id="emailError">
                                    Please enter a valid email.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone_number">
                                <div class="invalid-feedback  mb-2" id="phoneError">
                                    Phone number is required.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="d-flex position-relative">
                                    <input type="password" class="form-control pe-5" id="password" name="password">
                                    <img src="{{ asset('img/icon/eye-solid.svg') }}"
                                        alt="Show Password"
                                        width="20"
                                        height="20"
                                        loading="lazy"
                                        id="togglePassword"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                                </div>
                                <div class="invalid-feedback mb-2" id="passwordError">
                                    Password is required.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <div class="d-flex position-relative">
                                    <input type="password" class="form-control pe-5" id="confirmPassword" name="password_confirmation">
                                    <img src="{{ asset('img/icon/eye-solid.svg') }}"
                                        alt="Show Confirm Password"
                                        width="20"
                                        height="20"
                                        loading="lazy"
                                        id="toggleConfirmPassword"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                                </div>
                                <div class="invalid-feedback mb-2" id="confirmPasswordError">
                                    Password confirmation is required.
                                </div>
                            </div>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="termsCheck" name="terms">
                            <label class="form-check-label text-primary" for="termsCheck">
                                I have read and agreed to the Terms of Service and Privacy Policy
                            </label>
                            <div class="invalid-feedback mb-2" style="color: red;" id="termsCheckError">
                                You must agree to the terms.
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" id="submitButton">
                                <span id="buttonText">Create Account</span>
                                <span id="loadingSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                <span id="loadingText" class="d-none">Loading...</span>
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <p>Already Have An Account? <a href="{{ route('login') }}">Login</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5"></div>
</div>

@endsection

@section('scripts')
<script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        var termsCheck = document.getElementById('termsCheck');
        var termsCheckError = document.getElementById('termsCheckError');

        if (!termsCheck.checked) {
            termsCheckError.style.display = 'block';
            event.preventDefault();
        } else {
            termsCheckError.style.display = 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#password');

        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPasswordField = document.querySelector('#confirmPassword');

        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
        });

        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);
        });
    });
</script>
@endsection