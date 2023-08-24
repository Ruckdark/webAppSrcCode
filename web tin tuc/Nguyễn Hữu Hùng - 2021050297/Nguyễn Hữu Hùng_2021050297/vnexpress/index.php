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
    <div class="w3-row">
      <?php
      require("content/content_chinh.php");
      ?>
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