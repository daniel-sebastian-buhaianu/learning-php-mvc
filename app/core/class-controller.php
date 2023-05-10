<?php
/**
 * Controller class
 */
class Controller {
	/**
	 * View func
	 *
	 * @param string $name Parameter name.
	 */
	public function view( $name ) {

		$filename = '../app/views/' . $name . '.view.php';

		if ( file_exists( $filename ) ) {
			require $filename;

		} else {

			$filename = '../app/views/page-not-found.view.php';

			require $filename;
		}
	}
}
