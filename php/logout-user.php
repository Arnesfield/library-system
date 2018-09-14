<?php
  // Initialize the session.
  session_start();

  session_destroy();
  session_start();
  
  $_SESSION['is_logged_out'] = true;
  
  // redirect to index.php
  header("Location: ../");
?>