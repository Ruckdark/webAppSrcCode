<?php
//echo "<h1 style='color:red;'>đây là trang chủ</h1>";
$servername = "localhost";
$username = "root";
$password = "";
$db = "btl_web";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
session_start();
if (!$_SESSION["ten_dn"]) {
    header("location:login.php");
}
echo "Xin chào: " . $_SESSION["ten_dn"];


//đăng xuất
if (isset($_GET["task"]) && $_GET["task"] == "logout") {
    session_destroy();
    header("location:quantridanhmuc.php");
}
//thêm mới bản tin
if (isset($_POST["insert"])) {
    $cate_id = $_POST["cate_id"];
    $title = $_POST["title"];
    $date = $_POST["date"];
    $author = $_POST["author"];
    $content = $_POST["noidung"];
    $status = $_POST["status"];
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["upload_file"]["name"]);
    $uploadOk = 1;
    // $Intro_ImageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // if($Intro_ImageFileType != "jpg" && $Intro_ImageFileType != "png" && $Intro_ImageFileType != "jpeg"
    // && $Intro_ImageFileType != "gif" ) {
    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //     $uploadOk = 0;
    // }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)) {
            echo $target_file;
            $img_name = str_replace("../upload/", "", $target_file);
            $sql_insert = "insert into tbl_news(Cate_ID,Title,Intro_Image,Description,Post_Date, Author,Status) values($cate_id,N'$title','$img_name',N'$content','$date','$author',$status)";
            if (mysqli_query($conn, $sql_insert)) {
                header("location:quantritintuc.php");
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
//xóa dữ liệu
if (isset($_GET["task"]) && $_GET["task"] == "delete") {
    $news_id = $_GET["id"];
    $sql = "delete from tbl_news where News_ID   = $news_id";
    if (mysqli_query($conn, $sql)) {
        header("location:quantritintuc.php");
        echo "delete record created successfully";
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
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</head>

<body>
    <div class="container">
        <h1 style="text-align:center;">Trang quản trị tin tức</h1>
        <a class="btn btn-danger" href="quantridanhmuc.php?task=logout">Đăng xuất</a>
        <div class="row">
            <div class="row">
                <form action="quantritintuc.php" method="post" enctype="multipart/form-data">
                    Nhập vào tên danh mục:
                    <select class="form-control" name="cate_id" id="">
                        <?php
                        $sql = "select * from tbl_category order by Cate_Id DESC ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["Cate_ID"] . "'>";
                                echo $row["Cate_Name"];
                                echo "</option>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </select>
                    <br>
                    Nhập vào tiêu đề tin:
                    <input type="text" name="title" id="" class="form-control">
                    <br />
                    Chọn ảnh đại diện;
                    <input class="form-control" type="file" name="upload_file" id="">
                    <br>
                    Chọn ngày đăng:
                    <input class="form-control" type="date" name="date" id="">
                    <br>
                    Nhập vào tên tác giả:
                    <input class="form-control" type="text" name="author" id="">
                    <br>
                    Nhập vào nội dung bài viết:
                    <textarea class="form-control" name="noidung" id="" cols="30" rows="10"></textarea>
                    <script>
                        CKEDITOR.replace('noidung');
                    </script>
                    <br>
                    Nhập vào trạng thái;
                    <input class="form-control" type="text" name="status" id="">
                    <br>
                    <input type="submit" value="thêm mới" name="insert" class="btn btn-primary">
                    <br>
                    <br>
                    Nhập vào tiêu đề tin cần tìm:
                    <input type="text" name="search" id="" class="form-control">
                    <br>
                    <input type="submit" value="tìm kiếm" name="btn_search" class="btn btn-danger">
                </form>
            </div>
        </div>
        <div class="row">
            <!--hiển thị bảng dữ liệu-->
            <table class="table table-striped">
                <tr>

                    <th>Tên danh mục</th>
                    <th>tiêu đề tin</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung tin</th>
                    <th>Ngày đăng</th>
                    <th>Người đăng</th>
                    <th>trạng thái</th>
                    <th>Hành động</th>
                </tr>
                <?php
                $sql = "";
                if (isset($_POST["btn_search"])) {
                    $search = $_POST["search"];
                    $sql_select = "select * from tbl_news where Title like '%$search%'";
                } else {
                    $sql_select = "select * from tbl_news";
                }
                $result = mysqli_query($conn, $sql_select);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["Cate_ID"] . "</td>";
                        echo "<td>" . $row["Title"] . "</td>";
                        echo "<td><img width='300px;' src='../upload/" . $row["Intro_Image"] . "'/></td>";
                        $string = strip_tags($row["Description"]);
                        if (strlen($string) > 200) {
                            $stringCut = substr($string, 0, 200);
                            $endPoint = strrpos($stringCut, ' ');
                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '... <a href="quantritintuc.php">Read More</a>';
                        }
                        echo "<td>" . $string  . "</td>";
                        echo "<td>" . $row["Post_Date"] . "</td>";
                        echo "<td>" . $row["Author"] . "</td>";
                        if ($row["Status"] == 1) {
                            echo "<td>Hiển thị</td>";
                        } else {
                            echo "<td>Ẩn</td>";
                        }

                        echo "<td><a href='update_quantritintuc.php?news_id=" . $row["News_ID"] . "' class='btn btn-warning'>Sửa</a>";
                        echo "<a href='quantritintuc.php?task=delete&id=" . $row["News_ID"] . "' class='btn btn-danger'>Xóa</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }

                //mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</body>

</html>