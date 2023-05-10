<?php

class Model {

	use Database;

	protected $table 	= 'users';
	protected $limit 	= 10;
	protected $offset 	= 0;

	public function where( $data, $data_not = [] ) {

		$keys 		= array_keys( $data );
		$keysNot 	= array_keys( $dataNot );

		$query 		= 'select * from $this->table where ';

		foreach( $keys as $key ) {
			
			$query .= $key . ' = :' . $key . ' && ';
		}

		foreach( $keysNot as $key ) {

			$query .= $key . ' != :' . $key . ' && ';
		}

		$query 	= trim( $query, ' && ' );
		$query .= ' limit $this->limit offset $this->offset';

		$data 	= array_merge( $data, $dataNot );

		$result = $this->query( $query, $data );

		return $result;
	}

	public function first( $data, $data_not = [] ) {

	}

	public function insert( $data ) {

	}

	public function update( $id, $data, $id_column = 'id' ) {

	}

	public function delete( $id, $id_column = 'id' ) {

	}

}