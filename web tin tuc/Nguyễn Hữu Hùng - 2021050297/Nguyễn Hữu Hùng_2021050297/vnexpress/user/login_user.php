<?php
session_start();

require("../config/db.php");
if (isset($_POST["login_user"])) {
  $us = $_POST["user_name"];
  $pa = $_POST["psw"];
  $sql = "select * from user where User_Name = '$us' and Pass_Word = '$pa'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo $row["User_Name"];
      header("location:../index.php");
      $_SESSION["ten_dangnhap"] = $row["User_Name"];
    }
  } else {
    echo "<h3 style='color:red;'>Sai tên đăng nhập hoặc mật khẩu</h3>";
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Style all input fields */
    input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
    }

    /* Style the submit button */
    input[type=submit] {
      background-color: #04AA6D;
      color: white;
    }

    /* Style the container for inputs */
    .container {
      background-color: #f1f1f1;
      padding: 20px;
      width: 500px;
      margin: 60 auto;
    }

    /* The message box is shown when the user clicks on the password field */
    #message {
      display: none;
      background: #f1f1f1;
      color: #000;
      position: relative;
      padding: 0px;
      margin-top: 5px;
    }

    #message p {
      padding: 10px 35px;
      font-size: 12px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
      color: green;
    }

    .valid:before {
      position: relative;
      left: -35px;
      content: "✔";
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
      color: red;
    }

    .invalid:before {
      position: relative;
      left: -35px;
      content: "✖";
    }
  </style>
</head>

<body>
  <div class="container" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
    <div>
      <form method="post" action="login_user.php">
        <label for="usrname">User Name</label>
        <input type="text" name="user_name" placeholder="Nhập tên đăng nhập" required>
        <label for="psw">Password</label>
        <input type="password" id="psw" name="psw" placeholder="Nhập password" required>
        <input type="submit" value="Đăng Nhập" name="login_user">
        <a href="register_user.php">Chưa có tài khoản</a>
      </form>
    </div>
  </div>
</body>

</html>