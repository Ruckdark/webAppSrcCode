<div class='content' style='border-top: 1px solid black'>
  <div class='w3-row' style='background-color: #e5e5e5;'>
    <div class='w3-col m8 tt'>
      <!--Nếu nhấn nút thì tìm kiếm tin tức có Title -->
      <?php
      $sql = "";
      if (isset($_POST["btn_search"])) {
        $search = $_POST["search"];
        $sql_select = "select * from tbl_news where Title like '%$search%'";
        $result = mysqli_query($conn, $sql_select);
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
        }
      } else {
        ?>
        <!--Main Content -->
        <?php
        $sql_news = "select * from tbl_news Limit 1";
        $result = mysqli_query($conn, $sql_news);
        if (mysqli_num_rows($result) > 0) {
        ?>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <div class='w3-row'>
              <div class='w3-col m8 tt'>
                <a href='read.php?news_id= <?php echo $row["News_ID"]; ?>'><img width='100%' src="./upload/<?php echo $row["Intro_Image"]; ?>" alt=''></a>
              </div>
              <div class='w3-col m4 tt'>
                <a style='font-size:20px;text-align: center ; font-weight: bold;' href='read.php?news_id= <?php echo $row["News_ID"]; ?>'><?php echo $row["Title"]; ?></a>
                <?php
                $string = strip_tags($row["Description"]);
                if (strlen($string) > 300) {
                  $stringCut = substr($string, 0, 300);
                  $endPoint = strrpos($stringCut, ' ');
                  //if the string doesn't contain any space then it will cut without word basis.
                  $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                  $string .= '... <a href="read.php?news_id=' . $row["News_ID"] . '"  style =""> More</a>';
                }
                ?>
                <p style='font-size:14px;color:gray'><?php echo $string ?></p>
              </div>
            </div>

        <?php
          }
        } else {
          echo "không có dữ liệu trong bảng";
        }
        ?>


        <!--3 Content duoi-->
        <?php
        $sql_news = "select * from tbl_news Limit 3 OFFSET 1";
        $result = mysqli_query($conn, $sql_news);
        if (mysqli_num_rows($result) > 0) {
        ?>
          <div class="w3-row">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <div class="w3-col m4 tt" style="border-top: 1px solid black">
                <a style='font-size:13px;text-align: center ; font-weight: bold;' href='read.php?news_id= <?php echo $row["News_ID"]; ?>'><?php echo $row["Title"]; ?></a>
                <a href='read.php?news_id= <?php echo $row["News_ID"]; ?>'><img width='200px' height="155px" src="./upload/<?php echo $row["Intro_Image"]; ?>" alt=''></a>
                <?php
                $string = strip_tags($row["Description"]);
                if (strlen($string) > 300) {
                  $stringCut = substr($string, 0, 300);
                  $endPoint = strrpos($stringCut, ' ');
                  //if the string doesn't contain any space then it will cut without word basis.
                  $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                  $string .= '... <a href="read.php?news_id=' . $row["News_ID"] . '" style =""> More</a>';
                }
                ?>
                <p style='font-size:14px;color:gray'><?php echo $string ?></p>
              </div>
          <?php
            }
          } else {
            echo "không có dữ liệu trong bảng";
          }
          ?>
          </div>

          <!--3 Content duoi-->
          <div class="w3-row">
            <?php
            $sql_news = "select * from tbl_news Limit 3 OFFSET 3";
            $result = mysqli_query($conn, $sql_news);
            if (mysqli_num_rows($result) > 0) {
            ?>
              <div class="w3-row">
                <?php
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
                      if (strlen($string) > 300) {
                        $stringCut = substr($string, 0, 300);
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
              } else {
                echo "không có dữ liệu trong bảng";
              }
              ?>
              </div>
          </div>
    </div>

    <!--Content Trai-->
    <div class="w3-col m4 tt">
      <?php
        $sql_news_1 = "select * from tbl_news Limit 8 OFFSET 6";
        $result_1 = mysqli_query($conn, $sql_news_1);
        if (mysqli_num_rows($result_1) > 0) {
      ?>
        <?php
          while ($row = mysqli_fetch_assoc($result_1)) {
        ?>

          <div class="w3-col m4 " style="padding-top: 5px;">
            <a href="read.php?news_id= <?php echo $row["News_ID"]; ?>"><img width="100%" src="./upload/<?php echo $row["Intro_Image"]; ?>" alt=''></a>
          </div>
          <div class="w3-col m8 " style="padding-left: 5px;padding-top: 0px;">
            <a style="font-size:18px" href="read.php?news_id= <?php echo $row["News_ID"]; ?>"><?php echo $row["Title"]; ?></a>
          </div>
          <div class="w3-row">
            <?php
            $string = strip_tags($row["Description"]);
            if (strlen($string) > 100) {
              $stringCut = substr($string, 0, 100);
              $endPoint = strrpos($stringCut, ' ');
              //if the string doesn't contain any space then it will cut without word basis.
              $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
              $string .= '... <a href="read.php?news_id=' . $row["News_ID"] . '"  style =""> More</a>';
            }
            ?>
            <a style="font-size:14px;float:bottom;color:gray" href="#"><?php echo $string ?></a>
          </div>
          <hr>

    <?php
          }
        } else {
          echo "không có dữ liệu trong bảng";
        }
      }
    ?>
    </div>
  </div>
  <div>
    <?php
    require("blocks/footer.php");
    ?>
  </div>
</div>
</div>