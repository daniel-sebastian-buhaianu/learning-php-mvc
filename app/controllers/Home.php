<?php

class Home extends Controller {

	public function index( $a = '', $b = '', $c = '' ) {

		$model 		= new Model;
		
		$arr = array(
			'name' => 'Goofy',
			'age'  => 2,
		);

		// $model->insert( $arr );

		$model->update( $arr, 'id', 3 );

		$this->view( 'home' );
	}
}