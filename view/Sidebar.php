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
            <!-- <li class="active">
      <a href="https://colorlib.com/etc/bootstrap-sidebar/sidebar-03/?#"><span class="fa fa-home mr-3"></span>
        Users</a>
    </li>
    <li>
      <a href="https://colorlib.com/etc/bootstrap-sidebar/sidebar-03/?#"><span class="fa fa-user mr-3"></span>
        Your projet</a>
    </li>
    <li>
      <a href="https://colorlib.com/etc/bootstrap-sidebar/sidebar-03/?#"><span
          class="fa fa-briefcase mr-3"></span> All Projet</a>
    </li> -->

            <div class="accordion" id="accordionPanelsStayOpenExample">


                <div class="accordion-item"
                    style="display : <?php echo 2 == $_SESSION['Privilege'] ? 'block' : 'none' ?>;">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseOne">
                            User
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">

                            <?php foreach ($Users as $User_ID => $User): ?>
                            <li>
                                <button type="button" class="btn btn-light container-fluid mb-1">
                                    <?= $User['Username']; ?>
                                </button>
                            </li>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseTwo">
                            Your Projet
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                               <?php 
                               //include(__DIR__ . '/../model/GetYourProject.php');
                               foreach($OwnedProjects as $OwnedProject_ID =>$Project):?>
                            <li>
                                <button type="button" class="btn btn-light container-fluid mb-1">
                                    <?= $Project['Title']; ?>
                                </button>
                            </li>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            All Projet
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">

                            <?php foreach ($Projects as $Project_ID => $Project): ?>
                            <li>
                                <button type="button" class="btn btn-light container-fluid mb-1">
                                    <?= $Project['Title']; ?>
                                </button>
                            </li>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </ul>

        <div class="footer align-bottom">
            <div class="d-flex flex-row justify-content-around align-items-end bd-highlight mb-3">
                <a class="btn btn-dark container-fluid" href="createuser.php" role="button">+ User</a>
                <a class="btn btn-dark container-fluid" href="createprojet.php" role="button">+ Projet</a>
            </div>
        </div>
    </div>
</nav>