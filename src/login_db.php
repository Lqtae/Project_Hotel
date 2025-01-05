<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);

                $_SESSION['username'] = $username;
                $_SESSION['email'] = $user['email'];
                $_SESSION['success'] = "You are now logged in";

                if (str_ends_with($user['email'], '.admin')) {
                    header("location: index.php");
                } else {
                    header("location: index.php");
                }
            } else {
                array_push($errors, "Invalid username or password");
                $_SESSION['error'] = "Invalid username or password!";
                header("location: login.php");
            }
        } else {
            array_push($errors, "Username & password is required");
            $_SESSION['error'] = "Username & password is required";
            header("location: login.php");
        }
    }

?>