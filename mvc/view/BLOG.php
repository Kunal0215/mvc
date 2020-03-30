<!--
  * @file
  * This file is used for displaying single blog in detail
-->
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel='stylesheet' type='text/css' href='/view/css/SHOW.css'>
  <link rel='stylesheet' type='text/css' href='/view/css/MAIN.css'>
  <link rel='stylesheet' type='text/css' href='/view/css/FONT.css'>
  <link rel="stylesheet" href="/view/css/SHOW.css"> 

</head>
<body>
  <div class="row container mx-auto">
    <div class="leftcolumn">
      <div class='card'>
        <div class='inside'>
<?php
/**
 * To display the blog details
 */
class BlogView {
  /**
   * Data of blog is displayed by this
   * @param $row details fetched from database
   * @return [mixed]
   */
  function show($row) {
    echo "<h1>" . $row['title'] ."</h1><div class = 'image fit flush'>";
    echo "<b><img src = '/" . $row['image'] . "'></b></div><br><h5>" . $row['content'] .
      "</h5><br><p style = 'background-color:yellow;width: 39%;padding: 2px;'>
      created by : <u>" . $row['username'] . "</u> <br>created at : " . $row['created_at'] . "</p>" ;
       // Own content edit and delete options
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['username']) {
      echo "<button class='btn'><a href = /index.php/User/delete/". $row['id'] ."''>DELETE POST</button>";
      echo "<button class='btn'><a href = /index.php/User/edit/". $row['id'] ."''>EDIT POST</button>";
    }
    echo "</div>";
  }
}
?>
</div><br>
</body>
</html>
