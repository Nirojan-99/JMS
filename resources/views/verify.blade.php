@extends('layouts.layout')
@section('title','')
@section('main-content')

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center position-relative"
    style="background-image: url('img/images/login_bg.svg'); background-size: cover; background-position: center;">

    <div id="verification-container" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 500px;">
        <h2 class="text-center mb-3">Verify Code</h2>


        <div class="container mt-2">
            @if (session('success') || isset($success))
            <div id="success-message" class="alert alert-success">
                {{ session('success') ?? $success }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
            @endif
        </div>

        <p class="text-center mb-4">An authentication code has been sent to your email.</p>

        <div id="form-section">
            <form action="{{ route('verifyCode') }}" method="POST" class="text-center" id="verification-form">
                @csrf


                <input type="text" name="verification_code" id="verification-code" class="form-control mb-3" style="max-width: 250px; margin-left: auto; margin-right: auto;" placeholder="Enter verification code">
                <div class="invalid-feedback ">Verification code is required.</div>
                <button type="submit" class="btn btn-primary w-50" id="verify-btn">
                    <span id="verifyButtonText">Verify Code</span>
                    <span id="verifyLoadingSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    <span id="verifyLoadingText" class="d-none">Loading...</span>
                </button>

            </form>
        </div>

        <div id="expired-message" class="d-none text-center mt-3">
            <p class=" mb-3" style="color:red;">Code expired!</p>
            <form action="" method="POST">
                @csrf

                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary w-50" id="resend-btn">
                        <span id="resendButtonText">Resend Code</span>
                        <span id="resendLoadingSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span id="resendLoadingText" class="d-none">Loading...</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successMessage = document.getElementById('success-message');

        if (successMessage) {
            if (successMessage.innerHTML.includes('Your email has been verified')) {
                setTimeout(function() {
                    window.location.href = "{{ route('login') }}";
                }, 3000); // 3 seconds delay
            }
        }
    });
</script>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/verify.css') }}">

@endsection

@section('scripts')

<script src="{{ asset('js/verify.js') }}"></script>

@endsection