<?php 
require ("../function.php");

session_start();

if( isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username = '$username'";

    $result = mysqli_query($conn, $query);
    // cek username
    if(mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
       if (password_verify($password, $row['password'])) {
        header('Location: ../index.php');
       };
    }
    

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        /* CSS untuk latar belakang */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* CSS untuk kontainer login */
        .login-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        /* CSS untuk judul */
        .login-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* CSS untuk input dan tombol */
        .login-form input {
            width: 376px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .login-form button {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        /* CSS untuk responsif */
        @media (max-width: 768px) {
            .login-container {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Sign in</h2>
        <form class="login-form" action="" method="post">
            <input type="text" placeholder="Username" name="username" id="username" required>
            <input type="password" placeholder="Password" name="password" id="password" required>
            <button type="submit" id="login" name="login">Sign in</button>
        </form>
        <small >Don't have a account?<a href="/registration/">Create a new account</a></small>
    </div>
</body>
</html>
