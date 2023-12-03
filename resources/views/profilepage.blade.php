<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funding</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Load FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .profilecontent {
            justify-content: space-between;
            margin-bottom:100px;
            padding-bottom:100px;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-custom navbar-dark">
        <span class="navbar-brand mb-0 h1"><a onclick="backHome()">TECH FUNDS</a></span>
        <div class="navbar-right">
            <button class="btn btn-new-project" type="button" onclick="toNewProject()">
                <i class="fas fa-plus"></i> New Project
            </button>
            <button class="btn" type="button" onclick="window.location.href='';">
                <i class="fas fa-bell"></i>
            </button>
        </div>
    </nav>
    <div class ="profilecontent">
        <div class="container mt-5">
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center">
                <a onclick=backHome() class="btn btn-primary" style="margin-bottom: 1rem;"><< Back</a>
                </div>
            </div>
        
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <img src="{{asset('profilepic.png')}}" alt="Profile Avatar" class="rounded-circle mb-2" style="width: 100px; height: 100px;">
                    <h2>{{session('people.name')}}</h2> 

                    <hr>
                    <button class="btn btn-outline-primary">[BIODATA]</button>
                </div>
            </div>
        
            <div class="row mb-4">
                <div class="col-12">
                    <h3>Your Projects:</h3>
                    <div class="card-deck" style="background-color: #ffffff; padding: 2rem; display: flex; flex-wrap: wrap; justify-content: flex-start; text-align: center;">
                        <!-- Dynamically generated project cards -->
                        @foreach($projects as $project)   
                            <a href="{{route('showProject', ['id' => $project->projectID])}}" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none; margin: 1rem;">
                                <div>
                                    <p style="font-size: 1.2rem; font-weight: bold;">{{$project->projectname}}</p>
                                    @if($project->fund <= 0)
                                        <p>ALL FUNDS COLLECTED</p>
                                    @else
                                        <p>Current Funds Needed:</p>
                                        <p>{{$project->fund}}</p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3>Supported Projects:</h3>
                    <div class="card-deck" style="background-color: #ffffff; padding: 2rem; display: flex; flex-wrap: wrap; justify-content: flex-start; text-align: center;">
                        @foreach($projectsSupp as $project)   
                            <a href="{{route('showProject', ['id' => $project->projectID])}}" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none; margin: 1rem;">
                                <div>
                                    <p style="font-size: 1.2rem; font-weight: bold;">{{$project->projectname}}</p>
                                    @if($project->fund <= 0)
                                        <p>ALL FUNDS COLLECTED</p>
                                    @else
                                        <p>Current Funds Needed:</p>
                                        <p>{{$project->fund}}</p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div class="log-out">
            <button class="log-out-button" onclick=terminateSession()>Log Out</button>
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