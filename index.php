<?php include_once('html/top.php'); ?>

<?php
  session_start();
  $show_form = true;
  $msg = '';
  if (isset($_SESSION['logged_in'])) {
    $show_form = false;
    $msg = 'You are logged in.';
    include_once('html/log-message.php');
    // include main page here
    require_once( $_SESSION['is_admin'] ? 'html/admin-home.php' : 'html/user-home.php' );
    unset($_SESSION['logged_in']);
  }
  else if (isset($_SESSION['user_id'])) {
    $show_form = false;
    require_once( $_SESSION['is_admin'] ? 'html/admin-home.php' : 'html/user-home.php' );
  }
  else if (isset($_SESSION['is_logged_out'])) {
    $msg = 'Logged out successfully.';
    include_once('html/log-message.php');
    // unset
    unset($_SESSION['is_logged_out']);
  }
  else if (isset($_SESSION['incorrect_userpass'])) {
    $msg = "Incorrect username or password.";
    include_once('html/log-message.php');
    // unset incorrect message to avoid message display on refresh
    unset($_SESSION['incorrect_userpass']);
  }
?>

<?php
  if ($show_form) {
    include_once('html/form-login.html');
  }
?>

</body>
</html>