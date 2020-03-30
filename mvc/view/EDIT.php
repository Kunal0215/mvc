<!--
  * @file
  * This file is used for displaying blog edit page
-->
<!DOCTYPE html>
<head>

  <link rel="stylesheet" href="/view/css/DEFAULT.css">
  <link rel="stylesheet" href="/view/css/LAYOUT.css">
  <link rel="stylesheet" href="/view/css/NAVCSS.css">

  <title>Add content to blogs</title>
</head>
<body>
   <h2 style="text-align: center;">Edit Post</h2>
<?php
/**
 * Display form with previous data of a current blog
 */
class EditView {
  /**
   * To displat the data in form from edit model
   * @param $result Fetched data from the database
   * @return [mixed]
   */
  function edit($row) {
    echo "<form action = '/index.php/User/edit_feed/" . $row['id'] . "' method ='POST' enctype = 'multipart/form-data'>";
    $words = explode("/", $row['image']);
    echo "<div><label for = 'title'>Title</label>";
    echo "<input type = 'text' placeholder = 'Blog title here' name = 'title' value = '" . $row['title']
             . "'></input>";
    echo "</div><div><label for = 'image'>Image</label>";
    echo "<input type = 'file' name = 'image'></input>" . $words[1];
    echo "</div><div><label for = 'contents'>Content</label>";
    echo "<textarea placeholder = 'Please add the blog content here' name = 'contents' cols = 20 rows = 20>" . $row['content'] . "</textarea></div>";
    echo "<p><input type = 'submit' name = 'submit' value = 'Edit Post' /></p>";
  }
}
?>
</form>
</body>
</html>
