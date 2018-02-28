<?php // config.php: Contains all the necessary setup to run the application ?>

<?php
  // All files will need the various processing contained within functions.php
  require("../includes/functions.php");?>

<?php
  // Error reporting
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  // Connecting to SQL database
  // Settings as constants as there is only one type of user
  define("dbhost","localhost");
  define("dbuser","root");
  define("dbpass","webdev123");
  define("dbname","swizz_games");

  $connect = mysqli_connect(dbhost, dbuser, dbpass, dbname);

  if (mysqli_connect_errno()) {
      die ("Error. Unable to connect to database: " .
      mysqli_connect_error() . " (" .
      mysqli_connect_errno() . ")");
  }
?>
