{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECH FUNDS</title>
    <!-- Load Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Load FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40; /* Adjusted to a dark grey to match Bootstrap's dark theme */
            color: white;
            margin: 0;
        }
        .navbar-custom .btn:hover {
            color: #00008B; /* Dark blue text on hover */
            background-color: #ffffff; /* White background on hover */
            border-radius: 0.25rem; /* Slight rounding of corners on hover */
        }
        .navbar-custom {
            background-color: #00008B; /* Dark blue background */
            color: white;
            display: flex;
            justify-content: space-between; /* Align items on both ends */
            padding: 0.5rem 1rem;
        }
        .navbar-custom .navbar-brand {
            margin-left: 1rem; /* Adjust as needed for positioning */
            font-weight: bold; /* Bold font for the title */
        }
        .navbar-custom .btn {
            color: white; /* White text for buttons */
            background-color: transparent; /* Transparent background */
            border: none; /* No border */
            padding: 0.375rem 0.75rem; /* Bootstrap's default padding for buttons */
        }
        .navbar-custom .btn:focus {
            outline: none; /* Removes the outline on focus for buttons */
            box-shadow: none; /* Removes the box-shadow on focus for buttons */
        }
        .navbar-custom .btn:not(:last-child) {
            margin-right: 0.5rem; /* Spacing between buttons */
        }
        .navbar-custom .fas {
            margin-right: 0.5rem; /* Spacing for icons */
        }
        /* Ensure icons and text align properly */
        .btn i {
            vertical-align: middle;
        }
        /* Right aligned items */
        .navbar-right {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-custom navbar-dark">
    <span class="navbar-brand mb-0 h1">TECH FUNDS</span>
    <div class="navbar-right">
        <!-- New Project button -->
        <button class="btn btn-new-project" type="button" onclick="window.location.href='';">
            <i class="fas fa-plus"></i> New Project
        </button>
        <!-- Notifications button -->
        <button class="btn" type="button" onclick="window.location.href='';">
            <i class="fas fa-bell"></i>
        </button>
        <!-- Profile button -->
        <button class="btn" type="button" onclick="window.location.href='';">
            <i class="fas fa-user"></i>
        </button>
    </div>
</nav>

<!-- The rest of your page content goes here -->

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
