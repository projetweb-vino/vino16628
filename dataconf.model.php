<?php
	// Remplir et renommer dataconf.php
	define("BASEURL", "");

	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'vinodb');

	function DB()
	{
	    static $instance;
	    if ($instance === null) {
	        $opt = array(
	            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	            PDO::ATTR_EMULATE_PREPARES => FALSE,
	        );
	        $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=' . CHARSET;
	        $instance = new PDO($dsn, USER, PASSWORD, $opt);
	    }
	    return $instance;
	}
?>