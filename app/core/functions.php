<?php
/**
 * Show func
 *
 * @param any $sth Sth variable.
 */
function show( $sth ) {
	echo '<pre>';

	print_r( $sth );

	echo '</pre>';
}
