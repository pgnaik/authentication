<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .jumbotron-heading {
            font-family: 'Arial', sans-serif;
            font-size: 24px;
            font-weight: bold;
        }

        .custom-jumbotron {
            padding: 20px; /* Adjust padding as needed */
            height: 200px; /* Adjust the height */
        }
    </style>
    <title>Login System</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                // Check for session messages and display Bootstrap alert
                session_start();
                if (isset($_SESSION["message"])) {
                    $alert_type = isset($_SESSION["alert_type"]) ? $_SESSION["alert_type"] : "info";
                    echo '<div class="alert alert-' . $alert_type . ' alert-dismissible fade show" role="alert">
                            ' . $_SESSION["message"] . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';

                    // Clear session messages
                    unset($_SESSION["message"]);
                    unset($_SESSION["alert_type"]);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <div class="jumbotron bg-primary text-white text-center custom-jumbotron">
                            <img src="assets/images/siber.jpg" alt="Authentication Image" class="img-fluid rounded-circle mb-3" style="max-width: 100px; height: auto;">
                            <h1 class="display-4 jumbotron-heading">Authentication Form</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Removed the action and method attributes from the form -->
                        <form id="loginForm" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <!-- Use type="button" to prevent default form submission -->
                            <button type="submit" id="loginButton" class="btn btn-primary">Login</button>
                        </form>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</html>
