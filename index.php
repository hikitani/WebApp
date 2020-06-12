<?php require 'Model/db.php' ?> 

<?php 
	// Шапка сайта
	if (empty($_SESSION['logged_user'])) {
		include("View/index.html");
	} else {		
		header('Location: /after_registration.php');
	}
?>