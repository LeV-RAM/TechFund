{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECH FUNDS</title>
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
<body style="margin: 0; padding-bottom: 4rem;">

<nav class="navbar navbar-custom navbar-dark">
    <span class="navbar-brand mb-0 h1">TECH FUNDS</span>
    <div class="navbar-right">
        <!-- New Project button -->
        <button class="btn btn-new-project" type="button" onclick="window.location.href='newproject';">
            <i class="fas fa-plus"></i> New Project
        </button>
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
<!-- content -->
<div style="background-color: #343a40; padding: 2rem; text-align: center;">
    <!-- Box container -->
    <!-- Content area with dark background -->
<div style="background-color: #343a40; padding: 2rem; text-align: center;">
@if(session()->has('people'))
    <a>Welcome, {{ session('people.name') }}!</a>
@endif
    <!-- Box container with wrapping boxes -->
    <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
        <!-- Box 1 -->
        <a href="link-to-your-destination-1" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <div>
                <p style="font-size: 1.2rem; font-weight: bold;">Box Title 1</p>
                <p>Description for box 1...</p>
            </div>
        </a>
        <!-- Box 2 -->
        <a href="link-to-your-destination-2" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <div>
                <p style="font-size: 1.2rem; font-weight: bold;">Box Title 2</p>
                <p>Description for box 2...</p>
            </div>
        </a>
        <!-- Box 3 -->
        <a href="link-to-your-destination-3" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <div>
                <p style="font-size: 1.2rem; font-weight: bold;">Box Title 3</p>
                <p>Description for box 3...</p>
            </div>
        </a>
        <!-- Box 4 -->
        <a href="link-to-your-destination-4" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <div>
                <p style="font-size: 1.2rem; font-weight: bold;">Box Title 4</p>
                <p>Description for box 4...</p>
            </div>
        </a>
    </div>
    <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
        <!-- Box 1 -->
        <a href="link-to-your-destination-1" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <div>
                <p style="font-size: 1.2rem; font-weight: bold;">Box Title 1</p>
                <p>Description for box 1...</p>
            </div>
        </a>
        <!-- Box 2 -->
        <a href="link-to-your-destination-2" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <div>
                <p style="font-size: 1.2rem; font-weight: bold;">Box Title 2</p>
                <p>Description for box 2...</p>
            </div>
        </a>
        <!-- Box 3 -->
        <a href="link-to-your-destination-3" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <div>
                <p style="font-size: 1.2rem; font-weight: bold;">Box Title 3</p>
                <p>Description for box 3...</p>
            </div>
        </a>
        <!-- Box 4 -->
        <a href="link-to-your-destination-4" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <div>
                <p style="font-size: 1.2rem; font-weight: bold;">Box Title 4</p>
                <p>Description for box 4...</p>
            </div>
        </a>
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

<!-- The rest of your page content goes here -->

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('newProjectForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch('/projects/create', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.project) {
                    addProjectToUI(data.project);
                }
            })
            .catch(error => console.error('Error:', error));
        });

        function addProjectToUI(project) {
            let container = document.getElementById('projectContainer');
            let newProject = `
                <a href="/projects/${project.id}" style="background-color: #505050; color: white; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                    <div>
                        <p style="font-size: 1.2rem; font-weight: bold;">${project.name}</p>
                        <p>Needed: ${project.fund_needed}</p>
                        <p>Deadline: ${project.deadline}</p>
                    </div>
                </a>
            `;
            container.innerHTML += newProject;
        }
    });
</script>
</body>
</html>
