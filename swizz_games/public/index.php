<?php /* index.php: Swizz Games homepage, which shows all games in the database */ ?>

<?php include("../includes/layouts/head.php");?>
<?php require_once ("../includes/session.php");?>
<?php require("../includes/config.php");?>

<?php
  $_SESSION["logged_in"] = null; /* With no login system, assumes user is not
                                   logged in as admin on homepage */
?>

<header>
  <h1 id = "h1_index">Swizz Games</h1>
  <a id = "login_index" class = "option_link" href = "login.php">Admin Login</a>
</header>

<div id = "main_index">
  <h3>Welcome to Swizz Games!<br></h3>

  <!-- Displays the list of games in the database -->
  <div class = "display_games_index">
    <?php
      $output = "<ul class = \"games_list_index\">";
      $games_list = get_games_list();

      /* Assigns HTML for display and links to every game (row in set) returned
         from mysqli as an associateive array */
      while ($game = mysqli_fetch_assoc($games_list)){
        $output .= "<li class = \"game_index";
        $output .= "\">";
        $output .= "<a class= \"title_index\" href = \"view.php?title=";
        $output .= urlencode($game["title"]);
        $output .= "\">";
        $output .= $game["title"];
        $output .= "</a>";
        $output .= "<div class = \"title_index_bg\"></div>";
        $output .= "<img class = \"coverart_index\" src = \"";
        $output .= $game["coverart"];
        $output .= "\" alt = \"";
        $output .= $game["title"];
        $output .= "\"></li>";
      }

      // Releases the mysqli query
      mysqli_free_result($games_list);

      $output .= "</ul>";

      echo $output;
    ?>
  </div>
</div>

<?php include("../includes/layouts/footer.php");?>
