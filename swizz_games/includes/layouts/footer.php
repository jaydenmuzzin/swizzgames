<!-- footer.php is consistent among all public PHP pages -->

    <footer><p id="copyright">© Swizz Games 2017.</p></footer>
  </body>
</html>

<?php
  // Closes database connection
  if (isset($connect)){
    mysqli_close($connect);
  }
?>
