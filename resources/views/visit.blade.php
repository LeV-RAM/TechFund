<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visit Project</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-custom navbar-dark">
        <span class="navbar-brand mb-0 h1">TECH FUNDS</span>
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
        <button type="button" class="btn btn-secondary btn-sm"><< Back</button>
    </div>

    <div class="visit-content">
        <div class="left-content">

            <div class="project-card">
                <div class="card" style="width: 30rem;height: 30rem;">
                    <div class="hire-button">
                        <button type="button" class="btn btn-outline-success">Hire Available</button>
                    </div>
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card Games using AR Technology</h5>
                      <p class="card-text">We started project to design an augmented reality technology which could project cards used for trading or playing, such as Pokemon cards.</p>
                      <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                  </div>
            </div>
        </div>

        <div class="right-content">
            <div class="component">
                <h2>Current Progress:</h2>
                <div class="dollar">
                    <p>$ 2567,42</p>
                    <button type="button" class="btn btn-primary btn-sm">Remind Me</button>
                </div>
            </div>

            <div class="component">
                <h2>Number of Supporters:</h2>
                <p>89 People</p>
            </div>

            <div class="component">
                <h2>Days until Closed:</h2>
                <p>22 Days</p>
            </div>

            <div class="support-project-button">
                <button type="button" class="btn btn-primary">Support Project</button>
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