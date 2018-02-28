<?php /* session.php: Contains functions related to data stored in session
         variables i.e. variables used across multiple pages */ ?>

<?php
  // Begins the session
  session_start();

  // Shows the result of the add.php form submission to the database
  function message() {
    if (isset($_SESSION["message"])) {
      $message = "<div class = \"message\">";
      $message .= htmlentities($_SESSION["message"]);
      $message .= "</div>";

      // Prevents message persisting on page reload or change
      $_SESSION["message"] = null;

      return $message;
    }
  }

  // Assigns the errors (if any) of the add.php form submission to the database
  function errors() {
    if (isset($_SESSION["errors"])) {
      $errors = $_SESSION["errors"];

      // Prevents errors persisting on page reload or change
      $_SESSION["errors"] = null;

      return $errors;
    }
  }
?>
