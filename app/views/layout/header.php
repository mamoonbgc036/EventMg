<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share&Care Limited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to Share&Care Limited</h1>
            <p>Your trusted partner for seamless event management.</p>
            <a <?php echo isset($_SESSION['role_id']) ? 'href="/EventMg/event/create"' : 'href="/EventMg/login"' ?>
                class="btn btn-primary btn-lg">Create Event</a>
        </div>
    </section>
    <?php if (!empty($_SESSION['role_id'])): ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/EventMg">Event Management</a>

                <!-- Navbar Toggler for Mobile View -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/EventMg/logout" class="btn btn-danger">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php endif; ?>