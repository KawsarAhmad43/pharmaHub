<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaHub - Medicine Management System</title>
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background styling */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        /* Animated floating bubbles */
        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .bubble {
            position: absolute;
            bottom: -150px;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: bubbleFloat 10s infinite ease-in-out;
        }

        .bubble:nth-child(2) {
            width: 60px;
            height: 60px;
            left: 25%;
            animation-duration: 12s;
            animation-delay: 2s;
        }

        .bubble:nth-child(3) {
            width: 80px;
            height: 80px;
            left: 50%;
            animation-duration: 15s;
            animation-delay: 4s;
        }

        .bubble:nth-child(4) {
            width: 100px;
            height: 100px;
            left: 75%;
            animation-duration: 18s;
            animation-delay: 6s;
        }

        .bubble:nth-child(5) {
            width: 120px;
            height: 120px;
            left: 90%;
            animation-duration: 20s;
            animation-delay: 8s;
        }

        @keyframes bubbleFloat {
            0% {
                transform: translateY(0);
                opacity: 0.5;
            }
            50% {
                transform: translateY(-500px);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px);
                opacity: 0.5;
            }
        }

        /* Main container styling */
        .container {
            text-align: center;
            position: relative;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 400px;
            transition: transform 0.6s ease, box-shadow 0.6s ease;
            transform-style: preserve-3d;
        }

        /* Hover 3D effect */
        .container:hover {
            transform: rotateY(10deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        /* Logo styling */
        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px; /* Adjust the logo size */
            height: auto;
        }

        /* Button styling */
        .btn-custom {
            background: #00796b;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 50px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .btn-custom:hover {
            transform: scale(1.1);
            background-color: #004d40;
        }

        /* Animation on load */
        .container {
            opacity: 0;
            animation: fadeIn 1.2s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            .logo img {
                max-width: 120px; /* Adjust logo size for smaller screens */
            }

            .btn-custom {
                font-size: 1rem;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Background animation -->
    <div class="background-animation">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>

    <!-- Main content -->
    <div class="container">
        <div class="logo">
            <img src="{{ asset('assets/img/pharma.PNG') }}" alt="PharmaHub Logo">
        </div>
        <p>Welcome to PharmaHub, your ultimate medicine management system!</p>
        <div class="d-flex justify-content-around mt-4">
            <a href="{{ route('login') }}" class="btn btn-custom">Login</a>
            <a href="{{ route('register') }}" class="btn btn-custom">Sign Up</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
