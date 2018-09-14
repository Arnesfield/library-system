<?php
session_start();
require_once('db-connection.php');

if (isset($_POST['submit-form-login'])) {
  // fetch user data from dbase
  
  // get fields from form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
  // query
  $query = "
    SELECT * FROM users
    WHERE
      username = '$username' AND
      status = '1'
  ";
  
  // execute query
  $query_result = $conn->query($query);
  
  // get result records
  $user_record = $query_result->fetch_assoc();
  
  // get hashed password from database
  $hashed_password = $user_record['password'];
  $verified = password_verify($password, $hashed_password);
  
  // if result returned 1 row and account is verified
  if ($query_result->num_rows == 1 && $verified) {
    // user exists
    $_SESSION['user_id'] = $user_record['id'];
    $_SESSION['logged_in'] = true;
    $_SESSION['is_admin'] = $user_record['type'] == 'admin';
  }
  else {
    // user does not exist
    $_SESSION['incorrect_userpass'] = true;
  }
  
  // redirect to directory (index.php)
  header('Location: ../');
  
  // echo password_hash($password, PASSWORD_DEFAULT);
}
?>