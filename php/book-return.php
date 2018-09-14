<?php
  // Initialize the session.
  session_start();
  require_once('redirect.php');
  require_once('db-connection.php');

  // redirect to index if
  // not post, admin
  if (!isset($_POST['return'])) {
    header('Location: ../');
    return;
  }
  
  if (!isset($_SESSION['user_id'])) {
    header('Location: ../');
    return;
  }
  
  // if admin, redirect
  if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
    header('Location: ../');
    return;
  }
  
  // update row for borrowing
  // update current book to borrowed
  $book_id = $_POST['bid'];
  $user_id = $_SESSION['user_id'];
  
  $query = "
    UPDATE transaction
    SET date_returned = CURRENT_DATE()
    WHERE
      user_id = ? AND
      book_id = ? AND
      date_returned IS NULL
  ";
  
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ii", $user_id, $book_id);
  $stmt->execute();
  $stmt->close();
  
  $query = "
    UPDATE books
    SET status = '1'
    WHERE id = ?
  ";
  
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $book_id);
  $stmt->execute();
  $stmt->close();
  
  $conn->close();
  
  // redirect to index.php
  header("Location: ../user-my-books.php");
?>