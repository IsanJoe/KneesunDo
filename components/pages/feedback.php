<?php require "../../dynamic/top.php" ?>
<?php require "../../config/config.php" ?>

<section class=" container-fluid" id="admin_project">
    <div class="row">
        <div class="col-lg-5 col-12 d-flex justify-content-lg-center justify-content-between flex-lg-column flex-row align-items-center order-lg-1 order-0" id="registerFirstColumn">
            <img src="http://localhost/KneesunDo/asset/img/logoWhite.png" alt="">
            <div class="mt-3 text-center">
                <a href="http://localhost/KneesunDo/index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                <p class="mt-2 text-light fw-bold text-center">Home</p>
            </div>
        </div>
        <div class="col-lg-7 col-12 d-flex justify-content-center flex-column align-items-center order-lg-0 order-1" id="registerSecondColumn">


            <form method="POST" action="feedback.php" id="projectForm" enctype="multipart/form-data">
                <!-- <p class="fw-semibold text-danger">Please input all the desired data. Thank you!</p> -->
                <h1 class="fw-bold">Your Feedback Matters!</h1>

                <?php

                if (isset($_POST['submit'])) {
                    if ($_POST['fullName'] == '' or $_POST['messages'] == '') {
                        echo "
                        <div id='Alert' class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <span class='fw-semibold'>You should check in on some of those fields below.</span> 
                            <button type='button' class='btn-close bg-transparent text-dark' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                    } else {
                        $fullName = $_POST['fullName'];
                        $messages = $_POST['messages'];
                        $img = $_FILES['img']['name'];

                        $dir = 'feedbacks/' . basename($img);

                        $insert = $conn->prepare("INSERT INTO feedbacks (fullName, messages, img ) VALUES (:fullName, :messages, :img)");
                        $insert->execute([
                            ':fullName' => $fullName,
                            ':messages' => $messages,
                            ':img' => $img,
                        ]);
                        if (move_uploaded_file($_FILES['img']['tmp_name'], $dir)) {
                            echo "
                            <div id='Alert' class='alert alert-primary alert-dismissible fade show' role='alert'>
                                <span class='fw-semibold'>Your feedback is now added to the site.</span> 
                                <button type='button' class='btn-close bg-transparent text-dark' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                        }
                    }
                }
                ?>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label for="fullName">Full Name</label>
                    <input type="text" name="fullName" id="form2Example1" class="form-control" maxlength="25" />
                </div>
                <div class="form-outline mb-4">
                    <label for="messages">Message</label>
                    <textarea type="text" name="messages" id="form2Example1" class="form-control" rows="10" maxlength="200"></textarea>
                </div>
                <div class="form-outline mb-4">
                    <label for="img">Photo</label>
                    <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" required />
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Submit</button>
                <!-- Register buttons -->
            </form>
        </div>
    </div>
</section>

<?php require "../../dynamic/foot.php" ?>