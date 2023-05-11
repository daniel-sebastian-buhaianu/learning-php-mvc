<?php

class App {

	private $controller = 'Home';
	private $method     = 'index';

	public function __construct() {

		$this->load_controller();
	}

	private function split_url() {

		$url = $_GET['url'] ?? 'home';
		$url = strtolower( $url );
		$url = explode( '/', trim($url, '/'));

		return $url;
	}

	private function load_controller() {

		$url      = $this->split_url();
		$filename = "../app/controllers/{$url[0]}.class.php";

		if ( file_exists( $filename ) ) {

			require $filename;

			$this->controller = ucfirst( $url[0] );

		} else {

			$filename = '../app/controllers/page-not-found.class.php';

			require $filename;

			$this->controller = 'Page_Not_Found';
		}

		$controller = new $this->controller();

		call_user_func_array( array( $controller, $this->method ), $url );
	}
}
