<!--
  * @file
  * This file is used for displaying home page
-->
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel='stylesheet' type='text/css' href='/view/css/SHOW.css'>
</head>
<body>
  <div class = "row container mx-auto"><div class = "leftcolumn">
<?php
/**
 * For Homepage display
 */
class HomeView {
  /**
   * Show the results in rendered form
   * @param $result resuts fetched from database of all blogs
   * @return [mixed]
   */
  function show($result) {
    while ($row = $result->fetch_assoc()) {
      $words = explode(" ", $row['content']);
      echo "<div class = 'card'><div class = 'inside'><h2><a href = /index.php/Blog/Blog/" . $row['id'] . ">" . $row['title'] ."</a></h2><h5>";
      if (isset($words[5])) {
        for ($i = 0; $i < 5; $i++) {
          echo  " " . $words[$i] ;
        }
        echo "...<a href = /index.php/Blog/Blog/" . $row['id'] . ">Read more</a></h5>";
      }
      else {
        print_r($row['content']);
      }
      echo "<p style = 'font-size:12px'>created by : <u>" . $row['username'] . "</u> --- created at : " . $row['created_at'] . "</p></div>" ;
      echo "</div><br>";
    }
  }
}
?>
</body>
</html>
