<?php 

trait Database {
	/**
	 * Connect func
	 */
	private function connect() {

		$string = 'mysql:hostname=' . DBHOST . ';dbname=' . DBNAME;
		$con    = new PDO( $string, DBUSER, DBPASS );

		return $con;
	}

	/**
	 * Query func
	 *
	 * @param string $query Query string.
	 *
	 * @param array  $data Data array.
	 */
	public function query( $query, $data = array() ) {

		$con   = $this->connect();
		$stmt  = $con->prepare( $query );
		$check = $stmt->execute( $data );

		if ( $check ) {

			$result = $stmt->fetchAll( PDO::FETCH_OBJ );

			if ( is_array( $result ) && count( $result ) ) {

				return $result;

			}
		}

		return false;
	}

	/**
	 * Get row func
	 *
	 * @param string $query Query string.
	 *
	 * @param array  $data Data array.
	 */
	public function get_row( $query, $data = array() ) {

		$con   = $this->connect();
		$stmt  = $con->prepare( $query );
		$check = $stmt->execute( $data );

		if ( $check ) {

			$result = $stmt->fetchAll( PDO::FETCH_OBJ );

			if ( is_array( $result ) && count( $result ) ) {

				return $result[0];
			}
		}

		return false;
	}
}
