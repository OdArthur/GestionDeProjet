<!DOCTYPE html>
<!-- saved from url=(0056)https://colorlib.com/etc/bootstrap-sidebar/sidebar-03/?# -->
<html lang="en" data-lt-installed="true">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>OCC</title>
  <link rel="shortcut icon" href="../Assets/IconOCC.png" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <?php
    include __DIR__ . '/../Sidebar.php';
    ?>

    <div id="content" class="p-4 p-md-5 pt-5">
      <h2 class="mb-4">Edit user: <?= $WorkingUser[0]['Username'] ?></h2>
      <hr>
      <form method="POST" action="edituser.php">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="text" name="username" placeholder="<?= $WorkingUser[0]['Username'] ?>" class="form-control" id="inputusername" aria-describedby="UsernameAre">
        </div>
        <div class="mb-3">
          <label for="inputpassword" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="InputPassord">
          <div id="username" class="form-text">Leave it blank if you don't want to change it.</div>
        </div>
        <div class="mb-3">
          <label for="inputpassword" class="form-label">Role</label>
          <div class="mb-3 form-check">
            <select name="privilege" class="form-select" aria-label="Default select grade">
              <option <?php echo 0 == $WorkingUser[0]['Privilege'] ? 'selected' : '' ?> value="0">Employee</option>
              <option <?php echo 1 == $WorkingUser[0]['Privilege'] ? 'selected' : '' ?> value="1">Manager</option>
              <option <?php echo 2 == $WorkingUser[0]['Privilege'] ? 'selected' : '' ?> value="2">Admin</option>
            </select>
          </div>
        </div>

        <input type="hidden" name="PastUsername" value="<?= $WorkingUser[0]['Username'] ?>">
        <input type="hidden" name="PassedUserId" value="<?= $WorkingUser[0]['ID'] ?>">

        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
  </div>
  </div>
</body>

</html>