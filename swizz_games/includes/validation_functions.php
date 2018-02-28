<?php /* validation_functions.php: Contains functions related to validating the
         form fields submitted from add.php */ ?>

<?php
  // Initialising errors
  $errors = array();

  // Capitalises the database field. Extensible.
  function fieldname_as_text($fieldname) {
    $fieldname = ucfirst($fieldname);
    return $fieldname;
  }

  // Checks if the value has been set and isn't an empty string
  function present($value) {
    return isset($value) && $value !== "";
  }

  /* Checks all necessary fields have an acceptable value. If not, adds an error
     to the error array */
  function validate_presence($fields) {
    global $errors;

    // Loops through all the imported fields
    foreach ($fields as $field) {
      // Removes whitespace from the beginning and end of the field
      $value = trim($_POST[$field]);

      if (!present($value)) {
        $errors[$field] = fieldname_as_text($field) . " cannot be blank.";
      }
    }
  }

  // Checks if the value is less than the maximum length allowed
  function valid_max_length($value, $max_length) {
    return strlen($value) <= $max_length;
  }

  /* Checks if all fields with a a maximum length are less than it. If not, adds
     an error to the error array */
  function validate_max_length($fields, $max_length) {
    global $errors;

    foreach ($fields as $field) {
      $value = trim($_POST[$field]);

      if (!(valid_max_length($value, $max_length))) {
        $errors[$field] = fieldname_as_text($field) . " is too long.";
      }
    }
  }

  // Assigns HTML for displaying all the errors
  function errors_form($errors = array()) {
    $output = "";

    if (!(empty($errors))) {
      $output .= "<div class = \"errors\">";
      $output .= "Invalid submission. <br><br> Please correct the errors below: <br><br>";
      $output .= "<ul>";

      foreach ($errors as $key => $error) {
        $output .= "<li class = \"error\">$error</li>";
      }
      $output .= "</ul></div>";
    }

    return $output;
  }
?>
