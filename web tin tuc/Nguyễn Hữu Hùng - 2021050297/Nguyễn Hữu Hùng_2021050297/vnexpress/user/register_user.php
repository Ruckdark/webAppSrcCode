<?php
session_start();

require("../config/db.php");
if (isset($_POST["register_user"])) {
  $us = $_POST["user_name"];
  $na = $_POST["name"];
  $email = $_POST["user_email"];
  $pa = $_POST["psw"];
  $sdt = $_POST["user_phone"];
  //Kiểm tra user name đã tồn tại trong database chưa
  $sql = "select * from user where User_Name='$us'";
  $kt = mysqli_query($conn, $sql);

  if (mysqli_num_rows($kt)  > 0) {
    echo "<script>alert('User Name đã tồn tại')</script>";
  } else {
    $sql = "INSERT INTO `user`(`Name`, `Email`, `Phone`, `User_Name`, `Pass_Word`) VALUES ('$na','$email','$sdt','$us','$pa')";
    if (mysqli_query($conn, $sql)) {
      header("location:login_user.php");
      echo "Đăng Ký Thành Công";
    } else {
      echo "Đăng ký thất bại ";
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <form method="post" action="register_user.php">
      <label for="usrname">User Name</label>
      <input type="text" name="user_name" placeholder="Nhập tên đăng nhập" required>
      <label for="name">Name</label>
      <input type="text" name="name" placeholder="Nhập tên của bạn" required>
      <label for="usrname">Email</label>
      <input type="email" name="user_email" placeholder="Nhập email" required>
      <label for="usrname">Nhập số điện thoại</label>
      <input type="text" name="user_phone" placeholder="Nhập số điện thoại" required>
      <label for="psw">Password</label>
      <input type="password" id="psw" name="psw" placeholder="Nhập password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      <label class="text-black">Nhập lại Password</label>
      <input type="password" id="re_psw" name="user_confirm_password" placeholder="Nhập lại password" required>
      <div id="message">
        <p id="letter" class="invalid">Chứa 1 <b>chữ thường</b> </p>
        <p id="capital" class="invalid">Chứa 1 <b>chữ hoa</b> </p>
        <p id="number" class="invalid">Chứa 1 <b>ký tự đặc biệt</b></p>
        <p id="length" class="invalid">Tối thiểu <b>8 ký tự</b></p>
      </div>
      <input type="submit" value="Đăng ký" name="register_user" onclick="return Validate()">
      <input type="submit" value="Cancel" name="register_user">
      <br>
      <a href="login_user.php">Đã có tài khoản</a>
    </form>
  </div>
  <script>
    var myInput = document.getElementById("psw");
    var confirmPassword = document.getElementById("re_psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    function Validate() {
      if (myInput.value != confirmPassword.value) {
        alert("Nhập lại password không chính xác.");
        return false;
      }
      return true;

    }
    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[!@#$%^&*:"'}{()+_-]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
  </script>

</body>

</html>