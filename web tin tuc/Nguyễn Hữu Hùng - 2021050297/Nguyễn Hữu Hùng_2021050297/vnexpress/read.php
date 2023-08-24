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
    <link rel="stylesheet" href="css/style1.css">
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
                <div class="w3-col m8 tt">
                    <?php
                    if (isset($_GET["news_id"])) {
                        $news_id = $_GET["news_id"];
                        $sql = "select * from tbl_news where News_ID = $news_id";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $row = mysqli_fetch_assoc($result);

                    ?>
                            <b>
                                <p style="font-size:24px"><?php echo $row["Title"]; ?></p>
                            </b>
                            <p style="font-size:16px"><?php echo $row["Description"]; ?></p>
                            <p href="https://www.wikipedia.org"><i class="material-icons" style="font-size:25px">mail</i>Mời độc giả gửi bài, câu hỏi <u><a href="">tại đây</a></u> hoặc về <u><a href="">phapluat@vnexpress.net</a></u></p>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="w3-col m4 tt">
                    <div class="w3-row">
                        <a style="font-size:22px" href="#">Xem nhiều</a>
                        <img style="width:100%" src="img/121.png">
                        <a style="font-size:16px" href="#">Tổng giám đốc Công ty Tín Nghĩa bị bắt</a>
                        <hr>
                        <a style="font-size:16px" href="#">Cựu bí thư, cựu chủ tịch Đồng Nai bị bắt trong vụ án AIC</a>
                        <hr>
                        <a style="font-size:16px" href="#">Căn cước công dân điện tử bắt đầu được sử dụng</a>
                        <hr>
                        <a style="font-size:16px" href="#">Tài xế kiện vì bị cảnh sát mặc thường phục khám xe máy </a>
                    </div>
                    <div style="border:3px solid #e5e5e5">
                    </div>
                </div>
                <div class="w3-row">
                    <p style="font-size:22px;text-align: center;"><?php echo $row["Author"]; ?></p>
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