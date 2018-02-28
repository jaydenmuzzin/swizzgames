<?php include("../includes/layouts/head.php");?>
<?php require_once ("../includes/session.php");?>
<?php require("../includes/config.php");?>

<?php
  $_SESSION["logged_in"] = 1; /* With no login system, assumes user is
                                 logged in given access to admin.php */
?>

<header>
  <h1>Swizz Games</h1>
</header>

<nav class = "scrollable">
    <?php echo navigation(); // Display navigation ?>
</nav>

<main>
  <?php echo message(); /* Displays success of form submission. Only displays
                       when form submit button on add.php is clicked i.e. not on
                       page load */ ?>
  <h2>Hello admin! Please select an option below:</h2><br>

  <ul class = "admin_options">
    <li class = "option_link"><a href = "add.php">Add Game</a></li>
    <li class = "option_link"><a href = "logout.php">Logout</a></li>
  </ul>
</main>

<?php include("../includes/layouts/footer.php");?>
