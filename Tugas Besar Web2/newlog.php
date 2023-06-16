<?php
session_start();

// If user is already logged in, redirect to appropriate page
if(isset($_SESSION['login_user'])) {
  if($_SESSION['user_type'] == 'user') {
    header("location: user.php");
  } else if($_SESSION['user_type'] == 'admin') {
    header("location: admin.php");
  }
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'];
    $_SESSION['user_type'] = $user_type;
    if($user_type == 'admin') {
      header("location: loginn.php");
    } else {
      header("location: register.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
     body {
  font-family: Arial, sans-serif;
  background-color: #333;
  background-size: 100% 100%; /* mengatur latar belakang mengisi seluruh lebar dan tinggi body */
}

.container {
  max-width: 400px;
  margin: 0 auto;
  padding: 40px;
  margin-top: 100px;
  background-color: rgba(255, 255, 255, 0.5); /* nilai alpha 0.5 membuat transparan */
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
  margin-bottom: 30px;
}

form {
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  font-weight: bold;
  color: #333;
}

.selectpicker {
  width: 100%;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

.btn {
  width: 100%;
  padding: 8px 16px;
  font-size: 14px;
  font-weight: bold;
  text-align: center;
  text-transform: uppercase;
  border: none;
  border-radius: 4px;
  color: #fff;
  background-color: #ffeba7;
}

.btn:hover {
  background-color: #286090;
}

.btn-default {
  background-color: #ccc;
  color: #333;
}

.btn-default:hover {
  background-color: #bbb;
}
  </style>
</head>
<body>
  <div class="container">
    <h2>Login Page</h2>
    <form method="post">
      <div class="form-group">
        <label for="user_type">Login as:</label>
        <select class="form-control" id="user_type" name="user_type">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
</body>
</html>
