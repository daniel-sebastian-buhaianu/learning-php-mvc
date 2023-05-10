<?php

spl_autoload_register( 'require_model' );

require 'confidential.php';
require 'config.php';
require 'functions.php';
require 'trait-database.php';
require 'trait-model.php';
require 'class-controller.php';
require 'class-app.php';



/**
 * Requires a model
 *
 * @param string $class_name Class name.
 */
function require_model( $class_name ) {
	$class_name = lcfirst( $class_name );
	$filename   = "../app/models/class-{$class_name}.php";
	require $filename;
}
