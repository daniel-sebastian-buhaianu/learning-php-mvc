<?php
/**
 * App Class
 */
class App {
	/**
	 * Short description
	 *
	 * @var $controller Controller variable.
	 */
	private $controller = 'Home';

	/**
	 * Short description
	 *
	 * @var $method Method variable.
	 */
	private $method = 'index';

	/**
	 * Constructor func
	 */
	public function __construct() {

		$this->load_controller();
	}

	/**
	 * Split url func
	 */
	private function split_url() {

		$url = $_GET['url'] ?? 'home';
		$url = explode( '/', $url );

		return $url;
	}

	/**
	 * Load controller func
	 */
	private function load_controller() {

		$url      = $this->split_url();
		$filename = "../app/controllers/class-{$url[0]}.php";

		if ( file_exists( $filename ) ) {

			require $filename;

			$this->controller = ucfirst( $url[0] );

		} else {

			$filename = '../app/controllers/class-page-not-found.php';

			require $filename;

			$this->controller = 'Page_Not_Found';
		}

		$controller = new $this->controller();

		call_user_func_array( array( $controller, $this->method ), array() );
	}
}
