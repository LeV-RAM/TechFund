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

    <div class="container" style="margin-top: 3rem;">
        <a href="{{ url()->previous() }}" class="btn btn-primary" style="margin-bottom: 1rem;"><< Back</a>
        
        <div class="card">
            <div class="card-header">
                Project Data
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('projects.store') }}" method="POST"> --}}
                    @csrf
                    
                    <div class="form-group">
                        <label for="project_name">Project Name:</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="funds_needed">Funds Needed:</label>
                        <input type="number" class="form-control" id="funds_needed" name="funds_needed" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="deadline">Deadline:</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Need Worker?</label>
                        <div>
                            <input type="radio" id="need_worker_yes" name="need_worker" value="yes">
                            <label for="need_worker_yes">Yes</label>
                        </div>
                        <div>
                            <input type="radio" id="need_worker_no" name="need_worker" value="no">
                            <label for="need_worker_no">No</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit Project</button>
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
</html>