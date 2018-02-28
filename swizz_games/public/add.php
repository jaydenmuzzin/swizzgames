<?php /* add.php: Contains the form for adding a game to the database */ ?>

<?php include("../includes/layouts/head.php");?>
<?php require_once ("../includes/session.php");?>
<?php require("../includes/config.php");?>
<?php require_once("../includes/validation_functions.php");?>

<header>
  <h1>Swizz Games</h1>
</header>

<nav>
  <ul class = "options">
    <li class = "option_link"><a href = "admin.php">Admin Home</a></li>
    <li class = "option_link"><a href = "logout.php">Logout</a></li>
  </ul>
</nav>

<main>
  <h4>Add Game</h4>

  <?php echo message(); /* Displays failure of form submission. Only displays
                           when submit button is clicked i.e. not on page load */ ?>
  <?php $errors = errors(); // Acquires errors of form submission ?>
  <?php echo errors_form($errors); // Displays errors ?>

  <div id = "form_cont">
    <!-- Form is submitted to new.php for processing -->
    <form action = "../includes/new.php" method = "post">
      <label for = "form_title">Title: </label><input id = "form_title" type = "text" name = "title" value = "" />
      <label for = "form_developer">Developer: </label><input id = "form_developer" type = "text" name = "developer" value = "" />
      <label for = "form_publisher">Publisher: </label><input id = "form_publisher" type = "text" name = "publisher" value = "" />
      <label for = "form_year">Year: </label><select id = "form_year" name = "year">
                <?php // Shows every year from 1900 and 2017 in descending order //
                 for ($year = 2017; $year >= 1900; $year--) {?>
                  <option value = "<?php echo $year?>"><?php echo $year?></option>
                <?php }?>
               </select>
      <label for = "form_description">Description: </label><input id = "form_description" type = "text" name = "description" value = "" />
      <label for = "form_coverart">Coverart: </label><input id = "form_coverart" type = "url" name = "coverart" value = "http://www.example.com/image.png" />
      <input id ="submit" type = "submit" name = "submit" value = "Add Game" />
    </form>
  </div>
</main>

<?php include("../includes/layouts/footer.php");?>

<?php // Ends session
  session_destroy();
?>
