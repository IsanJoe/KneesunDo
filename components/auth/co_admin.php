<?php require "../../dynamic/top.php"; ?>
<?php require "../../config/config.php"; ?>

<section class="Register container-fluid">
    <div class="row">
        <div class="col-lg-5 col-12 d-flex justify-content-lg-center justify-content-between flex-lg-column flex-row align-items-center" id="registerFirstColumn">
            <img src="http://localhost/KneesunDo/asset/img/logoWhite.png" alt="Kneesun Do Logo">
            <div class="mt-3 text-center">
                <a href="http://localhost/KneesunDo/components/pages/admin_dashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                <p class="mt-2 text-light fw-bold text-center">Dashboard</p>
            </div>
        </div>
        <div class="col-lg-7 col-12 d-flex justify-content-center flex-column align-items-center" id="registerSecondColumn">

            <!--TODO: DYNAMIC DATA -->
            <?php
            // //TODO: This will prevent to go in co_admin.php if not a registered admin
            if (isset($_SESSION['username'])) {
            } else {
                header("location: http://localhost/KneesunDo/index.php");
            }

            // TODO: This is the argument after clicking the register button
            if (isset($_POST['submit'])) {
                if ($_POST['email'] == '' or $_POST['username'] == '' or $_POST['password'] == '') {
                    echo "
                    <div id='Alert' class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <span class='fw-semibold'>You should check in on some of those fields below.</span> 
                        <button type='button' class='btn-close bg-transparent text-dark' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    ";
                } else {
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $insert = $conn->prepare("INSERT INTO admin_user (admin_email, admin_username, admin_password) VALUES(:admin_email, :admin_username, :admin_password)");

                    $insert->execute([
                        ':admin_email' => $email,
                        ':admin_username' => $username,
                        ':admin_password' => $password,
                    ]);

                    header("location: ../pages/admin_dashboard.php");
                }
            }
            ?>


            <form method="POST" action="co_admin.php" class="registerForm">
                <h1>Co-Admin</h1>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="form2Example1" class="form-control" />
                </div>
                <!-- Username input -->
                <div class="form-outline mb-4">
                    <label for="username">Full Name</label>
                    <input type="" name="username" id="form2Example1" class="form-control" />
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="form2Example2" class="form-control" />
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Add</button>
            </form>
        </div>
    </div>
</section>

<?php require "../../dynamic/foot.php" ?>