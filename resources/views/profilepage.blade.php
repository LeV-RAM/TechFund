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
</head>
<body>
    <nav class="navbar navbar-custom navbar-dark">
        <span class="navbar-brand mb-0 h1">TECH FUNDS</span>
        <div class="navbar-right">
            <button class="btn btn-new-project" type="button" onclick="toNewProject()">
                <i class="fas fa-plus"></i> New Project
            </button>
            <button class="btn" type="button" onclick="window.location.href='';">
                <i class="fas fa-bell"></i>
            </button>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
            <a onclick=backHome() class="btn btn-primary" style="margin-bottom: 1rem;"><< Back</a>
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="col-12 text-center">
                <img src="path_to_avatar_image" alt="Profile Avatar" class="rounded-circle mb-2" style="width: 100px; height: 100px;">
                <h2>{{session('people.name')}}</h2> 

                <hr>
                <button class="btn btn-outline-primary">[BIODATA]</button>
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="col-12">
                <h3>Your Projects:</h3>
                <div class="card-deck">
                    <!-- Dynamically generated project cards -->
                    {{-- @foreach ($yourProjects as $project)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->name }}</h5>
                                <a href="#" class="btn btn-primary">Visit Project</a>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h3>Supported Projects:</h3>
                <div class="card-deck">
                    {{-- @foreach ($supportedProjects as $project)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->name }}</h5>
                                <p class="card-text">{{ $project->status }}</p>
                                <a href="#" class="btn btn-primary">Visit Project</a>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>


    <div class="log-out">
        <button class="log-out-button" onclick=terminateSession()>Log Out</button>
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
        fetch('/profile', {
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