<?php require "../../dynamic/navbar.php" ?>
<?php require "../../config/config.php" ?>

<?php

if (isset($_GET['cat_id'])) {
    $id = $_GET['cat_id'];

    // This data is for post blog
    $posts = $conn->query("SELECT posts.id AS id, posts.title AS title, posts.subtitle AS subtitle, posts.user_name AS user_name, posts.created_at AS created_at, posts.category_id AS category_id, posts.img AS img FROM categories JOIN posts ON categories.id = posts.category_id WHERE posts.category_id = '$id' ");
    $posts->execute();
    $rows = $posts->fetchAll(PDO::FETCH_OBJ);

    $select = $conn->query("SELECT * FROM categories WHERE id = '$id'");
    $select->execute();
    $category = $select->fetch(PDO::FETCH_OBJ);
} else {
    header("location:http://localhost/KneesunDo/components/pages/404.php");
}

?>

<section class="projectBanner d-flex flex-md-row flex-column align-items-center justify-content-center gap-3">
    <div class="text-center order-lg-0 order-1">
        <h1 class="text-light">Posts</h1>
        <p class="text-light">Always be Updated! Anytime, Anywhere.</p>
    </div>
    <div class="order-lg-1 order-0">
        <img src="../../asset/img/projects/6.png" alt="Critical Thinker">
    </div>
</section>

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
                    <p class="d-inline-flex me-1"><?php echo $category->name; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require "../../dynamic/footer.php" ?>