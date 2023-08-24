<?php
//echo "<h1 style='color:red;'>đây là trang chủ</h1>";
$servername = "localhost";
$username = "root";
$password = "";
$db = "btl_web";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
//thêm mới danh mục tin tức
//xóa dữ liệu
if (isset($_POST["update_quantridanhmuc"])) {
    $cate_name = $_POST["cate_name"];
    $status = $_POST["status"];
    $cate_id = $_POST["cate_id"];
    $sql = "update tbl_category set Cate_Name = N'$cate_name',Status=$status  where Cate_ID = $cate_id";
    if (mysqli_query($conn, $sql)) {
        header("location:quantridanhmuc.php");
        echo "update record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!-- <h2>Xin chào thẻ H2</h2> -->
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container">
        <h1 style="text-align:center;">Trang chỉnh sửa danh mục tin tức</h1>
        <div class="row">
            <div class="col-6">
                <form action="update_quantridanhmuc.php" method="post">
                    <?php
                    if (isset($_GET["id"])) {
                        $cate_id = $_GET["id"];
                        $sql = "select * from tbl_category where Cate_ID = $cate_id";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {

                                echo "<input type='hidden' value='" . $row["Cate_ID"] . "' name='cate_id'>";
                                echo "Nhập vào tên danh mục:";
                                echo "<input type='text' value='" . $row["Cate_Name"] . "' name='cate_name' class='form-control'>";
                                echo "Nhập vào trạng thái:";
                                echo "<input type='text' value='" . $row["Status"] . "' name='status' id='' class='form-control'>";
                            }
                        }
                    }

                    ?>
                    <br />
                    <input type="submit" name="update_quantridanhmuc" value="Chỉnh sửa" class="btn btn-primary">
                    <a class="btn btn-danger" href="category.php">Hủy</a>

                </form>
            </div>
        </div>

    </div>

</body>

</html>