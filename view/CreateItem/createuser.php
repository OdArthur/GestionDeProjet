<!DOCTYPE html>
<!-- saved from url=(0056)https://colorlib.com/etc/bootstrap-sidebar/sidebar-03/?# -->
<html lang="en" data-lt-installed="true">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>OCC</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    
        <?php
        include __DIR__ . '/../Main/Sidebar.php';
        ?>

    <div id="content" class="p-4 p-md-5 pt-5">
      <form method="POST" action="AddUser.php">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" id="inputusername" aria-describedby="UsernameAre">
        </div>
        <div class="mb-3">
          <label for="inputpassword" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="InputPassord">
          <div id="username" class="form-text">We'll never share your Password with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="inputpassword" class="form-label">Rôle</label>
          <div class="mb-3 form-check">
            <select name="privilege" class="form-select" aria-label="Default select grade">
              <option selected value="0">Employé</option>
              <option value="1">Manager</option>
              <option value="2  ">Admin</option>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
  </div>
</body>

</html>