<!--
  * @file
  * This file contains The basic structure used to call amd implement mvc architecture.
-->

<!-- Bootstrap CDN -->
<link href = "https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha383-Vkoo8x3CGsO3+Hhxv8T/Q4PaXtkKtu6ug4TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin = "anonymous">

<?php
// Set default control and function to home
$control = 'Home';
$function = 'home';
// Fetch URL and explode to get parameters from URL
$parameters = explode("/", $_SERVER['REQUEST_URI']);
// Check control and function parameters and if exist replace the default values
if (isset($parameters[2]) && !empty($parameters[2]) && isset($parameters[3]) && !empty($parameters[3])) {
		$control = $parameters[2];
		$function = $parameters[3];
	}
	// If blog id parameter is used check and set
	if (isset($parameters[4]) && !empty($parameters[4])) {
		$blog_id = $parameters[4];
	}
	// Start session
	session_start();
	// Include navigation bar in each page
	include ('NAV.php');
	echo "<br><br>";
	// Include controller file
// if (file_exists('control/' . $control . '.php') {
		include('control/' . $control . '.php');
		// Creating object from the control passed in the parameter.
		$class = $control . 'Control';
	  $object = new $class;
		// }
	// else {
	// 	include ('view/404.php');
	// }
	// Called the function of controller based on existance of function
	if (method_exists($object, $function)) {
		if (isset($blog_id)) {
			$object -> $function ($blog_id);
		}
		else {
			$object -> $function();
		}
	}
	// Error display if file or method not found
	else {
		include ('view/404.php');
	}
?>
