<?php
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

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 style="text-align:center;">Sửa tin tức</h1>
        <div class="row">
            <form class="form" action="update_quantritintuc.php" id="upload_form" enctype="multipart/form-data" method="post">
                <?php
                if (isset($_GET["news_id"])) {
                    $news_id = $_GET["news_id"];
                    $sql = "select * from tbl_news where News_ID = $news_id";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $row = mysqli_fetch_assoc($result);

                ?>
                        <input type='hidden' value="<?php echo $row['News_ID']; ?>" name='news_id'>
                        Nhập vào tên danh mục:
                        <select class="form-control" name="cate_id" id="">
                            <?php
                            $sql_cate_id = "select * from tbl_category order by Cate_Id DESC";
                            $sql_news_id = "SELECT * FROM `tbl_category` INNER JOIN `tbl_news` ON `tbl_news`.`Cate_ID` = `tbl_category`.`Cate_ID` WHERE News_ID = $news_id ";

                            $result_cate_id = mysqli_query($conn, $sql_cate_id);
                            if (mysqli_num_rows($result_cate_id) > 0) {
                                // output data of each row
                                while ($row_cate_id = mysqli_fetch_assoc($result_cate_id)) {
                                    echo "<option value='" . $row_cate_id["Cate_ID"] . "'>";
                                    echo $row_cate_id["Cate_Name"];
                                    echo "</option>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </select>

                        <br>
                        Nhập vào tiêu đề tin:
                        <input type="text" value="<?php echo $row['Title']; ?>" name="title" id="" class="form-control">
                        <br />
                        Chọn ảnh đại diện;
                        <input class="form-control" type="file" name="upload_file" id="">
                        <br>
                        Chọn ngày đăng:
                        <input class="form-control" value="<?php echo $row['Post_Date']; ?>" type="date" name="date" id="">
                        <br>
                        Nhập vào tên tác giả:
                        <input class="form-control" value="<?php echo $row['Author']; ?>" type="text" name="author" id="">
                        <br>
                        Nhập vào nội dung bài viết:
                        <textarea class="form-control" name="noidung" id=""  cols="30" rows="10"><?php echo $row['Description']; ?></textarea>
                        <script>
                            CKEDITOR.replace('noidung');
                        </script>
                        <br>
                        Nhập vào trạng thái;
                        <input class="form-control" value="<?php echo $row['Status']; ?>" type="text" name="status" id="">
                        <br>
                <?php
                    }
                }
                ?>
                <input type="submit" value="Chỉnh Sửa" name="update_quantritintuc" class="btn btn-primary">
            </form>
            <br>
        </div>
    </div>
</body>
<?php
if (isset($_POST["update_quantritintuc"])) {
    $news_id = $_POST["news_id"];
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
        if (file_exists($target_file)) {

            $img_name = str_replace("../upload/", "", $target_file);
            if ($img_name == "")
                $sql_update = "update tbl_news set Cate_ID='$cate_id',Title = N'$title',Description=N'$content',Post_Date='$date',Author=N'$author',Status=$status where News_ID = $news_id";
            else
                $sql_update = "update tbl_news set Cate_ID='$cate_id',Title = N'$title',Intro_Image='$img_name',Description=N'$content',Post_Date='$date',Author=N'$author',Status=$status where News_ID = $news_id";
            if (mysqli_query($conn, $sql_update)) {
                header("location:quantritintuc.php");
                echo " update record created successfully";
            } else {
                echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
            }
        } else {
            if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)) {
                $img_name = str_replace("../upload/", "", $target_file);
                $sql_update = "update tbl_news set Cate_ID='$cate_id',Title = N'$title',Intro_Image='$img_name',Description=N'$content',Post_Date='$date',Author=N'$author',Status=$status where News_ID = $news_id";
                if (mysqli_query($conn, $sql_update)) {
                    header("location:quantritintuc.php");
                    echo " update record created successfully";
                } else {
                    echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>

</html>