<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Index extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Wear To Inspire - Home';
	protected $_class = 'home';
	protected $_template = '/../templates/index.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
	$this->_body['products'] = '';
	for ($i=1; $i <= 15; $i++) { 
		$this->_body['products'] .='
			<li class="span3">
                <div class="thumbnail">
                <img width="100%" src="/img/9thEdition/'.$i.'.jpg">
                  <div class="caption">
                    <h4>Thumbnail label</h4>
                    <p>P 100.00</p>
                    <p><a href="#" class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i>Add to Cart</a> <a href="#" class="btn">View</a></p>
                  </div>
                </div>
              </li>';
	}
		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
