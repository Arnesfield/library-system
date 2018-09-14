<?php
  require_once('php/db-connection.php');
  // get results again using session id, user_id
  $user_id = $_SESSION['user_id'];
  
  $admin_query = "
    SELECT * FROM users
    WHERE id = $user_id AND type = 'admin'
  ";
  
  $normal_query = "
    SELECT * FROM users
    WHERE id = $user_id AND type = 'normal'
  ";
  
  $user_query = "
    SELECT * FROM users
    WHERE id = $user_id
  ";
  
  // execute query
  $query_result = $conn->query($user_query);
  $user_rows = $query_result->fetch_assoc();
  
  $user_type = $user_rows['type'];
  
  $username = $user_rows['username'];
?>