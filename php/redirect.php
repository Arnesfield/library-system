<?php
if (!isset($_SESSION['user_id'])) {
  header('Location: ./');
  return;
}
else if (isset($_SESSION['is_admin'])) {
  // admin and not admin or user and not user
  if (isset($admin))
    $is_admin = $admin;
  else if (isset($_POST['is_admin']))
    $is_admin = $_POST['is_admin'];
  
  if ($_SESSION['is_admin'] != $is_admin) {
    header('Location: ./');
    return;
  }
}
?>