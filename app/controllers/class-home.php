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

		$user = new User();

		$arr['name'] = 'Boom';
		$arr['age']  = 60;

		$result = $user->insert( $arr );

		$this->view( 'home' );
	}
}
