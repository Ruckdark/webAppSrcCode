<?php
  $sql_news = "select * from tbl_category ";
  $result = mysqli_query($conn, $sql_news);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<a href='phantrang.php?id=".$row["Cate_ID"]."' class='button-1'>" . $row["Cate_Name"] . "</a>";
    }
  } else {
    echo "không có dữ liệu trong bảng";
  }
?>