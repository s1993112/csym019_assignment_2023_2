<?php
// login.php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $mysqli = connectDB();

    $db_password = getUserPassword($mysqli, $username);
//*****************MUHAMMAD SAYEM*****************
//*****************22830734***********************
//*****************CSYM019************************

    if ($db_password !== false) {
        if ($password == $db_password) {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: displayCourse.php');
            exit();
        } else {
            $login_error = 'Password is incorrect';
        }
    } else {
        $login_error = 'No such user found';
    }

    closeDB($mysqli);
}
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #e1e1e1;
      font-family: Arial, sans-serif;
    }

    form {
      background: #fff;
      width: 300px;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
      animation: slide-up 0.5s ease;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 3px;
    }
//*****************MUHAMMAD SAYEM*****************
//*****************22830734***********************
//*****************CSYM019************************

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      color: #fff;
      background: #007BFF;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    input[type="submit"]:hover {
      background: #0056b3;
    }

    @keyframes slide-up {
      0% {
        transform: translateY(50px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>
<body>
  <form method="post">
    <h2>Project Internet Programming Login</h2>
    <?php if(isset($login_error)) { echo "<p>$login_error</p>"; } ?>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" value="Login">
  </form>
</body>
</html>
