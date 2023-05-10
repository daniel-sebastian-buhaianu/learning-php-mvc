<?php
/**
 * Products Page Controller
 */
class Products extends Controller {
	/**
	 * Index func
	 */
	public function index() {

		echo 'Products Controller';

		$this->view( 'products/products' );
	}
}
