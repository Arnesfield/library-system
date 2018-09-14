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
  <i class="material-icons small">collections_bookmark</i>
  My Books
</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  <?php include_once('html/form-query.html'); ?>
</form>

<?php
  // check if get is set
  $condition = " AND 1 = 1 ";
  if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($conn, strip_tags($_GET['q']));
    $condition = " AND LOWER(CONCAT(title, author, category)) LIKE LOWER('%$q%')";
  }
?>

<?php
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
    b.category AS 'category',
    b.description AS 'description'
  FROM
    books b, transaction t
  WHERE
    t.user_id = $id AND
    t.book_id = b.id AND
    t.date_returned IS NULL
    $condition
  ORDER BY title ASC
";

$sql = mysqli_query($conn, $my_books_query) or die(mysql_error());
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
          <strong>Date Borrowed: </strong>
          <?=$row['date_borrowed']?>
        </p>
        <p>
          <strong>Date Due: </strong>
          <?=$row['date_due']?>
        </p>
        <br/>
        <p>
          <?=$row['description']?>
        </p>
      </div>
      
      
      <div class="mdl-card__actions mdl-card--border">
        <form action="php/book-return.php" method="post">
          <input type="hidden" name="bid" value="<?php echo $row['book_id']; ?>" />
          <input type="hidden" name="is_admin" value="<?php echo $admin; ?>" />
      
          <button type="submit" name="return"
            class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Return Book
          </button>
        </form>
      </div>
      
      
      <div class="mdl-card__menu">
        
        <form action="php/book-return.php" method="post">
          <input type="hidden" name="bid" value="<?php echo $row['book_id']; ?>" />
          <input type="hidden" name="is_admin" value="<?php echo $admin; ?>" />
          
          <button type="submit" name="return"
            class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons fab-small t-white">keyboard_return</i>
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