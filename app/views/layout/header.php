<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share&Care Limited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .hero {
        background: url('<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/EventMg/public/asset/images/header.jpg"; ?>') no-repeat center center/cover;
        color: white;
        text-align: center;
        padding: 100px 20px;
    }

    .card img {
        height: 200px;
        object-fit: cover;
    }

    .footer {
        background-color: #FD7737;
        opacity: 0.9;
        color: white;
        text-align: center;
        padding: 20px 0;
    }

    #bookingForm {
        display: none;
        max-width: 400px;
        margin: auto;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
    }
    </style>
</head>

<body>
    <div id="bookingForm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-center w-100">Booking Form</h4>
            <button id="closeFormBtn" class="btn btn-danger btn-sm">&times;</button>
        </div>
        <input type="hidden" name="" id="eventId" value="">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Enter Phone Number">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Enter Email">
        </div>
        <button id="confirmBtn" class="btn btn-success w-100">Confirm</button>
    </div>

    <!-- Toast Notification -->
    <div class="toast-container">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    Successfully Booked!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <a href="/EventMg" class="btn btn-primary btn-sm">Home</a>
            <h1>Welcome to Share&Care Limited</h1>
            <p>Your trusted partner for seamless event management.</p>
            <a href="/EventMg/getRform" class="btn btn-primary btn-sm">Register to Create Event</a>
        </div>
    </section>