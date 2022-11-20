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
            <h2 class="mb-4">Project: "Project name" manage by "manager name"</h2>
            <p>I'm the project desctiption set by the manager of this project</p>
            
            <div class="footer align-bottom">
            <div class="d-flex flex-row justify-content-around align-items-end bd-highlight mb-3">
            <a href="editproject.php" role="button" class="btn btn-primary d-grid gap-2 col-3 mx-auto">Edit</a>
            <a href="editproject.php" role="button" class="btn btn-primary d-grid gap-2 col-3 mx-auto">remove</a>
            </div>
            </div>
        </div>
    </div>
</body>

</html>