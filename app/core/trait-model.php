<?php

trait Model {

	use Database;

	/**
	 * Short description
	 *
	 * @var $limit Limit variable.
	 */
	protected $limit = 10;

	/**
	 * Short description
	 *
	 * @var $offset Offset variable.
	 */
	protected $offset = 0;

	/**
	 * Where func.
	 *
	 * @param array $data Data array.
	 *
	 * @param array $data_not Data not array.
	 */
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
		$query .= " limit {$this->limit} offset {$this->offset}";

		$data = array_merge( $data, $data_not );

		return $this->query( $query, $data );
	}

	/**
	 * First func
	 *
	 * @param array $data Data array.
	 *
	 * @param array $data_not Data not array.
	 */
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
		$query .= " limit {$this->limit} offset {$this->offset}";

		$data = array_merge( $data, $data_not );

		$result = $this->query( $query, $data );

		if ( $result ) {

			return $result[0];
		}

		return false;
	}

	/**
	 * Insert func
	 *
	 * @param array $data Data array.
	 */
	public function insert( $data ) {

		$keys = array_keys( $data );

		$query = "INSERT INTO {$this->table} (" . implode( ', ', $keys ) . ') VALUES (:' . implode( ', :', $keys ) . ')';

		$this->query( $query, $data );

		return false;
	}

	/**
	 * Update func
	 *
	 * @param array  $data Data array.
	 *
	 * @param string $column_name Column name string.
	 *
	 * @param any    $column_value Column value assoc with column name.
	 */
	public function update( $data, $column_name, $column_value ) {

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

	/**
	 * Delete func
	 *
	 * @param string $column_name Column_name string.
	 *
	 * @param any    $column_value Column value any.
	 */
	public function delete( $column_name = 'id', $column_value ) {

		$data = array( $column_name => $column_value );

		$query = "DELETE FROM {$this->table} WHERE {$column_name} = :{$column_name}";

		$this->query( $query, $data );

		return false;
	}

}
