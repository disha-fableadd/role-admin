<!doctype html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin Dashboard</title>

    <meta name="description" content="" />




<!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Slab:wght@100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/fonts/remixicon/remixicon.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <script src="assets/js/config.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {

            font-family: "Roboto Slab", serif;
        }

        #password_feedback {
            margin-top: 10px;
            font-size: 14px;
        }

        .bg-menu-theme .menu-link,
        .bg-menu-theme .menu-horizontal-prev,
        .bg-menu-theme .menu-horizontal-next {
            color: #8c57ff;
        }

        /* nav {
            margin: 0;
            width: 100% !important;
        } */

        .bg-menu-theme {
            background-color: dark !important;
            color: white;
        }

        #layout-menu {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 1000;
            background-color: var(--bs-secondary-bg);
        }

        .container-p-y {
            margin-left: calc(250px);
            padding: 20px;
            width: calc(100% - 250px);
            overflow-x: hidden;
        }

        #layout-navbar {
            margin-left: calc(250px);

            width: calc(100% - 250px);
            overflow-x: hidden;

        }

        .content-footer {
            margin-left: calc(250px);

            width: calc(100% - 250px);
            overflow-x: hidden;

        }

        .navbar-nav {
            margin-right: 20px;
        }
    </style>
</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container ">



        @include('layouts.sidebar')




            <div class="layout-page">

            @include('layouts/navbar')




                <div class="content-wrapper">

                @yield('content')

@include('layouts.footer')
@yield('scripts')
                  