<?php require "../../dynamic/top.php"; ?>

<body>

    <!-- TODO: NAVIGATION BAR -->

    <nav class="fixed-top">
        <div class="p-3 text-white" style="background-color: #4158D0; background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);">
            <div class="flexMain">
                <div class="flex1">
                </div>
                <div class="flex2 text-center">
                    <div style="font-size: 16px; font-weight: 500;">DASHBOARD</div>
                </div>
                <div class="flex1">
                </div>
            </div>
        </div>
        <div id="menuHolder">
            <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
                <div class="flexMain">
                    <div class="flex2">
                        <button class="whiteLink siteLink fw-bold" style="border-right:1px solid #eaeaea" onclick="menuToggle()"><i class="fas fa-bars me-2"></i><span class="d-md-inline-block d-none">MENU</span></button>
                    </div>
                    <a href="http://localhost/KneesunDo/index.php">
                        <div class="text-center d-sm-inline-block d-none">
                            <!-- FIXME: CHANGE ME -->
                            <img id="siteBrand" src="http://localhost/KneesunDo/asset/img/logo.png" alt="Kneesun Do Logo">
                        </div>
                    </a>
                    <a href="http://localhost/KneesunDo/index.php">
                        <div class="text-center d-sm-none d-inline-block">
                            <!-- FIXME: CHANGE ME -->
                            <img class="w-50" src="http://localhost/KneesunDo/asset/img/logo.png" alt="Kneesun Do Logo">
                        </div>
                    </a>

                    <!-- TODO: this will display if user login -->
                    <?php if (isset($_SESSION['username'])) : ?>
                        <!-- TODO: area below is reserve for account toggle is mobile -->
                        <div class="flex2 text-end d-block d-md-none">
                            <!-- <button class="whiteLink siteLink fs-1"><i class="fa fa-user-circle" aria-hidden="true"></i></button> -->
                            <div class="btn-group dropdown">
                                <button type="button" class="whiteLink siteLink dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user-circle fs-1" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/KneesunDo/components/auth/logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex2 text-end d-none d-md-block">
                            <!-- FIXME: CHANGE ME -->
                            <a href="#">
                                <button class="whiteLink siteLink fw-bold">
                                    <?php echo "Hello, " . $_SESSION['username']
                                    ?>
                                </button>
                            </a>

                            <!-- FIXME: CHANGE ME -->
                            <a href="http://localhost/KneesunDo/components/auth/logout.php">
                                <button class="blackLink siteLink fw-bold">Logout</button>
                            </a>
                        </div>

                        <!-- TODO: this will display if there is no login -->
                    <?php else : ?>
                        <!-- TODO: area below is reserve for account toggle is mobile -->
                        <div class="flex2 text-end d-block d-md-none">
                            <!-- <button class="whiteLink siteLink fs-1"><i class="fa fa-user-circle" aria-hidden="true"></i></button> -->
                            <div class="btn-group dropdown">
                                <button type="button" class="whiteLink siteLink dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-sign-in fs-1" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="http://localhost/KneesunDo/components/auth/register.php">Register</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/KneesunDo/components/auth/login.php">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex2 text-end d-none d-md-block">
                            <!-- FIXME: CHANGE ME -->
                            <a href="http://localhost/KneesunDo/components/auth/register.php">
                                <button class="whiteLink siteLink fw-bold">Register</button>
                            </a>

                            <!-- FIXME: CHANGE ME -->
                            <a href="http://localhost/KneesunDo/components/auth/login.php">
                                <button class="blackLink siteLink fw-bold">Login</button>
                            </a>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
            <div id="menuDrawer">
                <div class="p-4 border-bottom">
                    <div class='row'>
                        <div class="col text-end ">
                            <i class="fas fa-times" role="btn" onclick="menuToggle()"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <!-- FIXME: CHANGE ME -->
                    <a href="http://localhost/KneesunDo/components/pages/admin_dashboard.php" class="nav-menu-item d-flex gap-2 align-items-center">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="http://localhost/KneesunDo/components/auth/co_admin.php" class="nav-menu-item d-flex gap-2 align-items-center">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Add Co-Admin</span>
                    </a>
                    <a href="http://localhost/KneesunDo/components/pages/admin_project.php" class="nav-menu-item d-flex gap-2 align-items-center">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Add Projects</span>
                    </a>
                    <a href="http://localhost/KneesunDo/components/pages/admin_post.php" class="nav-menu-item d-flex gap-2 align-items-center">
                        <i class="fa fa-clipboard" aria-hidden="true"></i>
                        <span>Add Blog Post</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- TODO: END OF NAVIGATION BAR -->