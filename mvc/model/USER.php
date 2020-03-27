<!--
  * @file
  * This file contains database files for all user actions
-->

<?php
/**
 * Implements logged in user operations namely add, delete, udpate.
 */
class UserModel {
  /**
   * Feed data to blog table for new blog in database
   * @return [mixed]
   */
  function add() {
    // To get data from post array and set in local variables
    $title = $_POST['title'];
    $image = $_POST['image'];
    $content = $_POST['contents'];
    $user = $_SESSION['user_id'];
    // Image path to be extracted of uploaded file
    $file_name = basename($_FILES["image"]["name"]);
    $target_file = "img/" . $file_name;
    // Move image to the folder and store path in database
    move_uploaded_file($file_name, $target_file);
    // Sql querries for data insertion in data
    $con = mysqli_connect("localhost", "root", "root", "project");
    $sql = "INSERT INTO blogs (title, image, content, username)
            VALUES ('$title', '$target_file', '$content', '$user')";
    $con -> query($sql);
    // Redirect to user homepage
    header("location: /INDEX.php/User/Home");
    }
    /**
     * To delete a particular blog
     * @param  $blog_id Blog id which is to be deleted
     * @return [mixed]
     */
    function delete($blog_id) {
      // Sql querries
			$con = mysqli_connect("localhost", "root", "root", "project");
			$sql = "DELETE FROM `blogs` WHERE id = '$blog_id'";
			$con -> query($sql);
      // Redirect to user homepage
			header("location: /INDEX.php/User/Home");
		}
    /**
     * To fetch current data of blog to be edited
     * @param $blog_id blog id that is being edited
     * @return $result previous data of blog to be rendered
     */
    function edit_show($blog_id) {
      // Sql querries
  		$con = mysqli_connect("localhost", "root", "root", "project");
  		$sql = "SELECT * FROM blogs WHERE id = '$blog_id'";
  		$result = $con -> query($sql);
      // Return data to edit controller for displaying in edit form
  		return $result;
  	}
    /**
     * Update new data to the blog being edited
     * @param $blog_id The blog which is being edited
     * @return [mixed]
     */
    function edit($blog_id) {
      // To get data from post array and set in local variables
			$title = $_POST['title'];
			$user = $_SESSION['user_id'];
      $content = $_POST['contents'];
			$img = $_FILES['image']['name'];
			$img_locate = "img/" . $img;
      // Move image to the path located and store path in database
			move_uploaded_file($tmp_img,$img_locate);
      // Sql querries
			$con = mysqli_connect("localhost", "root", "root", "project");
			$sql = "UPDATE blogs SET title = '$title', image = '$img_locate', content = '$content' WHERE id =
				'$blog_id' and username = '$user'";
			$con -> query($sql);
      // Redirect to user homepage
			header("location: /INDEX.php/User/Home");
		}
    /**
     * To fetch blogs of a particular user that is logged in
     * @param $user username of the user whose blogs are to be displayed
     * @return [mixed]
     */
    function home($user) {
      // Sql querries
			$con = mysqli_connect("localhost", "root", "root", "project");
			$sql = "SELECT * FROM blogs WHERE username = '$user' order by created_at DESC";
			$result = $con->query($sql);
      // Passing fetched data to view for displaying output
			include('view/HOME.php');
			$object = new HomeView;
			$object -> show($result);
			}
}
?>
