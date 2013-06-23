<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Logout extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		if(isset($_GET['q']) && $_GET['q'] == 'true') {
			unset($_SESSION['user']);
			unset($_SESSION['fb_token']);
			header('location: ../');
			exit;
		}
	}
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
