<?php
require_once "./config.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    $select = "SELECT * FROM users WHERE username = '$username' ";

    $checkUser = mysqli_query($link, $select);

    if (mysqli_num_rows($checkUser) > 0) {
        echo "<script>
                alert('this username already exists')
            </script>";
    } else {
        if ($password !== $confirm_password) {
            echo "<script>
                alert('password doesnt match')
            </script>";
        } else {
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
            $insert = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$encrypted_password')";
            if (mysqli_query($link, $insert)) {
                echo "<script>
                alert('user registered successfully')
            </script>";
                header("refresh:5");
            } else {
                echo "<script>
                alert('failed to register the user')
            </script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-Commerce</title>
    <?php include "./includes/header.php" ?>
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
        }

        .register-card {
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
            background: rgba(255, 255, 255, 0.97);
        }

        .brand-icon {
            font-size: 3rem;
            color: #185a9d;
        }
    </style>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="register-card card p-5 w-100" style="max-width: 420px;">
            <div class="text-center mb-4">
                <i class="bi bi-person-plus brand-icon"></i>
                <h2 class="fw-bold mt-2">Create Account</h2>
            </div>
            <form id="registerForm" novalidate action="" method="post">
            <div class="mb-3">
                <label for="registerEmail" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="text" class="form-control" id="registerEmail" placeholder="Enter username" name="username" required>
                    <div class="invalid-feedback">Please enter your email or username.</div>
                </div>
            </div>
            <div class="mb-3">
                <label for="registerEmailField" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
                    <input type="email" class="form-control" id="registerEmailField" placeholder="Enter email" name="email" required>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
            </div>

                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="registerPassword" placeholder="Password" name="password" required>
                        <div class="invalid-feedback">Please enter a password.</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="registerConfirmPassword" placeholder="Confirm Password" name="confirmPassword" required>
                        <div class="invalid-feedback" id="confirmPasswordFeedback">Passwords must match.</div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-success w-100 py-2 mt-2">Register</button>
            </form>
            <div class="mt-3 text-center">
                <a href="login.php" class="text-decoration-none">Already have an account? <span class="fw-semibold text-success">Login</span></a>
            </div>
        </div>
    </div>
    <?php include "./includes/footer.php" ?>
    <script>
        // Simple form validation for password match
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            var form = this;
            var password = document.getElementById('registerPassword').value;
            var confirmPassword = document.getElementById('registerConfirmPassword').value;
            if (form.checkValidity() === false || password !== confirmPassword) {
                event.preventDefault();
                event.stopPropagation();
                if (password !== confirmPassword) {
                    document.getElementById('registerConfirmPassword').classList.add('is-invalid');
                } else {
                    document.getElementById('registerConfirmPassword').classList.remove('is-invalid');
                }
            } else {
                document.getElementById('registerConfirmPassword').classList.remove('is-invalid');
            }
            form.classList.add('was-validated');
        });
    </script>
</body>

</html>