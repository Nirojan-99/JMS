@extends('layouts.layout')
@section('title','')
@section('main-content')

<div class="container-fluid vh-100 d-flex flex-column" style="background: url('img/images/login_bg.svg'); background-size: cover; background-position: center;">

    <div class="row flex-grow-1 justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-4">
            <div class="login-box p-4 p-md-5 shadow rounded bg-white">
                <h3 class="fw-bold text-center">Login</h3>
                <form id="login-form" action="{{route('login_user')}}" method="POST">
                    @csrf

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-warning">

                        @foreach ($errors->all() as $error)
                        {{ $error }}
                        @endforeach

                    </div>
                    @endif


                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="">
                        <div class="invalid-feedback" id="email-error">
                            Please enter a valid email address.
                        </div>
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <div class="position-relative d-flex align-items-center">
                            <input type="password" class="form-control pe-5" id="password" name="password" placeholder="">
                        </div>
                        <div class="invalid-feedback" id="password-error">
                            Please enter your password.
                        </div>
                        <a href="{{route('forgot_password')}}" class="d-block mt-2 text-end">Forgot Your Password?</a>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="submitButton">
                            <span id="buttonText">Login</span>
                            <span id="loadingSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            <span id="loadingText" class="d-none">Loading...</span>
                        </button>
                    </div>

                    <p class="mt-3 text-center">Do not have an account? <a href="{{route('register')}}">Create a new one.</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successMessage = document.querySelector('.alert-success');

        if (successMessage) {
            setTimeout(function() {
                window.location.href = "";
            }, 3000); // 3 seconds delay
        }
    });
</script>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/login.js') }}"></script>

@endsection