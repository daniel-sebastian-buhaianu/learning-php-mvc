<?php

if ( isset( $_SERVER['SERVER_NAME'] ) ) {

	if ( 'localhost' === $_SERVER['SERVER_NAME'] ) {

		define( 'DBHOST', 'localhost' );
		define( 'DBUSER', 'dsb99@localhost' );
		define( 'DBNAME', 'db_mvc' );

		define( 'ROOT', 'http://localhost/php-mvc/public' );

	} else {

		define( 'DBHOST', '' );
		define( 'DBUSER', '' );
		define( 'DBNAME', '' );

		define( 'ROOT', 'https://www.yourwebsite.com' );

	}
}

define( 'APP_NAME', 'My Website' );
define( 'APP_DESC', 'Best website on the planet' );


// true means - show erros
define( 'DEBUG', true );
