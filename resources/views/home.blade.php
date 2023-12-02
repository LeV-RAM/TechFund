{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TECH FUNDS</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Load Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Load FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        #content {
            flex: 1;  /* This allows the content to expand and push the footer down */
            /* Your content styles here */
        }
        footer {
            background-color: #000000;
            color: white;
            text-align: center;
            padding: 1rem 0;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 20px; /* Adjust the height as needed */
            background-color: black; /* Your desired footer background color */
            color: white; /* Your desired text color */
            text-align: center;
            /* No need for 'position: absolute' here */
        }
        body {
            background-color: #343a40; /* Adjusted to a dark grey to match Bootstrap's dark theme */
            color: white;
        }
        .navbar-custom .btn:hover {
            color: #00008B; /* Dark blue text on hover */
            background-color: #ffffff; /* White background on hover */
            border-radius: 0.25rem; /* Slight rounding of corners on hover */
        }
        .navbar-custom {
            background-color: #000000; /* Dark blue background */
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
<body style="margin: 0; padding-bottom: 4rem;">

<nav class="navbar navbar-custom navbar-dark">
    <span class="navbar-brand mb-0 h1"><a onclick="backHome()">TECH FUNDS</a></span>    
    <div class="navbar-right">
        <!-- New Project button -->
        <button class="btn btn-new-project" type="button" onclick=toNewProject()>
            <i class="fas fa-plus"></i> New Project
        </button>
        <!-- Notifications button -->
        <button class="btn" type="button" onclick="window.location.href='';">
            <i class="fas fa-bell"></i>
        </button>
        <!-- Profile button -->
        <button class="btn" type="button" onclick=viewProfile()>
            <i class="fas fa-user"></i>
        </button>
    </div>
</nav>
<!-- content -->
<div style="background-color: #343a40; padding: 2rem; text-align: center;">
@if(session()->has('people'))
    <a>Welcome, {{ session('people.name') }}!</a>
@endif
    <!-- Box container -->
<div style="background-color: #343a40; padding: 2rem; display: flex; flex-wrap: wrap; justify-content: flex-start; text-align: center;">

@foreach($projects as $project)   
    <a href="{{route('showProject', ['id' => $project->projectID])}}" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none; margin: 1rem;">
        <div>
            <p style="font-size: 1.2rem; font-weight: bold;">{{$project->projectname}}</p>
            <p>Current Funds Needed:</p>
            <p>{{$project->fund}}</p>
        </div>
    </a>
@endforeach
</div>

    
</div>

<footer>
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 1rem;">
        <span style="font-weight: bold;">Tech Funds</span>
        <div>
            <a href="https://twitter.com" style="color: white; margin-right: 10px; text-decoration: none;">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://facebook.com" style="color: white; text-decoration: none;">
                <i class="fab fa-facebook-f"></i>
            </a>
        </div>
    </div>
</footer>

<!-- The rest of your page content goes here -->

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
    function toNewProject(){
        fetch('/newproject', {
            method: 'POST'
        })
        .then(response => {
            // After session update, navigate to the new URL
            window.location.href = 'newproject';
        })
    }

    function viewProfile(){
        fetch('/profilepage', {
            method: 'POST'
        })
        .then(response => {
            // After session update, navigate to the new URL
            window.location.href = 'profilepage';
        })
    }

    function terminateSession(){
        fetch('/terminate', {
            method: 'POST'
        })
        .then(response => {
            // After session update, navigate to the new URL
            window.location.href = '/';
        })
    }
</script>
</body>
</html>
