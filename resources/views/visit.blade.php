<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visit Project</title>
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

    <div class="back-button">
        <a onclick= backHome() class="btn btn-primary" style="margin-bottom: 1rem;"><< Back</a>
    </div>

    <div class="visit-content">
        <div class="left-content">

            <div class="project-card">
                <div class="card" style="width: 30rem;height: 35rem;">
                    @if($project->needworker == 1)
                        <div class="hire-button">
                            <button type="button" class="btn btn-outline-success">Hire Available</button>
                        </div>
                    @else
                        <br>
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{$project->projectname}}</h5>
                      <br>
                      <b><p class="card-text"> What is {{$project->projectname}}?</p></b>
                      <br>
                      <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                      <br><br>
                      <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                  </div>
            </div>
        </div>

        <div class="right-content">
            <div class="component">
                <h2>Current Funds Needed:</h2>
                <div class="dollar">
                    <b><p>$ {{$project->fund}}</p></b>
                </div>
            </div>

            <div class="component">
                <h2>Number of Supporters:</h2>
                <b><p>{{ $project->pplCounter }} People</p></b>
            </div>
            @php
                $deadlineDate = new DateTime($project->deadline);
                $currentDate = new DateTime();
                $interval = $currentDate->diff($deadlineDate);
                $daysUntilDeadline = $interval->format('%a'); // %a will give the total number of days
                $proID = $project->projectID
            @endphp
            <div class="component">
                <h2>Days until Closed:</h2>
                <b><p>{{$daysUntilDeadline}} Days</p></b>
            </div>

            <div class="support-project-button">
                <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('fundProj', ['id' => $proID]) }}'">Invest</button>
            </div>
            <div class="support-project-button">
                <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('supportsaya', ['id' => $proID]) }}'">Support</button>
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

    function backHome(){
        fetch('/home', {
            method: 'POST'
        })
        .then(response => {
            // After session update, navigate to the new URL
            window.location.href = '/home';
        })
    }

    function toSuppPage(){
        fetch('/fund', {
            method: 'POST'
        })
        .then(response => {
            // After session update, navigate to the new URL
            window.location.href = '/home/{id}/fundin';
        })
    }
</script>
</html>