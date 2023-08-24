<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "btl_web";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
if (isset($_POST["login"])) {
    $us = $_POST["us"];
    $pa = $_POST["pa"];
    $sql = "select * from tbl_admin where Admin_Name = '$us' and Pass_Word = '$pa'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row["Admin_Name"];
            $_SESSION["ten_dn"] = $us;
            header("location:quantridanhmuc.php");
        }
    } else {
        echo "<h3 style='color:red;'>Sai tên đăng nhập hoặc mật khẩu</h3>";
    }
}
?>
<form action="login.php" method="post">
    <h1>Trang đăng nhập</h1>
    <br>
    Nhập tên đăng nhâp:
    <input type="text" name="us" id="">
    <br>
    Nhập vào mật khẩu:
    <input type="password" name="pa" id="">
    <br>
    <input type="submit" value="Đăng nhập" name="login">
</form>