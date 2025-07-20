<?php

require_once "./config.php";

session_start();

if(!empty($_SESSION['id'])){
    header('Location: index.php');
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = "SELECT * FROM users WHERE username = '$username'";
    
    $result = mysqli_query($link,$select);

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){ 

        if(password_verify($password,$row['password'])){
            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location:index.php');
        } else {
            echo "<script>
                alert('password is incorrect')
                </script>";
        }
    } else {
        echo "<script>
                alert('this user is not registered')
                </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce</title>
    <?php include "./includes/header.php" ?>
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        .login-card {
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
            background: rgba(255,255,255,0.95);
        }
        .brand-icon {
            font-size: 3rem;
            color: #2575fc;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="login-card card p-5 w-100" style="max-width: 400px;">
            <div class="text-center mb-4">
                <i class="bi bi-bag-check brand-icon"></i>
                <h2 class="fw-bold mt-2">Sign In</h2>
            </div>
            <form action ="" method = "post">
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email or Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="loginEmail" placeholder="Enter email or username" name = "username" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="loginPassword" placeholder="Password" name = "password" required>
                    </div>
                </div>
                <button type="submit" name = "submit" class="btn btn-primary w-100 py-2 mt-2">Login</button>
            </form>
            <div class="mt-3 text-center">
                <a href="registration.php" class="text-decoration-none">Don't have an account? <span class="fw-semibold text-primary">Register</span></a>
            </div>
        </div>
    </div>
    <?php include "./includes/header.php" ?>
</body>
</html> 