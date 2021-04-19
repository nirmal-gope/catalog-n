<?php
//website title
define("WEBSITE_TITLE", "Catalog-N");

//database variables
define('DB_TYPE', 'mysql');
define('DB_NAME', 'catalog_n');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');

/*protocal type http or https*/
define('PROTOCOL','http');

/**root paths*/
$path = str_replace("\\", "/",PROTOCOL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);
define('ROOT', str_replace("app/core", "public", $path));
define('ASSETS', str_replace("app/core", "public/assets", $path));

/* true to allow error reporting
set to false when upload online to stop error reporting*/

define('DEBUG',true);