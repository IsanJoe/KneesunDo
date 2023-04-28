<?php require "../../dynamic/navbar.php" ?>
<?php require "../../config/config.php"; ?>

<section class="projectBanner d-flex flex-md-row flex-column align-items-center justify-content-center gap-3">
    <div class="text-center order-lg-0 order-1">
        <h1 class="text-light">Contact Me</h1>
        <p class="text-light">Needing help with a new project? <br> Or just want to pick my ideas out of my brain. <br> I'm here for you!</p>
    </div>
    <div class="order-lg-1 order-0">
        <img src="../../asset/img/c.png" alt="Contact">
    </div>
</section>

<?php

if (isset($_POST['submit'])) {
    if ($_POST['sender'] == '' or $_POST['company_name'] == '' or $_POST['email'] == '' or $_POST['locations'] == '' or $_POST['messages'] == '') {
        echo "<div class='alert alert-danger text-center text-dark' role='alert'>Please enter a data for all the data inputs.</div>";
    } else {
        $sender = $_POST['sender'];
        $company_name = $_POST['company_name'];
        $email = $_POST['email'];
        $locations = $_POST['locations'];
        $messages = $_POST['messages'];
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['username'];


        $insert = $conn->prepare("INSERT INTO contacts (sender, company_name, email, locations, messages, user_id, user_name) VALUES (:sender, :company_name, :email, :locations, :messages, :user_id, :user_name)");
        $insert->execute([
            ':sender' => $sender,
            ':company_name' => $company_name,
            ':email' => $email,
            ':locations' => $locations,
            ':messages' => $messages,
            ':user_id' => $user_id,
            ':user_name' => $user_name,
        ]);
        echo "
        <div id='Alert' class='alert alert-primary alert-dismissible fade show' role='alert'>
            <span class='fw-semibold'>Your message sent! Thank you for reaching.</span> 
            <button type='button' class='btn-close bg-transparent text-dark' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
}


?>

<?php if (isset($_SESSION['user_id']) and $_SESSION['user_id']) : ?>

    <section class="container d-flex justify-content-center">
        <form method="POST" action="contact.php" id="formContact">

            <div class="row">
                <div class="col-12 d-md-flex d-block justify-content-center gap-3 mt-4 text-center">
                    <input class="d-md-block d-inline-flex" type="text" name="sender" placeholder="Name*" required>
                    <input class="d-md-block d-inline-flex mt-md-0 mt-4" type="text" name="company_name" placeholder="Company Name*" required>
                </div>
                <div class="col-12 d-md-flex d-block justify-content-center gap-3 mt-4 text-center">
                    <input class="d-md-block d-inline-flex" type="email" name="email" placeholder="Email*" required>
                    <input class="d-md-block d-inline-flex mt-md-0 mt-4" type="text" name="locations" placeholder="Location*" required>
                </div>
            </div>
            <textarea class="d-md-block d-inline-flex mt-4" type="text" name="messages" rows="15" placeholder="Message*" required></textarea>
            <div class="mt-4">
                <button class="d-md-block d-inline-flex" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </section>

<?php else : ?>

    <section class="container d-flex justify-content-center">
        <div id="formContact">
            <div class="text-center">
                <img class="w-50" src="../../asset/img/contact/a.png" alt="">
            </div>
            <h3 class="fw-semibold text-center mt-4">You must login before you can contact me.</h3>
            <div class="mt-4">
                <a class="text-decoration-none" href="http://localhost/KneesunDo/components/auth/login.php">
                    <button class="d-md-block d-inline-flex">Login</button>
                </a>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php require "../../dynamic/footer.php" ?>