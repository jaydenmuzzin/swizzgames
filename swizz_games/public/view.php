<?php /* view.php: Displays all of the data for one game in the database.
         Changes based on the game link clicked */ ?>
<?php include("../includes/layouts/head.php");?>
<?php require_once ("../includes/session.php");?>
<?php require("../includes/config.php");?>

<?php
  // The game title is taken from the URL to show the current page in the navigation
  if (isset($_GET["title"])) {
    $selected_game = $_GET["title"];
  } else {
    $selected_game = null;
  }
?>

<header>
  <h1>Swizz Games</h1>
</header>

<nav>
  <div class = "scrollable">
    <?php echo navigation($selected_game);?>
  </div>

  <?php
    // Options available are dependent on whether the user is logged in or not
    if (isset($_SESSION["logged_in"])) {
      $admin_options = "<ul class = \"options\">";
      $admin_options .= "<li class = \"option_link\"><a href = \"admin.php\">Admin Home</a></li>";
      $admin_options .= "<li class = \"option_link\"><a href = \"add.php\">Add Game</a></li>";
      $admin_options .= "<li class = \"option_link\"><a href = \"logout.php\">Logout</a></li>";
      $admin_options .= "</ul>";

      echo $admin_options;
    } else {
      $admin_options = "<ul class = \"options\">";
      $admin_options .= "<li class = \"option_link\"><a href = \"index.php\">Home</a></li>";
      $admin_options .= "<li class = \"option_link\"><a href = \"login.php\">Login</a></li>";
      $admin_options .= "</ul>";

      echo $admin_options;
    }
  ?>
</nav>

<main>
  <?php
    // Makes sure there is a game currently being viewed
    if ($selected_game) {
      // Performs mysqli query to obtain all data associated with the viewed game
      $game_info_query = get_game_info($selected_game);
      // Places data from returned query result into associative array
      $game_info = mysqli_fetch_assoc($game_info_query);

      // Shows the game information
      displayGame($game_info);

      // Releases the mysqli query
      mysqli_free_result($game_info_query);
    }
  ?>
</main>

<?php include("../includes/layouts/footer.php");?>
