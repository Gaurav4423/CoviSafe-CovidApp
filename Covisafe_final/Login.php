<?php
 
require_once "config.php";
require_once "session.php";
 
 
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
 
    $username = trim($_POST['name']);
    $password = trim($_POST['password']);
 
    // validate if email is empty
    if (empty($username)) {
        echo $error .= '<p class="error">Please enter username.</p>';
    }
 
    // validate if password is empty
    if (empty($password)) {
        echo $error .= '<p class="error">Please enter your password.</p>';
    }
    if (empty($error)) {
            
            $query="SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($db, $query);
            while($row = mysqli_fetch_assoc($result)) {

                if (password_verify($password, $row['password'])) {
                    header('Location: HomePage.html');
                } else {
                    echo $error .= '<p class="error">The password is not valid.</p>';
                }

            }
    }
    // Close connection
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Login</h2>
                    <p>Please fill in your email and password.</p>
                    <?php echo $error; ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="name" name="name" class="form-control">
                        </div>    
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            </div>
                            <p>Don't have an account? <a href="Register.php">Register here</a>.</p>
                        </form>
                    </div>
                </div>
            </div>    
        </body>
    </html>                           