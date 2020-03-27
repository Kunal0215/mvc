<!--
  * @file
  * This file contains controller for all user specific functions
-->

<?php
/**
 * Implements logged in user operations namely add, delete, edit, user homepage.
 */
class UserControl {
  /**
   * For displaying adding a new blog page
   * @return [mixed]
   */
  function add() {
		include('view/ADD.php');
	}
  /**
   * New post data to model
   * @return [mixed]
   */
  function add_feed() {
		include('model/USER.php');
		$object = new UserModel;
		$object -> add();
	}
  /**
   * User specific homepage
   * @return [mixed]
   */
  function home() {
		$user = $_SESSION['user_id'];
		include('model/USER.php');
		$object = new UserModel;
		$object -> home($user);
	}
  /**
   * To delete a particular blog
   * @param $blog_id blog that is to be deleted
   * @return [mixed]
   */
  function delete ($blog_id) {
		include('model/USER.php');
		$object = new userModel;
		$object -> delete($blog_id);
	}
  /**
   * Edit a perticular blog and fetch previous data to show in form
   * @param $blog_id blog that is to be edited
   * @return [mixed]
   */
  function edit ($blog_id) {
		include('model/USER.php');
		$object = new UserModel;
		$result = $object -> edit_show ($blog_id);
		$row = $result -> fetch_assoc();
    // Check if user is editing own blog otherwise restrict edit
		if ($row['username'] == $_SESSION['user_id']) {
      // Previous data to form through calling editview class
			include('view/EDIT.php');
			$object = new EditView;
			$object -> edit($result);
		}
		else {
			include('view/NOACCESS.php');
		}
	}
  /**
   * To update the data in database as per new changes in a blog
   * @param $blog_id blog that is edited
   * @return [mixed]
   */
  function edit_feed ($blog_id) {
		include('model/USER.php');
		$object = new UserModel;
		$object -> edit ($blog_id);
  }
}
?>
