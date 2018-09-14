<?php require_once('html/welcome-header.php'); ?>

<?php require_once('html/user-nav.php'); ?>

<?php
// check for existing overdue
$id = $_SESSION['user_id'];
// get borrowed books
$my_books_query = "
  SELECT
    t.date_borrowed AS 'date_borrowed',
    t.date_due AS 'date_due',
    b.image_path AS 'image_path',
    b.title AS 'title',
    b.id AS 'book_id',
    b.author AS 'author',
    b.category AS 'category'
  FROM
    books b, transaction t
  WHERE
    t.user_id = $id AND
    t.book_id = b.id AND
    t.date_returned IS NULL AND
    t.date_due < CURRENT_DATE()
  ORDER BY title ASC
";

$sql = mysqli_query($conn, $my_books_query) or die(mysql_error());
$num_rows = $sql->num_rows;

?>

<div class="content">

<h1>Welcome, <?php echo $username; ?></h1>

<div class="my-p-t-3 my-p-b my-p-x-4 my-fs-3 -my-lh-2">

  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et magna mauris.
    Curabitur vel erat suscipit, elementum diam a, interdum urna. 
  </p>
  <br/>
  <p>
    Praesent est mauris, ornare eget porttitor vel, finibus nec metus. Sed quis enim urna. Vestibulum consequat mi id porta finibus. Aliquam vel dui non dui hendrerit ultricies a at mi.
  </p>

  <br/>
  
  <p class="my-t-r t-secondary">
    <em>-- Library System v2.0 &copy; 2017</em>
  </p>
  
</div>

<?php
if ($num_rows > 0) {
?>

<div class="notif show my-card my-p">
  <p>Warning! You have <?php echo $num_rows; ?> <?php echo $num_rows == 1 ? 'book' : 'books'; ?> overdue.</p>
</div>

<?php } ?>

</div>