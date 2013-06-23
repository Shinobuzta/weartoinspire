<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Items extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Item';
	protected $_class = 'home';
	protected $_template = '/../templates/items.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		$this->_body['prodDetails'] = "";

		if(isset($_GET['id']) && !is_array($_GET['id']))
		{
			$item_Id=preg_replace("/[^0-9]/", "", $_GET['id']);
			$this->_body['prodDetails'] =front()->getDatabase()->getRow('products','prod_id',$item_Id);

			//front()->output($item_details);
		}
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
