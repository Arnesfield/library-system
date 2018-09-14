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
  <i class="material-icons small">description</i>
  Reports
</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  
  <div class="row -col-md-6 -my-right">
    <div>
      <?php include_once('html/form-query.html'); ?>
    </div>
    
    <div class="no- col-md-6">
      <div>
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="returned">
          <input type="radio" id="returned" name="radio-q" value="returned"
            class="mdl-radio__button">
          <span class="mdl-radio__label">Returned</span>
        </label>
      </div>
      
      <div>
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="borrowed">
          <input type="radio" id="borrowed" name="radio-q" value="borrowed"
            class="mdl-radio__button">
          <span class="mdl-radio__label">Not Returned</span>
        </label>
      </div>
      
      <div>
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="overdue">
          <input type="radio" id="overdue" name="radio-q" value="overdue"
            class="mdl-radio__button">
          <span class="mdl-radio__label">Overdue</span>
        </label>
      </div>
    </div>
  </div>
  
</form>

<?php
  // check if get is set
  $condition = " AND 1 = 1 ";
  if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($conn, strip_tags($_GET['q']));
    $condition .= "
      AND LOWER(CONCAT(
        t.date_borrowed,
        t.date_due,
        u.student_no,
        u.username, b.title,
        b.author, b.category
      )) LIKE LOWER('%$q%')
    ";
    
    if (isset($_GET['radio-q'])) {
      if ($_GET['radio-q'] == 'returned')
        $condition .= " AND t.date_returned IS NOT NULL";
      
      if ($_GET['radio-q'] == 'borrowed')
        $condition .= " AND t.date_returned IS NULL";
      
      if ($_GET['radio-q'] == 'overdue')
        $condition .= " AND t.date_due < CURRENT_DATE() AND t.date_returned IS NULL";
    }
  }
?>


<?php
  // get users
  $reports_query = "
    SELECT
      t.date_borrowed AS 'date_borrowed',
      t.date_returned AS 'date_returned',
      t.date_due AS 'date_due',
      u.student_no AS 'student_no',
      u.username AS 'username',
      b.title AS 'book_title',
      b.author AS 'book_author',
      b.category AS 'book_category'
    FROM
      users u, books b, transaction t
    WHERE
      t.user_id = u.id AND
      t.book_id = b.id
      $condition
    ORDER BY
      t.date_borrowed DESC,
      u.student_no ASC
  ";
  
  $sql = mysqli_query($conn, $reports_query) or die(mysql_error());
?>

<div class="my-center">

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp m-top-3">

  <tr>
    <th>Date Borrowed</th>
    <th>Date Returned</th>
    <th>Date Due</th>
    <th>Student Number</th>
    <th>Username</th>
    <th>Book Title</th>
    <th>Book Author</th>
    <th>Book Category</th>
  </tr>

<?php
if (mysqli_num_rows($sql) > 0) {
  for ($i = 0; $row = mysqli_fetch_array($sql, MYSQLI_ASSOC); $i++) {
?>
  <tr>
    <td>
      <div>
        <?=$row['date_borrowed']?>
      </div>
    </td>
    
    <td>
      <div>
        <?=$row['date_returned']?>
      </div>
    </td>
    
    <td>
      <div>
        <?=$row['date_due']?>
      </div>
    </td>
  
    <td>
      <div>
        <?=$row['student_no']?>
      <div>
    </td>
    
    <td>
      <div>
        <?=$row['username']?>
      <div>
    </td>
    
    <td>
      <div>
        <?=$row['book_title']?>
      <div>
    </td>
    
    <td>
      <div>
        <?=$row['book_author']?>
      <div>
    </td>
    
    <td>
      <div>
        <?=$row['book_category']?>
      <div>
    </td>
  </tr>
<?php
  }
}
?>

</table>

</div>

</div>

</body>
</html>