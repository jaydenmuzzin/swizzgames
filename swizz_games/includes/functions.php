<?php /* functions.php: Contains all the functions, except validation and
         session-related, that the applicaiton will use */ ?>

<?php
  // Directs the user to another page, with the page defined on call
  function redirect_to($location = NULL) {
    if ($location != NULL) {
        header('Location: '.$location);
        exit;
    }
  }

  // Checks to see if the query was successfully performed against the database
  function validate_query($query_set){
    if ($query_set == null){
      die ("Unable to complete query");
    }
  }

  // Pulls the list of games from the database and orders them alphabetically
  function get_games_list(){
    global $connect;

    $query = "SELECT * ";
    $query .= "FROM games ";
    $query .= "ORDER BY title ASC";

    $submit_query = mysqli_query($connect, $query);

    validate_query($submit_query);

    return $submit_query;
  }

  // Displays the list of games in the database in side navigation bar
  function navigation($selected_game = null){
    $output = "<ul class = \"games_list_nav\">";
    $games_list = get_games_list();

    /* Assigns HTML for display and links to every game (row in set) returned from
       mysqli as an associateive array */
    while ($game = mysqli_fetch_assoc($games_list)){
      $output .= "<li class = \"game_nav";
      $output .= "\">";
      $output .= "<a class = \"title_nav\" href = \"view.php?title=";
      $output .= urlencode($game["title"]);
      $output .= "\">";
      $output .= $game["title"];
      $output .= "</a>";
      $output .= "<div class = \"title_nav_bg";

      // The currently viewed game is apparent in the navigation
      if ($game["title"] == $selected_game) {
          $output .= " selected";
      }

      $output .= "\"></div>";
      $output .= "<img class = \"coverart_thumbnail\" src = \"";
      $output .= $game["coverart"];
      $output .= "\" alt = \"";
      $output .= $game["title"];
      $output .= "\">";
      $output .= "</li>";
    }

    // Releases the mysqli query
    mysqli_free_result($games_list);

    $output .= "</ul>";

    return $output;
  }

  /* Returns all of the data associated with a game. $selected_game is the game
     title currently being viewed */
  function get_game_info($selected_game) {
    global $connect;

    /* Removes special characters from the user's entered strings and prevents
       SQL injection. */
    $selected_game = mysqli_real_escape_string($connect, $selected_game);

    $query = "SELECT * ";
    $query .= "FROM games ";
    $query .= "WHERE title = \"$selected_game\" ";
    $query .= "LIMIT 1;"; /* 'LIMIT 1' used for extra assurance that only one
                             game is resulted */

    $submit_query = mysqli_query($connect, $query);

    validate_query($submit_query);

    return $submit_query;
  }

  // Assigns HTML for displaying the $selected_game game data
  function displayGame($game_info) {
    $output = "<div class = \"game_info_head\">";
    $output .= "<p class = \"title\">";
    $output .= $game_info["title"];
    $output .= "</p>";
    $output .= "<p class = \"year\">(";
    $output .= $game_info["year"];
    $output .= ")</p></div>";
    $output .= "<p class = \"game_info_para\">Developer: ";
    $output .= $game_info["developer"];
    $output .= "</p>";
    $output .= "<p class = \"game_info_para\">Publisher: ";
    $output .= $game_info["publisher"];
    $output .= "</p>";
    $output .= "<p class = \"description game_info_para\">";
    $output .= $game_info["description"];
    $output .= "</p>";
    $output .= "<img class = \"coverart_view\" src = \"";
    $output .= $game_info["coverart"];
    $output .= "\" alt = \"";
    $output .= $game_info["title"];
    $output .= "\">";

    echo $output;
  }
