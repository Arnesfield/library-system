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
  <i class="material-icons small">verified_user</i>
  Manage System Users
</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
  <?php include_once('html/form-query.html'); ?>
</form>

<?php
  // check if get is set
  $condition = " AND 1 = 1";
  if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($conn, strip_tags($_GET['q']));
    $condition .= " AND LOWER(username) LIKE LOWER('%$q%')";
  }
?>

<?php
  // get admins
  $admins_query = "
    SELECT * FROM users
    WHERE type = 'admin'
    $condition
  ";
  
  $sql = mysqli_query($conn, $admins_query) or die(mysql_error());
?>

<form action="admin-action-admin.php" method="post" class="form-fab">
  <input type="hidden" name="is_admin" value="<?php echo $admin; ?>" />
  
  <button type="submit" name="add-admin"
    class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored my-card-2">
    <i class="material-icons fab">add</i>
  </button>
</form>

<div class="my-center">

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp m-top-3">

  <tr>
    <th></th>
    <th>Username</th>
    <th>Active</th>
  </tr>

<?php
if (mysqli_num_rows($sql) > 0) {
  for ($i = 0; $row = mysqli_fetch_array($sql, MYSQLI_ASSOC); $i++) {
?>
  <tr>
  
    <td>
      <div>
        <form action="admin-action-admin.php" method="post">
          <input type="hidden" name="uid" value="<?php echo $row['id']; ?>" />
          <input type="hidden" name="is_admin" value="<?php echo $admin; ?>" />
          
          <label class="mdl-icon-toggle mdl-js-icon-toggle mdl-js-ripple-effect" for="submit-icon-<?php echo $row['id']; ?>">
            <input type="submit" id="submit-icon-<?php echo $row['id']; ?>" name="modify-admin"
              class="mdl-icon-toggle__input">
            <i class="mdl-icon-toggle__label material-icons">edit</i>
          </label>
          
        </form>
      </div>
    </td>
  
    <td>
      <div>
        <?=$row['username']?>
      <div>
    </td>
    
    <td>
      <div>
        <?php echo $row['status'] == 1 ? "Yes": "No"; ?>
      </div>
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