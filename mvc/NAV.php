<!--
  * @file
  * This file contains navigation bar for whole site
-->

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="/view/css/NAVCSS.css">
</head>
<body>
  <div class="topnav">
    <?php
      echo "<a style='float:left' href='/'>HOME</a>";
    if(isset($_SESSION['user_id'])) {
      echo "<a style='float:right' href='/index.php/Login/Logout'>LOGOUT</a>";
      echo "<a style='float:left' href='/index.php/User/Home'>My Blogs</a>";
      echo "<a style='float:left' href = '/index.php/User/Add'>ADD POST</a></p>";
      echo "<h3 style='color:white;padding-right:20px;float:right;font-size: 17px;'>Hello " . $_SESSION['user_id'] . "!</h3>";
    }
    else {
      echo "<a style='float:right' href='/index.php/Login/Login'>LOGIN</a>";
    }
    ?>
  </div>
</body>
</html>
