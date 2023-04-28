<!--TODO: FOOTER-->
<footer>
    <div class="container">
        <div class="row">
            <!-- 1st column -->
            <div class="col-xl-8 col-lg-6 col-12 mt-5 text-lg-start text-center">
                <!-- FIXME: CHANGE ME -->
                <img class="logoWhite" src="http://localhost/KneesunDo/asset/img/logoWhite.png" alt="Logo image">
                <p class="text-light mt-3 paraFooter">I help business generate more revenue through strategic web design and development services.</p>
                <h6 class="text-light fw-bolder">Follow Me</h6>
                <h5 class="text-light d-flex gap-3 justify-content-lg-start justify-content-center">
                    <a href="https://www.facebook.com/Kneesuns" target="_blank" class="text-light">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.instagram.com/isanjoe" target="_blank" class="text-light">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/nessan-joe-ipulan-b8b160173/" target="_blank" class="text-light">
                        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                    </a>
                </h5>
                <div class="mt-3 d-flex justify-content-lg-start justify-content-center">
                    <img id="footerAchieve" src="http://localhost/KneesunDo/asset/img/footer/1.png" alt="">
                    <img class="d-sm-block d-none" id="footerAchieve" src="http://localhost/KneesunDo/asset/img/footer/2.png" alt="">
                </div>
                <div class="mt-3 d-sm-none d-flex justify-content-lg-start justify-content-center">
                    <img id="footerAchieve" src="http://localhost/KneesunDo/asset/img/footer/2.png" alt="">
                </div>
            </div>
            <!-- 2nd Column -->
            <div class="col-xl-2 col-lg-3 col-12 text-light mt-5 text-lg-start text-center">
                <h6 class="fw-bolder text-dark">Learn More</h6>
                <!-- FIXME: CHANGE ME -->
                <a href="http://localhost/KneesunDo/components/services/custom.php" class="text-light text-decoration-none">
                    <p>Custom Websites</p>
                </a>
                <a href="http://localhost/KneesunDo/components/services/templated.php" class="text-light text-decoration-none">
                    <p>Templated Websites</p>
                </a>
                <a href="http://localhost/KneesunDo/components/pages/projects.php" class="text-light text-decoration-none">
                    <p>My Projects</p>
                </a>
                <a href="http://localhost/KneesunDo/components/pages/posts.php" class="text-light text-decoration-none">
                    <p>Posts</p>
                </a>
                <a href="http://localhost/KneesunDo/components/pages/contact.php" class="text-light text-decoration-none">
                    <p>Contact Me</p>
                </a>
                <?php if (isset($_SESSION['username'])) : ?>
                    <a href="http://localhost/KneesunDo/components/pages/feedback.php" class="text-light text-decoration-none">
                        <p>Send a Feedback</p>
                    </a>
                <?php endif; ?>
            </div>
            <!-- 3rd Column -->
            <div class="col-xl-2 col-lg-3 col-12 text-light mt-5 text-lg-start text-center">
                <h6 class="fw-bolder text-dark">Location</h6>
                <p>9000 Cagayan de Oro City, Philippines</p>
            </div>
        </div>

        <div class="footFooter text-light d-flex justify-content-between mt-3 pt-2">
            <p class="fw-bolder d-flex align-items-center gap-2">
                <i class="fa fa-copyright" aria-hidden="true"></i>
                <span>2023 - Knee-sun Do Website</span>
            </p>
            <p class="fw-bolder">
                <!-- FIXME: CHANGE ME -->
                <a href="" class="text-light text-decoration-none">Privacy Policy</a>
            </p>
        </div>
    </div>
</footer>
<!-- TODO: END: FOOTER -->

<?php require "foot.php" ?>