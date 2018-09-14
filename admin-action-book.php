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
  if (isset($_POST['modify-book'])) {
    $action_name = "modify-book";
    
    $bid = $_POST['bid'];
    // fetch username
    
    $query = "
      SELECT * FROM books
      WHERE id = $bid
    ";
    
    $record = $conn->query($query);
    $row = $record->fetch_assoc();
    
    $book_title = $row['title'];
    $author = $row['author'];
    $category = $row['category'];
    $description = $row['description'];
    $image_path = $row['image_path'];
    $active = $row['status'] == '1' || $row['status'] == '2';
    $temp_status = $row['status'];
    
    $submit_name = "Modify";
  }
  else if (isset($_POST['add-book'])) {
    $action_name = "add-book";
    $book_title = '';
    $author = '';
    $category = '';
    $description = '';
    $image_path = '';
    $active = true;
    $temp_status = '1';
    $submit_name = "Add";
  }
  else {
    // header('location: admin-manage-books.php');
    echo "<script>window.location.href='admin-manage-books.php';</script>";
    return;
  }
  
  if (isset($_POST['Add'])) {
    $action_name = $_POST['add-book'];
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $active = isset($_POST['status']);
  }
  
  $title = $submit_name . ' Book';
?>

<div class="content">

<h2 class="t-secondary">
  <i class="material-icons small">library_books</i>
  <?php echo $title; ?>
</h2>

<div class="my-center">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"
  class="enlarge my-w-11 my-m-b">
  <input type="hidden" name="bid"
    value="<?php echo $action_name == 'modify-book' ? $row['id'] : ''; ?>" />
  <input type="hidden" name="<?php echo $action_name; ?>" value="<?php echo $action_name; ?>" />
  
  <div class="mdl-card__supporting-text my- --w-11 -p-b">
  
    <div>
      <i class="no- material-icons small t-theme">book</i>&nbsp;&nbsp;
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label my-w-m">
        <input class="mdl-textfield__input my-w-m" type="text" id="title" name="title"
          maxlength="255" value="<?php echo $book_title; ?>" required />
        <label class="mdl-textfield__label" for="title">Title</label>
      </div>
    </div>
    
    <div>
      <i class="no- material-icons small t-theme">account_circle</i>&nbsp;&nbsp;
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label my-w-m">
        <input class="mdl-textfield__input my-w-m" type="text" id="author" name="author"
          maxlength="255" value="<?php echo $author; ?>" required />
        <label class="mdl-textfield__label" for="author">Author</label>
      </div>
    </div>
    
    <div>
      <i class="no- material-icons small t-theme">collections_bookmark</i>&nbsp;&nbsp;
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label my-w-m">
        <input class="mdl-textfield__input my-w-m" type="text" id="category" name="category"
          maxlength="255" value="<?php echo $category; ?>" required />
        <label class="mdl-textfield__label" for="category">Category</label>
      </div>
    </div>
    
    <div class="textarea-cont">
      <i class="no- material-icons small t-theme textarea-icon">description</i>&nbsp;&nbsp;
      <i class="no- material-icons small t-theme hide">description</i>&nbsp;&nbsp;
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <textarea type="text" rows="3" id="description" name="description"
          class="mdl-textfield__input" required ><?php echo $description; ?></textarea>
        <label class="mdl-textfield__label" for="description">Description</label>
      </div>
    </div>
    
    
    
    
    
    <div>
      <?php if ($action_name == 'modify-book') { ?>
      <div>
        Current Image
        <img class="curr-img" src="<?php echo $image_path;?>"/>
      </div>
      <?php } ?>
      
      <!--
      <div>
        <label for="image_path">Select image to upload:</label>
        <input type="file" name="image_path" id="image_path"
          <?php echo $action_name == 'modify-book' ? '': 'required'; ?>/>
      </div>
      -->
      
      <div>
        <div style="width: 36px;"
          class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file">
          <input type="file" id="image_path" name="image_path" class="hide"
            <?php echo $action_name == 'modify-book' ? '': 'required'; ?>>
          <label for="image_path"
            class="mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons fab-small">attach_file</i>
          </label>
        </div>
      
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--file mdl-textfield--floating-label my-w-m">
          <input class="mdl-textfield__input" type="text" id="image_upload" readonly value=" "/>
          <label class="mdl-textfield__label" for="image_upload">Image Upload</label>
        </div>
        
        <script>
          document.getElementById("image_path").onchange = function () {
            document.getElementById("image_upload").value = this.files[0].name;
          };
        </script>
        
      </div>
      
      <?php if ($action_name == 'modify-book') { ?>
      <div>
        <p><em>Note: leave empty to retain current image</em></p>
      </div>
      <?php } ?>
    </div>
  
    <div>
      <p class="my-m-b-1"><em>Note: To activate or deactivate a book. Disabled if borrowed.</em></p>
      <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="status">
        <input type="checkbox" id="status" name="status" class="mdl-checkbox__input"
          <?php echo $active ? "checked" : ""; ?>
          <?php echo $temp_status == '2' ? 'disabled' : '';?>>
        <span class="mdl-checkbox__label">Active</span>
      </label>
    </div>
  
  </div>
  
  <div class="mdl-card__actions mdl-card--border my-p">
  
    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"
      href="admin-manage-books.php">
      Cancel
    </a>
    
    <button type="submit" name="<?php echo $submit_name; ?>"
      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
      <i class="material-icons"><?php echo $action_name == 'add-book' ? 'add' : 'edit'; ?></i>
      <?php echo $submit_name; ?>
    </button>
  
  </div>
</form>

</div>

<?php
  if (isset($_POST['Modify']) || isset($_POST['Add'])) {
    $book_title = mysqli_real_escape_string($conn, strip_tags($_POST['title']));
    $author = mysqli_real_escape_string($conn, strip_tags($_POST['author']));
    $category = mysqli_real_escape_string($conn, strip_tags($_POST['category']));
    $description = mysqli_real_escape_string($conn, strip_tags($_POST['description']));
    
    if (!empty($_FILES["image_path"]["name"])) {
      $file_name=$_FILES["image_path"]["name"];
      $temp_name=$_FILES["image_path"]["tmp_name"];
      $imgtype=$_FILES["image_path"]["type"];
      $imageFileType = pathinfo($file_name, PATHINFO_EXTENSION);
      
      if($imageFileType != "jpg" &&
         $imageFileType != "png" &&
         $imageFileType != "jpeg" &&
         $imageFileType != "gif" ) {
          $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          include_once('html/log-message.php');
          return;
      }
      
      $image_path = 'upload/images/IMG_' . date("d-m-Y") . "_" . time() . '.' . $imageFileType;
      
      if(move_uploaded_file($temp_name, $image_path)) {
        // moved
      } else {
        $msg = "Error while uploading image on the server.";
        include_once('html/log-message.php');
        return;
      }

    }
    
    
    $status = isset($_POST['status']) ? '1': '0';
    
    if ($temp_status == '2') {
      $status = '2';
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
    $condition = '';
    
    if (!empty($_FILES["image_path"]["name"])) {
      $condition = ", image_path = '$image_path'";
    }
    
    $query = "
      UPDATE books
      SET
        title = '$book_title',
        author = '$author',
        category = '$category',
        description = '$description',
        status = '$status'
        $condition
      WHERE
        id = $bid
    ";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->close();
    
    // header('location: admin-manage-books.php');
    echo "<script>window.location.href='admin-manage-books.php';</script>";
    return;
  }
  else if (isset($_POST['Add'])) {
    
    $query = "
      INSERT INTO books(title, author, category, description, image_path, status)
      VALUES(?, ?, ?, ?, ?, ?)
    ";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $book_title, $author, $category, $description, $image_path, $status);
    $stmt->execute();
    $stmt->close();
    
    // header('location: admin-manage-books.php');
    echo "<script>window.location.href='admin-manage-books.php';</script>";
    return;
  }
?>

</div>

</body>
</html>