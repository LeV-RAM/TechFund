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

    <div class="back-button">
        <button type="button" class="btn btn-secondary btn-sm"><< Back</button>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-3">Select Amount:</div>
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach(['1,00' => '1,000', '5,00' => '5,000', '10,00' => '10,000', '100,00' => '100,000', '500,00' => '500,000', '1000,00' => '1,000,000'] as $display => $value)
                        <div class="m-2">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">${{ $display }}</h5>
                                    <a href="#" class="btn btn-primary">Select</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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