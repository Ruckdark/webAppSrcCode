<!DOCTYPE html>
<html>

<head>
    <title>VnExpress - Báo tiếng việt nhiều người xem nhất</title>
    <!--Sử dụng bộ thư viện w3css-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--thêm bộ thư viện icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--cách khai báo css thứ 2-->
    <!--thêm bộ thư viện icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="../css/style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php
    @ob_start();
    session_start();
    ?>
    <!--banner-->
    <div class="w3-container " style="padding: 0px;">
        <div class="w3-row" style="height: 35px;">
            <!--logo-->
            <div class="w3-col m5">
                <div class="w3-col m8">
                    <a href="index.php"><img src="img/logo.png" alt="" style=" width:165px;height:35px;margin:10px 0px 0px 240px"></a>
                </div>
                <div class="w3-col m4 w3-hide-small ">
                    <span id="date" class="time-now">
                        <script>
                            var today = new Date();
                            var date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
                            document.getElementById("date").innerHTML = date;
                        </script>
                    </span>
                </div>
            </div>
            <div class="w3-col m7 w3-hide-small">
                <div class="w3-row">
                    <div class="w3-col m5">
                        <a class="btn" href="#" style="margin: 10px 0px 0px 75px;">
                            <i class="fa fa-clock-o" style="font-size:18px;margin:7px 0px 7px 0px"></i>
                            Mới Nhất
                        </a>
                        <a class="btn" href="index.php" style="margin: 10px 0px 0px 7px;">
                            <i class="fa fa-clock-o" style="font-size:18px;margin:7px 0px 7px 0px"></i>
                            International
                        </a>
                    </div>
                    <span class="time-now">
                    </span>
                    <div class="w3-col m6">
                        <div class="w3-row">
                            <form action="index.php" method="post" enctype="multipart/form-data">
                                <div class="w3-col m6 ">
                                    <input style="height: 32px;line-height: 32px;border-radius: 16px;border: 1px solid #e5e5e5;padding: 0 30px 0 14px;margin: 10px 0px 0px 0px;width: 160px;" type="text" name="search" placeholder="Tìm kiếm" autocomplete="off">
                                    <button type="submit" name="btn_search" style="border-radius: 16px;"><i class="fa fa-search"></i></button>
                                </div>
                            </form>

                            <div class="w3-col m6" style="margin: 10px 0px 0px 0px;">
                                <?php
                                if (!empty($_SESSION["ten_dangnhap"])) {
                                ?>
                                    <p style="font-size:12px;margin:7px 0px 7px 0px">Xin Chào : <?php echo $_SESSION["ten_dangnhap"]; ?></p>
                                <?php
                                } else {
                                ?>
                                    <a href="user/login_user.php"><i class="fa fa-home" style="font-size:22px;margin:7px 0px 7px 0px"></i> Đăng Nhập</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.getElementById("navbar").style.margin = "0px 0px 0px 0px";
            } else {
                document.getElementById("navbar").style.margin = "50px 0px 0px 0px";
            }
        }
    </script>
</body>

</html>