<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Test1 extends Front_Page {
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
		/*front()->getDatabase()->query('
			CREATE TABLE IF NOT EXISTS `user` (
  `user_id` bigint(20) unsigned NOT NULL,
  `user_admin` smallint(1) unsigned DEFAULT 0 NULL,
  `user_first` varchar(255) DEFAULT NULL,
  `user_last` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NULL,
  `user_image` varchar(255)  NULL,
  `user_gender` varchar(255)  NULL,
  `user_birthday` varchar(255)  NULL,
  `user_active` smallint(1) unsigned NULL DEFAULT 1,
  `user_lastlog` datetime  NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `user_active` (`user_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
		');
		front()->getDatabase()->query('
			CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) unsigned AUTO_INCREMENT,
  `cat_name` varchar(45) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
		');
		front()->getDatabase()->query('
			CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int(11) unsigned AUTO_INCREMENT,
  `prod_name` varchar(45) NOT NULL,
  `prod_price` int NOT NULL DEFAULT 0,
  `prod_desc` text NOT NULL,
  `prod_code` varchar(45) NOT NULL,
  `prod_stock` int NOT NULL,
  `prod_image` varchar(45) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
		');
front()->getDatabase()->query('
			CREATE TABLE IF NOT EXISTS `images` (
  `img_id` int(11) unsigned AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `img_loc` varchar(255) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
		');*/
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
