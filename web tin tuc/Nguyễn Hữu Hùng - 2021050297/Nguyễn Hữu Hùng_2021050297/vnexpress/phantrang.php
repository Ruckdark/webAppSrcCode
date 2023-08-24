<?php
require "config/db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>VnExpress - Báo tiếng việt nhiều người xem nhất</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./css/style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!--banner-->
    <div class="w3-container " style="padding: 0px;">
        <div>
            <?php
            require("blocks/header.php");
            ?>
        </div>
        <div class="content">
            <div class="w3-row" style="background-color: #e5e5e5;">
                <div class="w3-row">
                    <?php
                    if (isset($_GET["id"])) {
                        $cate_id = $_GET["id"];
                        $sql = "select count(News_ID) as total from tbl_news WHERE `Cate_ID` = $cate_id";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total_records = $row['total'];
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 5;
                        $total_page = ceil($total_records / $limit);
                        // Giới hạn current_page trong khoảng 1 đến total_page
                        if ($current_page > $total_page) {
                            $current_page = $total_page;
                        } else if ($current_page < 1) {
                            $current_page = 1;
                        }
                        // Tìm Start
                        $start = ($current_page - 1) * $limit;
                        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                        $result = mysqli_query($conn, "SELECT * FROM tbl_news WHERE `Cate_ID` = $cate_id LIMIT $start, $limit");
                        // PHẦN HIỂN THỊ TIN TỨC
                        // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
                        // dổ ở dòng này
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                                <div class="w3-row" style="border-top: 1px solid black">
                                    <div class="w3-col m4 tt" style="padding-top: 5px;">
                                        <a href="read.php?news_id= <?php echo $row["News_ID"]; ?>"><img width="100%" src="./upload/<?php echo $row["Intro_Image"]; ?>" alt=''> </a>
                                    </div>
                                    <a style="font-size:18px" href="read.php?news_id= <?php echo $row["News_ID"]; ?>"><?php echo $row["Title"]; ?></a>
                                    <div class="w3-col m8 tt">
                                        <?php
                                        $string = strip_tags($row["Description"]);
                                        if (strlen($string) > 500) {
                                            $stringCut = substr($string, 0, 500);
                                            $endPoint = strrpos($stringCut, ' ');
                                            //if the string doesn't contain any space then it will cut without word basis.
                                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                            $string .= '... <a href="read.php?news_id=' . $row["News_ID"] . '"  style =""> More</a>';
                                        }
                                        ?>
                                        <a style="font-size:14px;float:bottom ;color:gray " href="read.php?news_id= <?php echo $row["News_ID"]; ?>"><?php echo $string ?></a>
                                    </div>
                                </div>
                    <?php
                            }
                            if ($current_page > 1 && $total_page > 1) {
                                echo '<a class="btn btn-danger" href="phantrang.php?id=' . $cate_id . '&page=' . ($current_page - 1) . '">Prev</a> | ';
                            }

                            // Lặp khoảng giữa
                            for ($i = 1; $i <= $total_page; $i++) {
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page) {
                                    echo '<span class="btn btn-secondary">' . $i . '</span> | ';
                                } else {
                                    echo '<a class="btn btn-info" href="phantrang.php?id=' . $cate_id . '&page=' . $i . '">' . $i . '</a> | ';
                                }
                            }

                            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                            if ($current_page < $total_page && $total_page > 1) {
                                echo '<a class="btn btn-danger" href="phantrang.php?id=' . $cate_id . '&page=' . ($current_page + 1) . '">Next</a> | ';
                            }
                        }
                    }
                    ?>
                </div>
            </div>

            <!--footer-->
            <div class="w3-row">
                <?php
                require("blocks/footer.php");
                ?>
            </div>
        </div>
    </div>
    </div>
    <!--menu-->
    <div id="navbar" class="w3-container " style="border: 1px solid #e5e5e5;padding: 0 30px 0 0px;margin: 50px 0px 0px 0px;width: 100%;">
        <div class="w3-bar w3-hide-small" style="font-size:12px;">
            <a href="index.php" class="w3-bar-item button-not-hover" style=" padding: 12px 16px;"><i class="fa fa-home"></i></a>
            <div class="button-not-hover">
                <?php
                require("blocks/menu.php");
                ?>
            </div>
        </div>
    </div>
</body>

</html>