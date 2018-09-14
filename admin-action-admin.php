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

<?php
  if (isset($_POST['modify-admin'])) {
    $action_name = "modify-admin";
    
    $uid = $_POST['uid'];
    // fetch username
    
    $query = "
      SELECT * FROM users
      WHERE
        type = 'admin' AND
        id = $uid
    ";
    
    $record = $conn->query($query);
    $row = $record->fetch_assoc();
    
    $username = $row['username'];
    $active = $row['status'] == '1';
    
    $submit_name = "Modify";
  }
  else if (isset($_POST['add-admin'])) {
    $action_name = "add-admin";
    $username = "";
    $active = true;
    $submit_name = "Add";
  }
  else {
    // header('location: admin-manage-admins.php');
    echo "<script>window.location.href='admin-manage-admins.php';</script>";
    return;
  }
  $title = $submit_name . ' System User';
?>

<div class="content">

<h2 class="t-secondary">
  <i class="material-icons small">verified_user</i>
  <?php echo $title; ?>
</h2>

<div class="my-center">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
  class="enlarge my-w-11 my-m-b">
  <input type="hidden" name="uid"
    value="<?php echo $action_name == 'modify-admin' ? $row['id'] : ''; ?>" />
  <input type="hidden" name="<?php echo $action_name; ?>" value="<?php echo $action_name; ?>" />
  
  <div class="mdl-card__supporting-text my- --w-11 -p-b">
  
    <div>
      <i class="no- material-icons small t-theme">account_circle</i>&nbsp;&nbsp;
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label my-w-m">
        <input class="mdl-textfield__input my-w-m" type="text" id="username" name="username"
          maxlength="50" value="<?php echo $username; ?>" required />
        <label class="mdl-textfield__label" for="username">Username</label>
      </div>
    </div>
    
    <div>
      <i class="no- material-icons small t-theme">vpn_key</i>&nbsp;&nbsp;
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="password" id="new_password" name="new_password"
          maxlength="50" <?php echo $action_name == 'add-admin' ? "required": ""; ?> />
        <label class="mdl-textfield__label" for="new_password">New Password</label>
      </div>
    </div>
    
    <?php
      if (isset($uid) && $uid != $_SESSION['user_id']) {
    ?>
    <div>
      <p class="my-m-b-1"><em>Note: To activate or deactivate a system admin.</em></p>
      <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="status">
        <input type="checkbox" id="status" name="status"
          class="mdl-checkbox__input" <?php echo $active ? "checked" : ""; ?>>
        <span class="mdl-checkbox__label">Active</span>
      </label>
    </div>
    <?php } ?>
    
  </div>
  
  
  <div class="mdl-card__actions mdl-card--border my-p">
  
    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"
      href="admin-manage-admins.php">
      Cancel
    </a>
    
    <button type="submit" name="<?php echo $submit_name; ?>"
      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
      <i class="material-icons"><?php echo $action_name == 'add-admin' ? 'add' : 'edit'; ?></i>
      <?php echo $submit_name; ?>
    </button>
  
  </div>
  
</form>

</div>

<?php
  if (isset($_POST['Modify']) || isset($_POST['Add'])) {
    // check if username exists
    
    $username = mysqli_real_escape_string($conn, strip_tags($_POST['username']));
    $password = mysqli_real_escape_string($conn, strip_tags($_POST['new_password']));
    $status = isset($_POST['status']) ? '1': '0';
    if (!(isset($uid) && $uid != $_SESSION['user_id'])) {
      $status = '1';
    }
    
    $query = "
      SELECT username FROM users
      WHERE username = '$username'
    ";
    
    $record = $conn->query($query);
    $row = $record->fetch_assoc();
    $num_rows = $record->num_rows;
    
  }
  
  if (isset($_POST['Modify'])) {
    
    
    $query = "
      SELECT username FROM users
      WHERE id = $uid
    ";
    
    $record = $conn->query($query);
    $orig_username = $record->fetch_assoc()['username'];
    
    // if 1 row returned, continue
    if ($num_rows == 1) {
      if ($username != $orig_username) {
        $msg = "Username exists";
        include_once('html/log-message.php');
        return;
      }
    }
    
    
    
    $condition = "";
    
    if (!empty($_POST['new_password'])) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $condition = ", password = '$password'";
    }
    
    $query = "
      UPDATE users
      SET
        username = '$username',
        status = '$status'
        $condition
      WHERE
        id = $uid
    ";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->close();
    
    // header('location: admin-manage-admins.php');
    echo "<script>window.location.href='admin-manage-admins.php';</script>";
    return;
  }
  else if (isset($_POST['Add'])) {
    
    if ($num_rows == 1) {
      $msg = "Username exists";
      include_once('html/log-message.php');
      return;
    }
    
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "
      INSERT INTO users(username, password, type, status)
      VALUES(?, ?, 'admin', ?)
    ";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $password, $status);
    $stmt->execute();
    $stmt->close();
    
    // header('location: admin-manage-admins.php');
    echo "<script>window.location.href='admin-manage-admins.php';</script>";
    return;
  }
?>

</div>

</body>
</html>