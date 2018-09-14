<?php include_once('html/top.php'); ?>
<?php
  session_start();
  $admin = true;
  require_once('php/redirect.php');
  require_once('html/welcome-header.php');
?>

<?php
  require_once('html/nav.php');
  require_once('php/db-connection.php');
?>

<?php
  if (isset($_POST['modify-user'])) {
    $action_name = "modify-user";
    
    $uid = $_POST['uid'];
    // fetch username
    
    $query = "
      SELECT * FROM users
      WHERE
        type = 'normal' AND
        id = $uid
    ";
    
    $record = $conn->query($query);
    $row = $record->fetch_assoc();
    
    $username = $row['username'];
    $year_level = $row['year_level'];
    $student_no = $row['student_no'];
    $active = $row['status'] == '1';
    
    $submit_name = "Modify";
  }
  else if (isset($_POST['add-user'])) {
    $action_name = "add-user";
    $username = "";
    $year_level = "";
    $student_no = "";
    $active = true;
    $submit_name = "Add";
  }
  else {
    // header('location: admin-manage-users.php');
    echo "<script>window.location.href='admin-manage-users.php';</script>";
    return;
  }
  
  if (isset($_POST['Add'])) {
    $action_name = $_POST['add-user'];
    $username = $_POST['username'];
    $year_level = $_POST['year_level'];
    $student_no = $_POST['student_no'];
    $active = isset($_POST['status']);
  }
  
  $title = $submit_name . ' Student';
?>

<div class="content">

<h2 class="t-secondary">
  <i class="material-icons small">supervisor_account</i>
  <?php echo $title; ?>
</h2>

<div class="my-center">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
  class="enlarge my-w-11 my-m-b">
  <input type="hidden" name="uid"
    value="<?php echo $action_name == 'modify-user' ? $row['id'] : ''; ?>" />
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
          maxlength="50" <?php echo $action_name == 'add-user' ? "required": ""; ?> />
        <label class="mdl-textfield__label" for="new_password">New Password</label>
      </div>
    </div>
    
    <div>
      <i class="no- material-icons small t-theme">work</i>&nbsp;&nbsp;
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label my-w-m">
        <input class="mdl-textfield__input my-w-m" type="text" id="student_no" name="student_no"
          pattern="^[\d]{9}$" maxlength="50" value="<?php echo $student_no; ?>" required />
        <label class="mdl-textfield__label" for="student_no">Student Number</label>
      </div>
    </div>
    
    <div>
      <i class="no- material-icons small t-theme">school</i>&nbsp;&nbsp;
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <select class="mdl-textfield__input" id="year_level" name="year_level">
          <?php for ($i = 1; $i <= 4; $i++) { ?>
            <option value="<?=$i?>" <?php echo $year_level == $i ? 'selected' : ''; ?>><?=$i?></option>
          <?php } ?>
        </select>
        <label class="mdl-textfield__label" for="year_level">Year Level</label>
      </div>
    </div>
    
    <div>
      <p class="my-m-b-1"><em>Note: To activate or deactivate a student.</em></p>
      <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="status">
        <input type="checkbox" id="status" name="status"
          class="mdl-checkbox__input" <?php echo $active ? "checked" : ""; ?>>
        <span class="mdl-checkbox__label">Active</span>
      </label>
    </div>
  
  </div>
  
  <div class="mdl-card__actions mdl-card--border my-p">
  
    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"
      href="admin-manage-users.php">
      Cancel
    </a>
    
    <button type="submit" name="<?php echo $submit_name; ?>"
      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
      <i class="material-icons"><?php echo $action_name == 'add-user' ? 'add' : 'edit'; ?></i>
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
    $year_level = mysqli_real_escape_string($conn, strip_tags($_POST['year_level']));
    $student_no = mysqli_real_escape_string($conn, strip_tags($_POST['student_no']));
    $status = isset($_POST['status']) ? '1': '0';
    
    $query = "
      SELECT username FROM users
      WHERE username = '$username'
    ";
    
    $record = $conn->query($query);
    $num_rows = $record->num_rows;
    
    $query = "
      SELECT student_no FROM users
      WHERE student_no = '$student_no'
    ";
    
    $record = $conn->query($query);
    $student_no_rows = $record->num_rows;
    
  }
  
  if (isset($_POST['Modify'])) {
    
    
    $query = "
      SELECT username FROM users
      WHERE id = $uid
    ";
    
    $record = $conn->query($query);
    $orig_username = $record->fetch_assoc()['username'];
    
    $query = "
      SELECT student_no FROM users
      WHERE id = $uid
    ";
    
    $record = $conn->query($query);
    $orig_stud_no = $record->fetch_assoc()['student_no'];
    
    // if 1 row returned, continue
    if ($num_rows == 1) {
      if ($username != $orig_username) {
        $msg = "Username exists.";
        include_once('html/log-message.php');
        return;
      }
    }
    if ($student_no_rows == 1) {
      if ($student_no != $orig_stud_no) {
        $msg = "Student Number exists.";
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
        year_level = $year_level,
        student_no = '$student_no',
        status = '$status'
        $condition
      WHERE
        id = $uid
    ";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->close();
    
    // header('Location: admin-manage-users.php');
    echo "<script>window.location.href='admin-manage-users.php';</script>";
    return;
  }
  else if (isset($_POST['Add'])) {
    
    if ($num_rows == 1) {
      $msg = "Username exists.";
      include_once('html/log-message.php');
      return;
    }
    if ($student_no_rows == 1) {
      $msg = "Student Number exists.";
      include_once('html/log-message.php');
      return;
    }
    
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "
      INSERT INTO users(username, password, year_level, student_no, type, status)
      VALUES(?, ?, ?, ?, 'normal', ?)
    ";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssiss", $username, $password, $year_level, $student_no, $status);
    $stmt->execute();
    $stmt->close();
    
    // header('location: admin-manage-users.php');
    echo "<script>window.location.href='admin-manage-users.php';</script>";
    return;
  }
?>

</div>

</body>
</html>