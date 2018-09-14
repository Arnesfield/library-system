<?php
  // Initialize the session.
  session_start();
  require_once('redirect.php');
  require_once('db-connection.php');

  // redirect to index if
  // not post, admin
  if (!isset($_POST['borrow'])) {
    header('Location: ../');
    return;
  }
  
  if (!isset($_SESSION['user_id'])) {
    header('Location: ../');
    return;
  }
  
  $book_id = $_POST['bid'];
  $user_id = $_SESSION['user_id'];
  
  // redirect if book is borrowed
  if ($row['status'] == 2) {
    header('Location: ../');
    return;
  }
  
  // if admin, redirect
  if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
    header('Location: ../');
    return;
  }
  
  // insert new row for borrowing
  // update current book to borrowed
  
  $query = "
    INSERT INTO transaction(date_borrowed, date_due, user_id, book_id)
    VALUES(CURRENT_DATE(), CURRENT_DATE()+3, ?, ?)
  ";
  
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ii", $user_id, $book_id);
  $stmt->execute();
  $stmt->close();
  
  $query = "
    UPDATE books
    SET status = '2'
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