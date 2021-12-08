<?php
	// File to logout a user
	/*
	 * This session destroy code is used from "Example 1" available on PHP.net
	 * URL: https://www.php.net/manual/en/function.session-destroy.php
	 * Authors: PHP.net contributors
	 * Date: (16 Oct 2021)
	 */

	// Initialize the session.
	session_start();

	// Unset all of the session variables.
	$_SESSION = array();

	// If it's desired to kill the session, also delete the session cookie.
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}

	//Destroy the session.
	session_destroy();


	// Redirect the user to the homepage.
	header("Location: ../index.php");
	die();
?>