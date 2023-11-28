<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funding</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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

    <div class="container mt-5">
        <!-- User Profile and Navigation -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <button class="btn btn-secondary">&lt;&lt; Back</button>
                <button class="btn btn-primary">+ New Project</button>
            </div>
        </div>
    
        <!-- User Information Section -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <img src="path_to_avatar_image" alt="Profile Avatar" class="rounded-circle mb-2" style="width: 100px; height: 100px;">
                <h2>Raden Jaya Wirawan</h2>
                <hr>
                <button class="btn btn-outline-primary">[BIODATA]</button>
            </div>
        </div>
    
        <!-- Projects Section -->
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
    
        <!-- Supported Projects Section -->
        <div class="row">
            <div class="col-12">
                <h3>Supported Projects:</h3>
                <div class="card-deck">
                    <!-- Dynamically generated supported project cards -->
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
</html>