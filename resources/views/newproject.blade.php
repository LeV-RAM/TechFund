<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Project</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Load FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-custom navbar-dark">
        <span class="navbar-brand mb-0 h1"><a onclick="backHome()">TECH FUNDS</a></span>
        <div class="navbar-right">
            <!-- Notifications button -->
            <button class="btn" type="button" onclick="window.location.href='';">
                <i class="fas fa-bell"></i>
            </button>
            <!-- Profile button -->
            <button class="btn" type="button" onclick="window.location.href='profilepage';">
                <i class="fas fa-user"></i>
            </button>
        </div>
    </nav>

    <div class="container" style="margin-top: 3rem;">
        <a onclick= backHome() class="btn btn-primary" style="margin-bottom: 1rem;"><< Back</a>
        <div class="card">
            <div class="card-header">
                <b>Project Data</b>
            </div>
            <div class="card-body">
            <form action="{{ route('Store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="projectname">Project Name:</label>
                        <input type="text" class="form-control" id="projectname" name="projectname">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="fund">Funds Needed:</label>
                        <input type="number" class="form-control" id="fund" name="fund">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="deadline">Deadline:</label>
                        <input type="date" class="form-control" id="deadline" name="deadline">
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="flex flex-col gap-y-5">
                            <label class="font-semibold pr-44 text-xl text-grayCerebrum" for="">Need worker?</label>
                            <select name="needworker" id="needworker" class="form-contro">
                                <option value="1">YES</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                    </div>
                    <br><br><br>
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