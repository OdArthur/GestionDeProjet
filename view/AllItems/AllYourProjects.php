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
            <h2 class="mb-4">All Your Projects</h2>

            <hr>
            <div class=".container-lg p-3">
                <div>
                    <?php foreach ($OwnedProjects as $Project_ID => $Project): 
                        if($Project_ID%3==0){
                            echo"</div>";
                            echo"<div class='row'>";

                        }?>
                            <div class="col-4">
                                <form action="project.php" method="POST">
                                    <button class="btn btn-light container-fluid mb-1" value="<?= $Project['ID'] ?>" name="PassedProjectId">
                                    <?= $Project['Title']; ?>
                                    </button>
                                </form>
                            </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</body>

</html>