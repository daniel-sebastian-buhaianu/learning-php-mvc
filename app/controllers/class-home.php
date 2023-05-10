<?php
/**
 * Home Page Controller
 */
class Home extends Controller {

	use Model;

	/**
	 * Index func.
	 */
	public function index() {
		$this->view( 'home' );
	}
}
