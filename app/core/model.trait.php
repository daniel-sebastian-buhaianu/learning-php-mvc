<?php

trait Model {

	use Database;


	protected $limit        = 10;
	protected $offset       = 0;
	protected $order        = 'desc';
	protected $order_column = 'id';

	public function find_all() {

		$query = "SELECT * FROM {$this->table} LIMIT {$this->limit} OFFSET {$this->offset}";

		return $this->query( $query );
	}

	public function where( $data, $data_not = array() ) {

		$keys     = array_keys( $data );
		$keys_not = array_keys( $data_not );

		$query = "SELECT * FROM {$this->table} WHERE ";

		foreach ( $keys as $key ) {

			$query .= "{$key} = :{$key} && ";
		}

		foreach ( $keys_not as $key ) {

			$query .= "{$key} != :{$key} && ";
		}

		$query  = trim( $query, ' && ' );
		$query .= " ORDER BY {$this->order_column} {$this->order} LIMIT {$this->limit} OFFSET {$this->offset}";

		$data = array_merge( $data, $data_not );

		return $this->query( $query, $data );
	}

	public function first( $data, $data_not = array() ) {

		$keys     = array_keys( $data );
		$keys_not = array_keys( $data_not );

		$query = "SELECT * FROM {$this->table} WHERE ";

		foreach ( $keys as $key ) {

			$query .= "{$key} = :{$key} && ";
		}

		foreach ( $keys_not as $key ) {

			$query .= "{$key} != :{$key} && ";
		}

		$query  = trim( $query, ' && ' );
		$query .= " LIMIT {$this->limit} OFFSET {$this->offset}";

		$data = array_merge( $data, $data_not );

		$result = $this->query( $query, $data );

		if ( $result ) {

			return $result[0];
		}

		return false;
	}

	public function insert( $data ) {

		$keys = array_keys( $data );

		$query = "INSERT INTO {$this->table} (" . implode( ', ', $keys ) . ') VALUES (:' . implode( ', :', $keys ) . ')';

		$this->query( $query, $data );

		return false;
	}

	public function update( $data, $column_name, $column_value ) {

		if ( ! empty( $this->allowedColumns ) ) {

			foreach ( $data as $key => $value ) {

				if ( ! in_array( $key, $this->allowedColumns ) ) {
					unset( $data[ $key ] );
				}
			}
		}


		$keys = array_keys( $data );

		$query = "UPDATE  {$this->table} SET ";

		foreach ( $keys as $key ) {

			$query .= "{$key} = :{$key}, ";
		}

		$query  = trim( $query, ', ' );
		$query .= " WHERE {$column_name} = {$column_value}";

		$this->query( $query, $data );

		return false;
	}

	public function delete( $column_name = 'id', $column_value ) {

		$data = array( $column_name => $column_value );

		$query = "DELETE FROM {$this->table} WHERE {$column_name} = :{$column_name}";

		$this->query( $query, $data );

		return false;
	}

}
