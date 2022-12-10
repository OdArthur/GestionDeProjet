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
      <h2 class="mb-4">Edit task: <?= $WorkingTask[0]['Title'] ?>
      </h2>
      <hr>
      <form method="POST" action="edittask.php">
        <div class="mb-3">
          <label for="ProjetName" class="form-label">Task name</label>
          <input type="text" placeholder="<?= $WorkingTask[0]['Title'] ?>" name="Title" class="form-control"
            id="inputprojectname" aria-describedby="ProjectName">
        </div>
        <div class="mb-3">
          <label for="ProjetDescription" class="form-label">Task Description</label>
          <input type="text" placeholder="<?= $WorkingTask[0]['Description'] ?>" name="Description"
            class="form-control" id="inputprojetdescription" aria-describedby="ProjetDescrip">
        </div>

        <button class="btn btn-primary" name="Edit">Edit</button>
        <input type="hidden" name="PassedTaskId" value="<?= $WorkingTask[0]['ID'] ?>">
        <input type="hidden" name="PastTitle" value="<?= $WorkingTask[0]['Title'] ?>">
        <input type="hidden" name="PastDescription" value="<?= $WorkingTask[0]['Description'] ?>">
      </form>

      <form method="POST" action="edittask.php">
      <input type="hidden" name="PassedTaskId" value="<?= $WorkingTask[0]['ID'] ?>">
      <button class="btn btn-primary d-grid" name="Remove">Remove</button>
      </form>

      <form method="POST" action="edittask.php">
        <div class="mb-3">
          <label for="ProjetOwner" class="form-label">Add user</label>
          <select class="form-select" aria-label="Default select example" name="User_ID">
            <?php foreach ($MissingUsers as $User_ID => $User):
            echo "<option value=" . $User['ID'] . ">" . $User['Username'] . "</option>";
          endforeach; ?>
          </select>
        </div>
        <input type="hidden" name="PassedTaskId" value="<?= $WorkingTask[0]['ID'] ?>">
        <button class="btn btn-primary" name="AddUser">Add</button>
      </form>


      <form method="POST" action="edittask.php">
        <div class="mb-3">
          <label for="ProjetOwner" class="form-label">Remove user</label>
          <select class="form-select" aria-label="Default select example" name="User_ID">
          <?php foreach ($WorkingUsers as $User_ID => $User):
            echo "<option value=" . $User['ID'] . ">" . $User['Username'] . "</option>";
          endforeach; ?>
          </select>
        </div>
        <input type="hidden" name="PassedTaskId" value="<?= $WorkingTask[0]['ID'] ?>">
        <button class="btn btn-primary" name="RemoveUser">Remove</button>
      </form>

    </div>
  </div>
</body>

</html>