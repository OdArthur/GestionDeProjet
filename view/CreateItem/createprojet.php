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
        include __DIR__ . '/../Sidebar.php';
        ?>

    <div id="content" class="p-4 p-md-5 pt-5">
      <form method="POST" action="AddProject.php">
        <div class="mb-3">
          <label for="ProjetName" class="form-label">Projet name</label>
          <input type="text" name="Title" class="form-control" id="inputprojetname" aria-describedby="ProjetName">
        </div>
        <div class="mb-3">
          <label for="ProjetDescription" class="form-label">Projet Description</label>
          <input type="text" name="Description" class="form-control" id="inputprojetdescription" aria-describedby="ProjetDescrip">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>


      </form>
    </div>
  </div>
</body>

</html>