<?php require "config/config.php" ?>
<?php require "dynamic/navbar.php" ?>


<!-- TODO: BANNER SECTION -->
<section class="position-relative">
  <div class="banner">
    <div class="d-flex flex-column justify-content-center align-items-center p-3">
      <h1 class="text-light text-center">
        Tell Me About Your Business <br> So I Can Tell The World What Your Business Is
      </h1>
      <p class="text-center d-xl-block d-none">
        Innovative, task-driven individual in web design, planning, and development across diverse web projects. <br> My goal is to develop modern websites that are optimized for your business, driving a good online presence and revenues.
      </p>
      <p class="text-center d-none d-sm-block d-xl-none">
        Innovative, task-driven individual in web design, planning, and development across diverse web projects. My goal is to develop modern websites that are optimized for your business, driving a good online presence and revenues.
      </p>
      <p class="text-center d-block d-sm-none">
        My goal is to develop modern websites that are optimized for your business, driving a good online presence and revenues.
      </p>
      <section class="bannerButton d-flex">
        <a href="http://localhost/KneesunDo/components/pages/contact.php" class="text-decoration-none">
          <button>
            Contact me <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </button>
        </a>
        <a href="http://localhost/KneesunDo/components/pages/projects.php" class="text-decoration-none">
          <button class="d-sm-block d-none">My Projects <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
        </a>
      </section>
    </div>
  </div>
  <div class="position-absolute h-100 ms-3 d-lg-block d-none" style="top: 75%">
    <img src="asset/img/human.png" alt="Human Coder Image" style="width: 250px;">
  </div>
</section>
<!-- TODO: END: BANNER SECTION -->

<!-- TODO: TYPE OF WEBSITE -->
<?php require "dynamic/services.php"; ?>
<!-- TODO: END: TYPE OF WEBSITE -->

<!--TODO: TECHNOLOGIES -->
<section class="tech">
  <div class="container">
    <h1 class="text-center">Technologies I use</h1>
    <!-- Slider -->
    <div class="slider mt-4">
      <div class="slide-track">
        <div class="slide">
          <img src="asset/img/tech/figma.png" width="90px" alt="figma" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/photoshop.png" width="90px" alt="photoshop" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/xd.png" width="90px"" alt=" xd" />
        </div>
        <div class=" slide">
          <img src="asset/img/tech/html.png" width="90px" alt="html" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/css.png" width="90px" alt="css" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/bootstrap.png" width="90px" alt="bootstrap" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/react.png" width="90px" alt="reactjs" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/nodejs.png" width="90px" alt="nodejs" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/php.png" width="90px" alt="php" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/mysql.png" width="90px" alt="mysql" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/wordpress.png" width="90px" alt="wordpress" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/elementor.png" width="90px" alt="elementor" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/woocommerce.png" width="90px" alt="woocommerce" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/git.png" width="90px" alt="git" />
        </div>
        <div class="slide">
          <img src="asset/img/tech/github.png" width="90px" alt="github" />
        </div>
      </div>
    </div>
  </div>
</section>
<!--TODO: END: TECHNOLOGIES -->



<!--TODO: COMMENTS -->
<?php
$feedbacks = $conn->query("SELECT * FROM feedbacks LIMIT 3");
$feedbacks->execute();
$rows = $feedbacks->fetchAll(PDO::FETCH_OBJ);
?>
<section class="comment">
  <h1 class="text-center">Hear It From My Colleagues</h1>
  <div id="carouselWithControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- TODO: First Carousel -->
      <div class="carousel-item active">
        <div class="row d-flex justify-content-evenly">
          <?php foreach ($rows as $row) : ?>
            <div class="commentBox col-xl-3 col-md-5 col-10 text-center">
              <p>
                <img src="components/pages/feedbacks/<?php echo $row->img; ?>" alt="">
              </p>
              <h6><?php echo $row->fullName; ?></h6>
              <p>
                <?php echo $row->messages; ?>
              </p>
            </div>
          <?php endforeach ?>

        </div>
      </div>

    </div>
  </div>
</section>
<!--TODO: END: COMMENTS -->

<!--TODO: PROJECTS -->
<?php
$posts = $conn->query("SELECT * FROM project LIMIT 4");
$posts->execute();
$rows = $posts->fetchAll(PDO::FETCH_OBJ);
?>

<section class="project">
  <div class="container">
    <h1 class="text-light text-center mb-0 pb-0">Recent Works</h1>
    <div class="row">
      <?php foreach (array_reverse($rows) as $row) : ?>
        <div class="col-xl-6 col-12 text-center position-relative mt-5">
          <img id="workProject" src="./components/pages/images/<?php echo $row->img; ?>" alt="Portfolio Website">
          <div class="overlayProject position-absolute top-0 w-100 h-100 text-start d-flex flex-column justify-content-center align-items-center">
            <a href="<?php echo $row->link; ?>" target="_blank">
              <button class="overlayButton">View Project <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </a>
            <img src="asset/img/projects/a.png" class="w-25 mt-2 imgBot" alt="idea book">
          </div>
        </div>
      <?php endforeach ?>

      <!-- <div class="col-xl-6 col-12 mt-xl-0 mt-5 text-xl-start text-center position-relative">
        <img id="workProject" src="asset/img/projects/2.jpg" alt="XploRear Website">
        <div class="overlayProject position-absolute top-0 w-100 h-100 text-start d-flex flex-column justify-content-center align-items-center me-xxl-5 ms-0">
          <a href="https://xplorear.vercel.app/" target="_blank">
            <button class="overlayButton">View Project <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
          </a>
          <img src="asset/img/projects/a.png" class="w-25 mt-2 imgBot" alt="idea book">
        </div>
      </div>
      <div class="col-xl-6 col-12 mt-xl-4 mt-5 text-xl-end text-center position-relative">
        <img id="workProject" src="asset/img/projects/3.jpg" alt="CareMe Website">
        <div class="overlayProject position-absolute top-0 w-100 h-100 text-start d-flex flex-column justify-content-center align-items-center">
          <a href="https://adoptapetnow.netlify.app/" target="_blank">
            <button class="overlayButton">View Project <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
          </a>
          <img src="asset/img/projects/a.png" class="w-25 mt-2 imgBot" alt="idea book">
        </div>
      </div>
      <div class="col-xl-6 col-12 mt-xl-4 mt-5 text-xl-start text-center position-relative">
        <img id="workProject" src="asset/img/projects/4.jpg" alt="A-gree Culture">
        <div class="overlayProject position-absolute top-0 w-100 h-100 text-start d-flex flex-column justify-content-center align-items-center me-xxl-5 ms-0">
          <a href="https://dainty-kitsune-bc7f0e.netlify.app/" target="_blank">
            <button class="overlayButton">View Project <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
          </a>
          <img src="asset/img/projects/a.png" class="w-25 mt-2 imgBot" alt="idea book">
        </div>
      </div> -->

    </div>
    <div class="text-center mt-4">
      <a href="http://localhost/KneesunDo/components/pages/projects.php">
        <button class="projectViewButton">View All Projects</button>
      </a>
    </div>
  </div>
</section>
<!--TODO: PROJECTS-->

<!--TODO: POST -->

<?php
$posts = $conn->query("SELECT * FROM posts LIMIT 3");
$posts->execute();
$rows = $posts->fetchAll(PDO::FETCH_OBJ);
?>
<section class="posts">
  <div class="container">
    <h1 class="text-center">Posts and Announcement</h1>
    <div class="row d-flex justify-content-xxl-center justify-content-lg-between justify-content-center">

      <?php foreach ($rows as $row) : ?>
        <div class="col-xxl-3 col-lg-5 col-10 text-center text-lg-start">
          <img src="components/pages/photos/<?php echo $row->img; ?>" alt="">
          <h6 class="mt-2"><?php echo $row->title; ?></h6>
          <div>
            <a href="http://localhost/KneesunDo/components/pages/content.php?content_id=<?php echo $row->id; ?>">
              <button class="buttonRead">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </a>
          </div>
        </div>
      <?php endforeach ?>

    </div>
    <div class="text-center">
      <a href="http://localhost/KneesunDo/components/pages/posts.php">
        <button class="postViewButton">View All Posts</button>
      </a>
    </div>
  </div>
</section>
<!--TODO: POST -->

<!-- TODO: PARTNERSHIP -->
<?php require "dynamic/partnership.php" ?>
<!-- TODO: PARTNERSHIP -->

<?php require "dynamic/footer.php" ?>