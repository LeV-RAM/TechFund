<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hi, {{session('people.name')}}!</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Load FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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
            margin-top:20px;
            padding-top:20px;
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

        .visit-content {
            display: flex;
            justify-content: space-between;
            padding-left: 15%;
            margin-bottom:60px;
            padding-bottom:60px;
        }

        .left-content, .right-content {
            flex: 1; /* This makes both divs take equal space */
        }

        /* Optional: Add some padding or margin for better spacing */
        .left-content {
            padding-right: 20px; /* Adjust as needed */
            
        }

        .right-content {
            padding-left: 20px; /* Adjust as needed */
            font-size: 50px;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-custom navbar-dark">
        <span class="navbar-brand mb-0 h1"><a onclick="backHome()"=>TECH FUNDS</a></span>
        <div class="navbar-right">
            <button class="btn btn-new-project" type="button" onclick="toNewProject()">
                <i class="fas fa-plus"></i> New Project
            </button>
            <button class="btn" type="button" onclick="window.location.href='';">
                <i class="fas fa-bell"></i>
            </button>
        </div>
    </nav>
    <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center">
                  <a onclick="window.location.href='/profilepage'" class="btn btn-primary" style="margin-bottom: 1rem;"><< Back</a>
                </div>
            </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            
                <h2>Edit Profile</h2>
                <br>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $people->name }}" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $people->address }}" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="phone number">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $people->phoneNumber }}" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    

                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
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
</body>
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
            window.location.href = 'profile';
        })
    }

    function backHome(){
        fetch('/home', {
            method: 'POST'
        })
        .then(response => {
            // After session update, navigate to the new URL
            window.location.href = 'home';
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
</html>