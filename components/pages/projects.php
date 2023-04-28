<?php require "../../dynamic/navbar.php" ?>
<?php require "../../config/config.php" ?>

<section class="projectBanner d-flex flex-md-row flex-column align-items-center justify-content-center gap-3">
    <div class="text-center order-lg-0 order-1">
        <h1 class="text-light">Projects</h1>
        <p class="text-light">I am proud to present some work I do!</p>
    </div>
    <div class="order-lg-1 order-0">
        <img src="../../asset/img/projects/b.png" alt="Critical Thinker">
    </div>
</section>

<?php
$posts = $conn->query("SELECT * FROM project");
$posts->execute();
$rows = $posts->fetchAll(PDO::FETCH_OBJ);
?>

<?php foreach (array_reverse($rows) as $row) : ?>
    <section class="projectx d-flex justify-content-center">
        <div class="container" style="background-color: <?php echo $row->background_color ?>;">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-12 text-center">
                    <img src="images/<?php echo $row->img; ?>" alt="<?php echo $row->title; ?>">
                </div>
                <div class="col-lg-6 col-12 mt-lg-0 mt-5">
                    <h2 class="text-lg-start text-center"><?php echo $row->title; ?></h2>
                    <p class="text-lg-start text-center">
                        <?php echo $row->descriptions; ?>
                    </p>
                    <div class="text-lg-start text-center">
                        <a href="<?php echo $row->link; ?>" target="_blank">
                            <button>
                                Visit Site
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endforeach ?>


<?php require "../../dynamic/footer.php" ?>