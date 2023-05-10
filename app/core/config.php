<?php

if ( $_SERVER[ 'SERVER_NAME' ] == 'localhost' ) {

	/** database config **/
	define( 'DBHOST', 'localhost' );
	define( 'DBUSER', 'dsb99@localhost' );
	define( 'DBNAME', 'db_mvc' );

	define( 'ROOT', 	 'http://localhost/php-mvc/public' );

}
else {

	/** database config **/
	define( 'DBHOST', '' );
	define( 'DBUSER', '' );
	define( 'DBNAME', '' );

	define( 'ROOT', 	 'https://www.yourwebsite.com' );
	
}

