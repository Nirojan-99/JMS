<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General Styles */
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .text-center {
            text-align: center;
        }

        .text-start {
            text-align: left;
        }

        /* Logo Section */
        .logo img {
            max-width: 150px;
            height: auto;
        }

        /* Verification Code Container */
        .verification-container {
            background-color: #f8f9fa;
            padding: 2rem 1.5rem;
            border-radius: .75rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            max-width: 700px;
        }

        .verification-container h3 {
            margin-bottom: 1.5rem;
        }

        .verification-code-box {
            background-color: orange;
            color: #ffffff;
            padding: 1rem 1.5rem;
            font-weight: bold;
            font-size: 1.5rem;
            text-align: center;
            max-width: 60%;
            margin: 0 auto;
            letter-spacing: 10px;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        /* Footer Section */
        footer {
            margin-bottom: 2rem;
        }

        .footer-logo img {
            max-width: 100px;
            height: auto;
        }

        .footer-info {
            color: #007bff;
            font-size: 0.875rem;
        }

        /* Link Styles */
        a {
            color: #212529;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Main Container -->
    <div class="container text-center">
        <!-- Logo Section -->
        <div class="logo">
            <img src="{{ asset('img/images/logo-black.webp') }}" alt="Company Logo">
        </div>

        <!-- Verification Code Container -->
        <div class="verification-container">
            <h3>Your Verification Code</h3>

            
            <p class="text-start">Hello {{ $firstName }}, </p>

            <!-- Justified Paragraph Below -->
            <p class="text-start">Thank you for choosing Hale Nature Company. Use the following Code to complete the procedure to change your password. Please enter this verification code in the window where you verify your account. Do not share this code with others.</p>

            <!-- Verification Code Box -->
            <div class="verification-code-box">
                {{ $code }}
            </div>

            <p class="mt-3">This code is valid for 90 seconds.</p>

            <p class="text-start">Best regards,<br>Halenature Company.</p>
            <p class="text-start">Need help? <a href="#">Contact Us</a></p>
        </div>

        <!-- Footer Section -->
        <footer>
            <div class="footer-logo">
                <img src="{{ asset('img/images/logo-black.webp') }}" alt="Footer Logo">
            </div>
            <div class="footer-info">
                No 032, Main Street, Colombo, Sri Lanka.<br>
                info@halecinnamon.com<br>
                Call Us: +94777538775
            </div>
        </footer>
    </div>
</body>
</html>