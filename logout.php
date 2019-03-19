<?php

	session_start();
	unset($_SESSION['user_logged']);
	unset($_SESSION['usernamelogin']);
	header ("location: index.php");
