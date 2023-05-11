<?php

class Home extends Controller {

	use Model;

	public function index($a = '', $b = '', $c = '', $d ='') {

		show($a);
		show($b);
		show($c);
		show($d);

		$this->view( 'home' );
	}
}
