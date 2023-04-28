<?php require "../../dynamic/top.php"; ?>
<?php require "../../config/config.php"; ?>





<section class="Register container-fluid">
    <div class="row">
        <div class="col-lg-5 col-12 d-flex justify-content-lg-center justify-content-between flex-lg-column flex-row align-items-center" id="registerFirstColumn">
            <img src="http://localhost/KneesunDo/asset/img/logoWhite.png" alt="">
            <div class="mt-3">
                <a href="http://localhost/KneesunDo/index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                <p class="mt-2 text-light fw-bold text-center">HOME</p>
            </div>
        </div>
        <div class="col-lg-7 col-12 d-flex justify-content-center flex-column align-items-center" id="registerSecondColumn">

            <!--TODO: DYNAMIC DATA -->

            <?php

            // TODO: this will prevent by going in register.php if already login
            if (isset($_SESSION['username'])) {
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

                    $insert = $conn->prepare("INSERT INTO user (email, username, mypassword) VALUES(:email, :username, :mypassword)");

                    $insert->execute([
                        ':email' => $email,
                        ':username' => $username,
                        ':mypassword' => $password,
                    ]);

                    header("location: ./login.php");
                }
            }
            ?>


            <form method="POST" action="register.php" class="registerForm">
                <p>Welcome to Kneesun Do</p>
                <h1>Register Now!</h1>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="form2Example1" class="form-control" />
                </div>
                <!-- Username input -->
                <div class="form-outline mb-4">
                    <label for="username">Username</label>
                    <input type="" name="username" id="form2Example1" class="form-control" />
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="form2Example2" class="form-control" minlength="8" />
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-warning text-light  mb-4 text-center">Register</button>
                <!-- Register buttons -->
                <div class="text-center">
                    <p class="fw-semibold">Already a member? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</section>




<?php require "../../dynamic/foot.php" ?>