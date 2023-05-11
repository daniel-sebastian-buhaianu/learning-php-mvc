<?php

spl_autoload_register( 'require_model' );

require 'confidential.php';
require 'config.php';
require 'functions.php';
require 'database.trait.php';
require 'model.trait.php';
require 'controller.class.php';
require 'app.class.php';


function require_model( $class_name ) {
	$class_name = lcfirst( $class_name );
	$filename   = "../app/models/{$class_name}.class.php";
	require $filename;
}
