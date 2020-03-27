<!--
  * @file
  * This file contains database files for homepage
-->

<?php
/**
 * To display all blogs homepage
 */
	class HomeModel {
		/**
		 * Fetch data of all blogs to display
		 */
		function home() {
			// Sql querries
			$con = mysqli_connect("localhost", "root", "root", "project");
			$sql = "SELECT * FROM blogs order by created_at DESC";
			$result = $con->query($sql);
			// Pass sql result to view for output display
			include('view/HOME.php');
			$object = new HomeView;
			$object->show($result);
			}
		}
?>