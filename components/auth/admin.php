<?php require "../../dynamic/top.php"; ?>
<?php require "../../config/config.php"; ?>

<section class="Register container-fluid">
    <div class="row">
        <div class="col-lg-5 col-12 d-flex justify-content-lg-center justify-content-between flex-lg-column flex-row align-items-center order-lg-1 order-0" id="registerFirstColumn">
            <img src="http://localhost/KneesunDo/asset/img/logoWhite.png" alt="">
            <div class="mt-3 text-center">
                <a href="http://localhost/KneesunDo/index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                <p class="mt-2 text-light fw-bold text-center">Home</p>
            </div>
        </div>
        <div class="col-lg-7 col-12 d-flex justify-content-center flex-column align-items-center order-lg-0 order-1" id="registerSecondColumn">

            <?php
            //TODO: This will prevent to go in admin.php if it was already login
            if (isset($_SESSION['username'])) {
                header("location: http://localhost/KneesunDo/components/pages/admin_dashboard.php");
            }

            if (isset($_POST['submit'])) {
                if ($_POST['email'] == '' or $_POST['password'] == '') {
                    echo "
                    <div id='Alert' class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <span class='fw-semibold'>You should check in on some of those fields below.</span> 
                        <button type='button' class='btn-close bg-transparent text-dark' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    ";
                } else {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $login = $conn->query("SELECT * FROM admin_user WHERE admin_email = '$email' ");
                    $login->execute();

                    $row = $login->FETCH(PDO::FETCH_ASSOC);

                    if ($login->rowCount() > 0) {
                        if (password_verify($password, $row['admin_password'])) {
                            $_SESSION['username'] = $row['admin_username'];
                            $_SESSION['user_id'] = $row['id'];
                            header("location: http://localhost/KneesunDo/components/pages/admin_dashboard.php");
                        } else {
                            echo "
                            <div id='Alert' class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <span class='fw-semibold'>Sorry, you're not authorized to login.</span> 
                                <button type='button' class='btn-close bg-transparent text-dark' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                        }
                    } else {
                        echo "
                        <div id='Alert' class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <span class='fw-semibold'>Sorry, you're not authorized to login.</span> 
                            <button type='button' class='btn-close bg-transparent text-dark' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                    }
                }
            }
            ?>

            <form method="POST" action="admin.php" class="registerForm">
                <!-- <p>Welcome Back to Kneesun Do</p> -->
                <h1>Administration</h1>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label for="admin_email">Email</label>
                    <input type="email" name="email" id="form2Example1" class="form-control" />
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label for="admin_password">Password</label>
                    <input type="password" name="password" id="form2Example2" class="form-control" />
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>
                <!-- Register buttons -->
                <div class="text-center">
                    <p style="font-size: 35px; color:red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></p>
                    <p>Authorized Personnel Only!</p>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require "../../dynamic/foot.php" ?>