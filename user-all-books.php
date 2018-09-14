<?php include_once('html/top.php'); ?>
<?php
  session_start();
  $admin = false;
  require_once('php/redirect.php');
  require_once('html/welcome-header.php');
?>

<?php
  require_once('html/user-nav.php');
?>

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

<?php
if ($num_rows > 0) {
?>

<div class="notif show my-card my-p">
  <p>Warning! You have <?php echo $num_rows; ?> <?php echo $num_rows == 1 ? 'book' : 'books'; ?> overdue.</p>
</div>

<?php } ?>

<h2 class="t-secondary">
  <i class="material-icons small">library_books</i>
  All Books
</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  <?php include_once('html/form-query.html'); ?>
</form>

<p class="t-secondary my-m-t-3 my-t-c">
  <em>Note: Only maximum of two (2) borrowed books allowed.</em>
</p>

<?php
  // check if get is set
  $condition = "";
  if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($conn, strip_tags($_GET['q']));
    $condition = " AND LOWER(CONCAT(title, author, category)) LIKE LOWER('%$q%')";
  }
?>

<?php
  // get users
  $all_books_query = "
    SELECT * FROM books
    WHERE status != '0'
    $condition 
    ORDER BY title ASC
  ";
  
  $sql = mysqli_query($conn, $all_books_query) or die(mysql_error());
  
  $id = $_SESSION['user_id'];
  $query = "
    SELECT COUNT(*) AS 'count'
    FROM users u, books b, transaction t
    WHERE
      t.user_id = u.id AND
      u.id = $id AND
      t.book_id = b.id AND
      t.date_returned IS NULL
  ";
  
  $record = $conn->query($query);
  $num_of_borrowed_books = $record->fetch_assoc()['count'];
?>

<?php
if (mysqli_num_rows($sql) > 0) {
?>
<div class="m-top-3">
<?php
  for ($i = 0; $row = mysqli_fetch_array($sql, MYSQLI_ASSOC); $i++) {
    if ($i % 3 == 0 || $i == 0) {
?>
<div class="row">
<?php } ?>

  <div class="col-md-4 my-p-1 book-item">
    <div class="wide-card mdl-card mdl-shadow--2dp" style="width: 100%;">
      
      <div class="img-card-cont" style="background: url('<?php echo $row['image_path'];?>');">
        <div class="dim mdl-js-ripple-effect ripple-cont">
          <div class="mdl-ripple"></div>
        </div>
      </div>
      
      <div class="mdl-card__title card-title">
        <h2 class="mdl-card__title-text"><?=$row['title']?></h2>
      </div>
      
      <div class="mdl-card__supporting-text">
        <p>
          <strong>Author: </strong>
          <?=$row['author']?>
        </p>
        <p>
          <strong>Category: </strong>
          <?=$row['category']?>
        </p>
        <p>
          <strong>Borrowed: </strong>
          <?php echo $row['status'] == '2' ? "Yes": "No"; ?>
        </p>
        <br/>
        <p>
          <?=$row['description']?>
        </p>
      </div>
      
      
      <div class="mdl-card__actions mdl-card--border">
        <form action="php/book-borrow.php" method="post">
          <input type="hidden" name="bid" value="<?php echo $row['id']; ?>" />
          <input type="hidden" name="is_admin" value="<?php echo $admin; ?>" />
      
          <button type="submit" name="borrow"
            <?php echo ($row['status'] != 2 && $num_of_borrowed_books < 2) ? '': 'disabled'; ?>
            class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Borrow Book
          </button>
        </form>
      </div>
      
      <div class="mdl-card__menu">
        
        <form action="php/book-borrow.php" method="post">
          <input type="hidden" name="bid" value="<?php echo $row['id']; ?>" />
          <input type="hidden" name="is_admin" value="<?php echo $admin; ?>" />
          
          <button type="submit" name="borrow"
            <?php echo ($row['status'] != 2 && $num_of_borrowed_books < 2) ? '': 'disabled'; ?>
            class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons fab-small t-white">arrow_forward</i>
          </button>
        </form>
      
      </div>
      
    </div>
  </div>
  
  
<?php if (($i+1) % 3 == 0) { ?>
</div>
<?php } ?>

<?php } ?>
</div>
<?php } ?>


</div>

</body>
</html>