<?php require "../../dynamic/navbar.php" ?>
<?php require "../../config/config.php" ?>

<section class="projectBanner d-flex flex-md-row flex-column align-items-center justify-content-center gap-3">
    <div class="text-center order-lg-0 order-1">
        <h1 class="text-light">Posts</h1>
        <p class="text-light">Always be Updated! Anytime, Anywhere.</p>
    </div>
    <div class="order-lg-1 order-0">
        <img src="../../asset/img/a.png" alt="Post">
    </div>
</section>

<?php
$posts = $conn->query("SELECT * FROM posts");
$posts->execute();
$rows = $posts->fetchAll(PDO::FETCH_OBJ);

$categories = $conn->query("SELECT * FROM categories");
$categories->execute();
$category = $categories->fetchAll(PDO::FETCH_OBJ);
?>


<section class="postPage">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 col-12">
                <div class="row" id="row1">

                    <?php foreach ($rows as $row) : ?>
                        <div class="col-xl-6 col-12 d-flex flex-column align-items-xl-start align-items-center mt-5" id="col1">
                            <a href="http://localhost/KneesunDo/components/pages/content.php?content_id=<?php echo $row->id; ?>" class="text-decoration-none text-dark">
                                <img src="photos/<?php echo $row->img; ?>" alt="">
                                <h1 class="text-xl-start text-center"><?php echo $row->title; ?></h1>
                            </a>
                            <p><strong>Posted by :</strong> <?php echo $row->user_name; ?></p>
                            <p><strong>Date:</strong> <?php echo date('M', strtotime($row->created_at)) . ' ' . date('d', strtotime($row->created_at)) . ', ' . date('Y', strtotime($row->created_at)); ?></p>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
            <div class="col-xxl-2 col-12 mt-5" id="col2">
                <h1>Category</h1>
                <div class="mt-4">
                    <?php foreach ($category as $cat) : ?>
                        <a href="http://localhost/KneesunDo/components/pages/category.php?cat_id=<?php echo $cat->id; ?>" class="text-decoration-none">
                            <p class="d-inline-flex me-1"><?php echo $cat->name; ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require "../../dynamic/footer.php" ?>