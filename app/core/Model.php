<?php

trait Model {

	use Database;

	protected $table 	= 'users';

	protected $limit 	= 10;
	protected $offset 	= 0;

	public function where( $data, $data_not = [] ) {

		$keys 		= array_keys( $data );
		$keys_not 	= array_keys( $data_not );

		$query 		= "select * from {$this->table} where ";

		foreach( $keys as $key ) {
			
			$query .= "{$key} = :{$key} && ";
		}

		foreach( $keys_not as $key ) {

			$query .= "{$key} != :{$key} && ";
		}

		$query 	= trim( $query, ' && ' );
		$query .= " limit {$this->limit} offset {$this->offset}";

		$data 	= array_merge( $data, $data_not );

		return $this->query( $query, $data );
	}

	public function first( $data, $data_not = [] ) {

		$keys 		= array_keys( $data );
		$keys_not 	= array_keys( $data_not );

		$query 		= "select * from {$this->table} where ";

		foreach( $keys as $key ) {
			
			$query .= "{$key} = :{$key} && ";
		}

		foreach( $keys_not as $key ) {

			$query .= "{$key} != :{$key} && ";
		}

		$query 	= trim( $query, ' && ' );
		$query .= " limit {$this->limit} offset {$this->offset}";

		$data 	= array_merge( $data, $data_not );

		$result = $this->query( $query, $data );

		if ( $result ) {

			return $result[ 0 ];
		}

		return false;
	}

	public function insert( $data ) {

		$keys  = array_keys( $data );

		$query = "insert into {$this->table} (" . implode( ', ', $keys ) . ') values (:' . implode( ', :', $keys ) . ')';

		$this->query( $query, $data );

		return false;

	}

	public function update( $data, $column_name, $column_value ) {

		$keys 	= array_keys( $data );

		$query 	= "update {$this->table} set ";
		
		foreach ( $keys as $key ) {
			
			$query .= "{$key} = :{$key}, ";
		}
		
		$query 	= trim ( $query, ', ');
		$query .= " where {$column_name} = {$column_value}";

		$this->query( $query, $data );

		return false;
	}

	public function delete( $column_name = 'id', $column_value ) {

		$data 	= array( $column_name => $column_value );

		$query	= "delete from {$this->table} where {$column_name} = :{$column_name}"; 

		$this->query( $query, $data );

		return false;

	}

}