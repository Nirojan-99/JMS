@extends('layouts.layout')
@section('title','')
@section('main-content')

<div class="container-fluid vh-100 d-flex flex-column justify-content-center align-items-center position-relative"
    style="background-image: url('img/images/login_bg.svg'); background-size: cover; background-position: center;">

    <div class="position-absolute top-0 start-0 p-3 mt-5 mx-4 ms-lg-5">
        <a href="{{ route('login') }}" class="d-block">
            <img src="{{ asset('img/icon/back-buttons-multimedia.svg') }}"
                alt="Back"
                class="img-fluid"
                loading="lazy"
                style="max-width: 40px; height: auto;">
        </a>
    </div>

    <div class="bg-white p-5 rounded mt-5" style="width: 100%; max-width: 600px;">
        <h2 class="text-center mb-3">Forgot your password?</h2>



        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-warning">

            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach

        </div>
        @endif


        <form id="forgot-password-form" action="{{route('sendVerificationCode')}}" method="POST" class="text-center">
            @csrf
            
            <div class="mb-3">
                <div class="d-flex flex-column align-items-center">
                    <div class="text-start" style="max-width: 300px; width: 100%;">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        <div class="invalid-feedback" id="email-error">
                            Please enter a valid email address.
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-50" id="submitButton">
                    <span id="buttonText">Submit</span>
                    <span id="loadingSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    <span id="loadingText" class="d-none">Loading...</span>
                </button>
            </div>

        </form>
    </div>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/forgot_password.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/forgot_password.js') }}"></script>

@endsection