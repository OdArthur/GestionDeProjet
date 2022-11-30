<!DOCTYPE html>
<!-- saved from url=(0056)https://colorlib.com/etc/bootstrap-sidebar/sidebar-03/?# -->
<html lang="en" data-lt-installed="true">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>OCC</title>
  <link rel="shortcut icon" href="../Assets/IconOCC.png" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body class="d-inline">
  <div class="wrapper d-flex align-items-stretch">
    <?php
    include __DIR__ . '/../Sidebar.php';
    ?>

    <div id="content" class="p-4 p-md-5 pt-5">
      <h2 class="mb-4">Edit projet: <?= $WorkingProject[0]['Title'] ?></h2>
      <hr>
      <form method="POST" action="editproject.php">
        <div class="mb-3">
          <label for="ProjetName" class="form-label">Project name</label>
          <input type="text" placeholder="<?= $WorkingProject[0]['Title'] ?>" name="Title" class="form-control" id="inputprojectname"
            aria-describedby="ProjectName">
        </div>
        <div class="mb-3">
          <label for="ProjetDescription" class="form-label">Project Description</label>
          <input type="text" placeholder="<?= $WorkingProject[0]['Description'] ?>" name="Description" class="form-control"
            id="inputprojetdescription" aria-describedby="ProjetDescrip">
        </div>
        <div class="mb-3">
        <label for="ProjetOwner" class="form-label">Manager of project</label>
        <select class="form-select" aria-label="Default select example" name="Owner_ID">
          <?php foreach($Managers as $Manager_ID => $Manager ):
            echo"<option ";
            if($Manager['ID'] == $WorkingProject[0]['Owner_ID'])
            {
              echo"selected ";
            }
            echo "value=" . $Manager['ID'];
            echo ">" . $Manager['Username'] . "</option>";
          endforeach; ?>
        </select>
        </div>

        <input type="hidden" name="PastTitle" value="<?= $WorkingProject[0]['Title'] ?>">
        <input type="hidden" name="PastDescription" value="<?= $WorkingProject[0]['Description'] ?>">
        <input type="hidden" name="ProjectID" value="<?= $WorkingProject[0]['ID'] ?>">

    <button type="submit" class="btn btn-primary">Edit</button>


    </form>
  </div>
  </div>
</body>

</html>