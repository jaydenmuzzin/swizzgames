<?php /* new.php: Processes the information entered on and sent from add.php and
        adds it to the database */ ?>

<?php require_once ("../includes/session.php");?>
<?php require("../includes/config.php");?>
<?php require_once("../includes/validation_functions.php");?>


<?php
  // Checks if the form on add.php was submitted, reloads add.php if it wasn't
  if (isset($_POST["submit"])) {
    /* Removes special characters from the user's entered strings and prevents
       SQL injection */
    $title = mysqli_real_escape_string($connect, $_POST["title"]);
    $developer = mysqli_real_escape_string($connect, $_POST["developer"]);
    $publisher = mysqli_real_escape_string($connect, $_POST["publisher"]);
    $year = $_POST["year"]; // Input is an integer //
    $description = mysqli_real_escape_string($connect, $_POST["description"]);
    $coverart = mysqli_real_escape_string($connect, $_POST["coverart"]);

    /* These fields must have been entered into the form (only description can
       be empty) */
    $required_fields = array("title", "developer", "publisher", "coverart");
    validate_presence($required_fields);

    /* These fieldsmust have been below their maximum length, which is the
       maximum characters defined in their datatype */
    $max_length_fields = array("title", "developer", "publisher");
    validate_max_length($max_length_fields, 50);
    validate_max_length($coverart, 255);

    // validate_image($coverart); //

    /* If there are any errors, add.php is reloaded and no data is added into
       the database */
    if (!(empty($errors))) {
      $_SESSION["errors"] = $errors;
      redirect_to("../public/add.php");
    }

    // Adds the game data to the database
    $query = "INSERT INTO games(title,developer,publisher,year,description,coverart) ";
    $query .= 'VALUES ("'.$title.'","'.$developer.'","'.$publisher;
    $query .= '","'.$year.'","'.$description.'","'.$coverart.'");';

    $submit_query = mysqli_query($connect, $query);
    validate_query($submit_query);

    // Success or failure of form entry readied for showing the user
    if ($submit_query) {
      $_SESSION["message"] = "Game added to database.";
      redirect_to("../public/admin.php");
    } else {
      $_SESSION["message"] = "Game unable to be added to database. Please try again.";
      redirect_to("../public/add.php");
    }

    // Releases the mysqli query
    mysqli_free_result($submit_query);

  } else {
    redirect_to("../public/add.php");
  }
?>
