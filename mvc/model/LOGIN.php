<!--
  * @file
  * This file contains database files for login
-->

<?php
/**
 * To fetch user data
 * @return $row data for further validation
 */
	class LoginModel {
		/**
		 * To compare login details of user and that of login database
		 */
		function login() {
			$user=$_POST['uname'];
			$pass=$_POST['psw'];
			// Sql querries
			$con = mysqli_connect("localhost", "root", "root", "project");
			$sql = "SELECT * FROM login WHERE username='$user' AND password='$pass'";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			return $row;
			}
		}

?>
