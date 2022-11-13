<nav id="sidebar" class="">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
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
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    User
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">

                                    <?php foreach ($Users as $User_ID => $User) : ?>
                                        <li>
                                            <button type="button" class="btn btn-light"> <?= $User['Username']; ?> </button>
                                        </li>
                                    <?php endforeach; ?>



<!-- 

                                    <li>
                                        <button type="button" class="btn btn-light">User1</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-light">User2</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-light">User3</button>
                                    </li> -->

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    Your Projet
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">

                                    

                                    <!--<li>
                                        <button type="button" class="btn btn-light">Projet 1</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-light">Projet 2</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-light">Projet 3</button>
                                    </li>-->

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    All Projet
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">

                                    <?php foreach ($Projects as $Project_ID => $Project) : ?>
                                        <li>
                                            <button type="button" class="btn btn-light"> <?= $Project['Title']; ?> </button>
                                        </li>
                                    <?php endforeach; ?>
                                    
<!--
                                    <li>
                                        <button type="button" class="btn btn-light">Projet 1</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-light">Projet 2</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-light">Projet 3</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-light">Projet 10</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-light">Projet 20</button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-light">Projet 30</button>
                                    </li>-->

                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary btn-dark" href="createuser.php" role="button">+ User</a>
                    <a class="btn btn-primary btn-dark" href="createprojet.php" role="button">+ Projet</a>

                </ul>

                <div class="footer">

                </div>
            </div>
        </nav>