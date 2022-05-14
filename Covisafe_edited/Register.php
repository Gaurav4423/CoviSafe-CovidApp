<?php
 
require_once "config.php";
require_once "session.php";
 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    $noError=0;
    $fullname = trim($_POST['name']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST["confirm_password"]);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
 
    if($query = $db->prepare("SELECT * FROM users WHERE username = ?")) {
        $error = '';
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $query->bind_param('s', $fullname);
    $query->execute();
    // Store the result so we can check if the account exists in the database.
    $query->store_result();
        if ($query->num_rows > 0) {
            echo $error .= '<p class="error">The username is already registered!</p>';
        } else {
                // Validate password
                if (strlen($password ) < 6) {
                    echo $error .= '<p class="error">Password must have atleast 6 characters.</p>';
                }
                // Validate confirm password
                if (empty($confirm_password)) {
                    echo $error .= '<p class="error">Please enter confirm password.</p>';
                } else {
                    if (empty($error) && ($password != $confirm_password)) {
                        echo $error .= '<p class="error">Password did not match.</p>';
                    }
                }
                if (empty($error) ) {
                    $insertQuery = $db->prepare("INSERT INTO users  VALUES (?,?);");
                    $insertQuery->bind_param("ss", $fullname, $password_hash);
                    $result = $insertQuery->execute();
                    if ($result) {
                        $noError=1;
                        echo $error .= '<p class="success">Your registration was successful!</p>';
                    } else {
                        echo $error .= '<p class="error">Something went wrong!</p>';
                    }
                }
            }
        }
        $query->close();
        //$insertQuery->close();
        // Close DB connection

        if($noError)
        {
            header('Location: HomePage.html');
        }

        mysqli_close($db);
    }
    ?>
   <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sign Up</title>
            <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
            <link rel="stylesheet" href="formStyle.css">
            <!-- Font Awesome 5 CDN link to add social icons in html5 registration form -->
             <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
             integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        </head>
        <body>
            <p style="text-align: center;">
                
                <img src="https://www.apollodiagnostics.in/covisafe/assets/images/covisafe.jpg" alt="Avatar" class="avatar" align="center">
            </p>
            <form style="text-align:center;" method="post">
            <div class="container" align="center">
                <dive class="formWrapper">
                    <div class="formDiv">
                        <h2>Create Account</h2>
                        <p class="text">Sign Up with Social Media</p>
                        <!-- <?php echo $success; ?>
                        <?php echo $error; ?> -->
                        <div class="socialBtn">
                            <div class="facebook icon"><i class="fab fa-facebook-f"></i></div>
                            <div class="twitter icon"><i class="fab fa-twitter"></i></div>
                            <div class="instagram icon"><i class="fab fa-instagram"></i></i></div>
                        </div>

                        <hr>
                        <div class="orDiv">Or</div>
 
                        <p class="text">Sign Up with Username And Password</p>
                        <!-- <form action="" method="post"> -->
                        <div class="formGroup">
                            <i class="far fa-user"></i>
                            <!-- <label>Full Name</label> -->
                            <input type="text" name="name" id="name" placeholder="Username" >
                        </div>    
                        <!-- <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required />
                        </div>     -->
                        <div class="formGroup">
                            <i class="far fa-lock"></i>
                            <!-- <label>Password</label> -->
                            <input type="password" name="password" id="password" placeholder="Password" >
                        </div>
                        <div class="formGroup">
                            <i class="far fa-lock"></i>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                        </div>
                        
                        <!--
                        <div class="checkBox">
                            <input type="checkbox" name="checkbox" id="checkbox">
                            <span class="text">I Agree with Terms & Conditions.</span>
                        </div>
                        <button class="btn">SIGN UP</button>
                        -->
                        <div class="checkBox">
                            <input type="checkbox" name="checkbox" id="checkbox">
                            <span class="text">I Agree with Terms & Conditions.</span>
                        </div>
                        <div class="formGroup">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                        <p>Already have an account? <a href="Login.php">Login here</a>.</p>
                    </div>                       
                </form> 
                </dive>
            </div>
           
    </body>
</html>