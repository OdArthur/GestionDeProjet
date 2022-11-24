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
      <h2 class="mb-4">Edit user: "user name"</h2>
      <hr>
      <form method="POST" action="AddUser.php">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="text" name="username" value="Current name" class="form-control" id="inputusername" aria-describedby="UsernameAre" required>
        </div>
        <div class="mb-3">
          <label for="inputpassword" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="InputPassord" required>
          <div id="username" class="form-text">Leave it blank if you don't want to change it.</div>
        </div>
        <div class="mb-3">
          <label for="inputpassword" class="form-label">Role</label>
          <div class="mb-3 form-check">
            <select name="privilege" class="form-select" aria-label="Default select grade">
              <option selected value="0">Employee</option>
              <option value="1">Manager</option>
              <option value="2  ">Admin</option>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
  </div>
  </div>
</body>

</html>