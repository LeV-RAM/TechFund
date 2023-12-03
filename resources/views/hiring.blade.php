<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HIRE</title>
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
            padding-bottom:20px;
            height:100px;
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
<body>
    <nav class="navbar navbar-custom navbar-dark">
        <span class="navbar-brand mb-0 h1"><a onclick="window.location.href='showProject'">TECH FUNDS</a></span>
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

    <div class="back-button">
        <button type="button" class="btn btn-primary" onclick="window.location.href='showProject'"><< Back</button>
    </div>

    <div style="background-color: #343a40; padding: 2rem; text-align: center; display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; padding-bottom: 60px;">
        <!-- Box container with wrapping boxes -->
        
        <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; align-items: center;">
            <!-- Box 1 -->
            <div style="background-color: #505050; color: white; padding: 2rem; border-radius: 10vh; margin-bottom: 2rem; width: 40vw; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                <div style="font-size: 1.2rem;">
                    <div style="margin-bottom: 1vh;"><b>APPLICATION FORM</b></div>
                    <br>
                    <form action="#" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 1rem; align-items: center;">
                        @csrf

                        <div class="form-group" style="width: 500px;">
                            <label for="address">Current Address:</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        
                        <div class="form-group" style="width: 500px;">
                            <label for="years_of_experience">Years of Experience:</label>
                            <input type="number" class="form-control" id="years_of_experience" name="years_of_experience" required>
                        </div>
                        
                        <div class="form-group" style="width: 500px;">
                            <label for="skills">Skills to Offer:</label>
                            <input type="text" class="form-control" id="skills" name="skills" required>
                        </div>
                        <div class="form-group">
                            <label for="cv">Upload CV:</label>
                            <br>
                            <input type="file" class="form-control-file" id="cv" name="cv" required>
                        </div>

                        <button type="submit" class="btn btn-primary" disabled>Submit Form</button>
                    </form>
                </div>
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
        fetch('/profile', {
            method: 'POST'
        })
        .then(response => {
            // After session update, navigate to the new URL
            window.location.href = 'profile';
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