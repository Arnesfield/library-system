<?php include_once('html/top.php'); ?>
<?php
  session_start();
  $admin = true;
  require_once('php/redirect.php');
  require_once('html/welcome-header.php');
?>

<?php
  require_once('html/nav.php');
?>

<div class="content">

<h2 class="t-secondary">
  <i class="material-icons small">library_books</i>
  Manage Books
</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  <?php include_once('html/form-query.html'); ?>
</form>

<?php
  // check if get is set
  $condition = "";
  if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($conn, strip_tags($_GET['q']));
    $condition = "WHERE LOWER(CONCAT(title, author, category)) LIKE LOWER('%$q%')";
  }
?>

<?php
  // get users
  $books_query = "SELECT * FROM books $condition";
  
  $sql = mysqli_query($conn, $books_query) or die(mysql_error());
?>

<form action="admin-action-book.php" method="post" class="form-fab">
  <input type="hidden" name="is_admin" value="<?php echo $admin; ?>" />
  
  <button type="submit" name="add-book"
    class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored my-card-2">
    <i class="material-icons fab">add</i>
  </button>
</form>


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
        <form action="admin-action-book.php" method="post">
          <input type="hidden" name="bid" value="<?php echo $row['id']; ?>" />
          <input type="hidden" name="is_admin" value="<?php echo $admin; ?>" />
      
          <button type="submit" name="modify-book"
            class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Modify Book &raquo;</button>
        </form>
      </div>
      
      <div class="mdl-card__menu">
        
        <form action="admin-action-book.php" method="post">
          <input type="hidden" name="bid" value="<?php echo $row['id']; ?>" />
          <input type="hidden" name="is_admin" value="<?php echo $admin; ?>" />
          
          <i class="material-icons fab-small t-white my-m-r-1">
            <?php echo $row['status'] != 0 ? 'visibility' : 'visibility_off'; ?>
          </i>
          
          <button type="submit" name="modify-book"
            class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons fab-small t-white">edit</i>
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

</table>

</div>

</body>
</html>