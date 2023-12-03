<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            margin-top:60px
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
        
        /* register */

        a.backbutton{
            font-size:20px;
            color:white;
            text-decoration: none;
            /* background-color: white; */
            padding:15px;
            margin:15px;

        }

        .g-3{
            /* display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            align-content: space-between; */
            font-size: 30px;
            padding:0px 200px;
        }
        .col-md-6{
            margin: 6vh;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
            align-content: space-evenly;
        }
        
        .btnstyle{
            font-size:25px;
        }

        .form-label{
            margin: 0px 11vw;
            padding: 0 8vw;
        }

        input{
            font-size:20px;
            width:100%;
            padding: 10px 20px;
            text-align:center;
        }

    </style>
</head>

<body style="margin: 0; padding-bottom: 4rem;">

<nav class="navbar navbar-custom navbar-dark">
    <span class="navbar-brand mb-0 h1">TECH FUNDS</span>
    <div class="navbar-right">
    </div>
</nav>
<!-- content -->

<div style="background-color: #343a40; padding: 2rem; text-align: center; display:flex; flex-direction:row; flex-wrap:wrap; justify-content: center;padding-bottom:60px">
    <!-- Box container with wrapping boxes -->
    
    <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
        <!-- Box 1 -->
        <a style="background-color: #505050; color: white; padding: 15rem; border-radius: 20vh; margin-bottom: 2rem; width: 30vw; height: 30vh; display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <div style="font-size:50px;">
            <div style="margin-bottom:1vh;">WELCOME TO TECHFUND</div>
            
            <form class="row g-3" method="POST" action="{{route('login.user')}}">
                @csrf
                <div class="col-md-6">
                    <label class="form-label" for="email" style="margin: 1vh;">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary btnstyle" type="submit">Login</button>
                </div>
                <div class="col-12">
                    
                </div>
            </form>
            </div>
        </a>
        <a href="testform" class="backbutton">Register New Account</a>
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


