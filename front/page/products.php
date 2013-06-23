<?php //-->
/*
 * This file is part a custom application package.
 */

/**
 * Default logic to output a page
 */
class Front_Page_Products extends Front_Page {
	/* Constants
	-------------------------------*/
	/* Public Properties
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	protected $_title = 'Products';
	protected $_class = 'home';
	protected $_template = '/../templates/products.phtml';
	
	/* Private Properties
	-------------------------------*/
	/* Magic
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function render() {
		$prods=front()->getDatabase()->getRows('products');

		$this->_body['prodall'] = "";
		$this->_body['proddresses'] = "";
		$this->_body['prodshoes'] = "";
		$this->_body['prodbags'] = "";
		$this->_body['prodacc'] = "";
		$this->_body['activeCat'] = "";

		for ($i=0; $i < count($prods); $i++) {
			$nextProduct = '
				<li class="span3">
					<div class="thumbnail">
						<img width="100%" src="'.$prods[$i]['prod_image'].'">
						<div class="caption">
						<h4>'.$prods[$i]['prod_name'].'</h4>
						<p>P '.$prods[$i]['prod_price'].'.00</p>
						<p><a href="#" class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i>Add to Cart</a> 
						<a href="items?id='.$prods[$i]['prod_id'].'" class="btn">View</a></p>
						</div>
					</div>
				</li>
			';
			$this->_body['prod'.$prods[$i]['prod_category']] .= $nextProduct;
			$this->_body['prodall'] .= $nextProduct;
		}

		if(isset($_GET['cat']))
		{
			if ($_GET['cat']=='dresses')
			{
				$this->_body['activeCat'] = "tab_dresses";		
			}
			else if ($_GET['cat']=='shoes')
			{
				$this->_body['activeCat'] = "tab_shoes";		
			}
			else if ($_GET['cat']=='bags')
			{	
				$this->_body['activeCat'] = "tab_bags";		
			}
			else
				$this->_body['activeCat'] = "tab_all";	
		}
		else
		{
			$this->_body['activeCat'] = "tab_all";
		}

		$this->_body['activeCat'] ='
		<script type="text/javascript">
		document.getElementById("nav_tab_all").className ="";
		document.getElementById("tab_all").className ="tab-pane";
		document.getElementById("nav_'.$this->_body['activeCat'].'").className ="active";
		document.getElementById("'.$this->_body['activeCat'].'").className ="tab-pane active";
		</script>
		';

		return $this->_page();
	}
	
	/* Protected Methods
	-------------------------------*/
	/* Private Methods
	-------------------------------*/
}
