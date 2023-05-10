<?php

class Home extends Controller {

	public function index( $a = '', $b = '', $c = '' ) {

		$model 		= new Model;
		
		$data 		= array( 
					'id'	=> 1,
					'name'	=> 'Daniel' 
		);
		$data_not 	= array(
					'name'	=> 'Sabina',
					'id' 	=> 3 
		);
		
		$result 	= $model->where( $data, $data_not );

		show( $result );

		$this->view( 'home' );
	}
}