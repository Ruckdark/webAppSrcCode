<?php
session_start();
if (!$_SESSION["ten_dn"]) {
    header("location:login.php");
}
echo "Xin chào: " . $_SESSION["ten_dn"];
$servername = "localhost";
$username = "root";
$password = "";
$db = "btl_web";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

//đăng xuất
if (isset($_GET["task"]) && $_GET["task"] == "logout") {
    session_destroy();
    header("location:quantridanhmuc.php");
}

//thêm mới dữ liệu
if (isset($_POST["insert"])) {
    $cate_name = $_POST["cate_name"];
    $status = $_POST["status"];
    $parent = $_POST["cate_id"];
    $sql = "insert into tbl_category(Cate_Name, Status,Parent) values(N'$cate_name',$status, $parent)";
    if (mysqli_query($conn, $sql)) {
        header("location:quantridanhmuc.php");
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
//xóa dữ liệu
if (isset($_GET["task"]) && $_GET["task"] == "delete") {
    $news_id = $_GET["id"];
    $sql = "delete from tbl_category where Cate_ID = $news_id";
    if (mysqli_query($conn, $sql)) {
        header("location:quantridanhmuc.php");
        echo "delete record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a class="btn btn-danger" href="quantridanhmuc.php?task=logout">Đăng xuất</a>
        <a class="btn btn-danger" href="quantritintuc.php">Trang Quản Trị Tin Tức</a>
        <h1 style="text-align:center;">Trang quản trị danh mục tin tức</h1>
        <div class="row">
            <form action="quantridanhmuc.php" method="post">
                Nhập vào tên danh mục:
                <input class="form-control" type="text" name="cate_name" id="">
                <br>
                Nhập vào trạng thái:
                <!-- <input class="form-control" type="text" name="status" id=""> -->
                <select class="form-control" name="status" id="">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
                <br>
                <input class="btn btn-primary" name="insert" type="submit" value="Thêm mới">
            </form>
        </div>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                <?php
                // $i=1;
                // while($i<10){
                //     echo $i;
                //     $i++;
                // }
                $sql = "select * from tbl_category order by Cate_ID DESC";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["Cate_ID"] . "</td>";
                        echo "<td>" . $row["Cate_Name"] . "</td>";
                        if ($row["Status"] == 1) {
                            echo "<td>Hiển thị</td>";
                        } else {
                            echo "<td>Ẩn</td>";
                        }


                        echo "<td><a href='update_quantridanhmuc.php?id=" . $row["Cate_ID"] . "' class='btn btn-warning'>Sửa</a>";
                        echo "<a href='quantridanhmuc.php?task=delete&id=" . $row["Cate_ID"] . "' class='btn btn-danger'>Xóa</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "không có dữ liệu trong bảng";
                }
                ?>

            </table>
        </div>
    </div>
</body>

</html>