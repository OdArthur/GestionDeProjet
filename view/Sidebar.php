<nav id="sidebar" class="">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary p-2">
            <span class="material-symbols-outlined d-flex">
                menu
            </span>
        </button>
    </div>
    <div class="p-4">
        <h1><a href="../public/main.php" class="logo">Organize, Create and Control</a></h1>
        <ul class="list-unstyled components mb-5">

            <div class="accordion" id="accordionPanelsStayOpenExample">


                <div class="accordion-item"
                    style="display : <?php echo 2 == $_SESSION['Privilege'] ? 'block' : 'none' ?>;">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseOne">
                            User
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">

                            <?php
                            if (5 < sizeof($Users)) {
                                $PreviewUsers = array_reverse(array_slice($Users, count($Users) - 5, count($Users), true));

                            } else {
                                $PreviewUsers = array_reverse($Users);
                            }
                            foreach ($PreviewUsers as $User_ID => $User): ?>
                            <li>
                            <form action="edituser.php" method="POST">
                                <button
                                    class="btn btn-light container-fluid mb-1 text-dark" value="<?= $User['ID'] ?>" name="PassedUserId">
                                    <?= $User['Username']; ?>
                                </button>
                            </form>
                            </li>
                            <?php endforeach;
                            if (5 < sizeof($Users)) {
                                echo "<a class=\"btn btn-dark container-fluid mb-1\" href=\"AllUsers.php\" role=\"button\">All user</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class=" accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                                            aria-controls="panelsStayOpen-collapseTwo">
                                            Your Project
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                        aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body">
                                            <?php
                            //include(__DIR__ . '/../model/GetYourProject.php');
                            if (5 < sizeof($OwnedProjects)) {
                                $YourProjects = array_reverse(array_slice($OwnedProjects, count($OwnedProjects) - 5, count($OwnedProjects), true));
                            } else {
                                $YourProjects = array_reverse($OwnedProjects);
                            }
                            foreach ($YourProjects as $OwnedProject_ID => $Project): ?>
                            <li>
                            <form action="project.php" method="POST">
                                <button 
                                    class="btn btn-light container-fluid mb-1 text-dark" value="<?= $Project['ID'] ?>" name="PassedProjectId">
                                    <?= $Project['Title']; ?>
                                </button>
                            </form>
                            </li>
                            <?php endforeach;
                            if (5 < sizeof($OwnedProjects)) {
                                echo "<a class=\"btn btn-dark container-fluid mb-1\" href=\"AllYourProjects.php\" role=\"button\">All your projet</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item"
                    style="display : <?php echo 0 == $_SESSION['Privilege'] ? 'none' : 'block' ?>;">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            All Project
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">

                            <?php
                            if (5 < sizeof($Projects)) {
                                $PreviewProjects = array_reverse(array_slice($Projects, count($Projects) - 5, count($Projects), true));
                            } else {
                                $PreviewProjects = array_reverse($Projects);
                            }
                            foreach ($PreviewProjects as $Project_ID => $Project): ?>
                            <li>
                                <form action="project.php" method="POST">
                                    <button
                                        class="btn btn-light container-fluid mb-1 text-dark" value="<?= $Project['ID'] ?>" name="PassedProjectId">
                                        <?= $Project['Title']; ?>
                                    </button>
                                </form>
                            </li>
                            <?php endforeach;
                            if (5 < sizeof($Projects)) {
                                echo "<a class=\"btn btn-dark container-fluid mb-1\" href=\"AllProjects.php\" role=\"button\">All projet</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </ul>

        <div class="footer align-bottom">
            <div class="d-flex flex-row justify-content-around align-items-end bd-highlight mb-3">
                <a class="btn btn-dark container-fluid" href="createuser.php" role="button"
                    style="display : <?php echo 2 == $_SESSION['Privilege'] ? 'block' : 'none' ?>;">+ User</a>
                <a class="btn btn-dark container-fluid" href="createproject.php" role="button"
                    style="display : <?php echo 0 == $_SESSION['Privilege'] ? 'none' : 'block' ?>;">+ Project</a>
            </div>
        </div>
    </div>
</nav>