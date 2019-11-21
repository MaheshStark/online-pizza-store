<?php
/** BASE CONFIGURATION FILE **/
ob_start();

session_start();
//session_destroy();

// BASIC SETTINGS
define("ROOT", __DIR__);
define("SITE_TITLE", "Prime Pizza");
define("SITE_URL", "");
define("UPLOADS", ROOT . "/content/uploads");

// DATABASE INFO
global $conn;
define("DB_NAME", "db_prime_pizza");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_HOST", "localhost");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// FILE INCLUDES
require_once('functions.php');
