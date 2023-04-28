<?php require "../../dynamic/navbar.php" ?>
<?php require "../../config/config.php"; ?>

<?php
if (isset($_GET['content_id'])) {
    $id = $_GET['content_id'];

    $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");
    $select->execute();

    $post = $select->fetch(PDO::FETCH_OBJ);
} else {
    header("location:http://localhost/KneesunDo/components/pages/404.php");
}
?>

<section class="content">
    <div class="container-fluid m-0 p-0 position-relative">
        <div class="contentImg" style="background-image: url('photos/<?php echo $post->img; ?>')">
        </div>
        <div class="contentHeader position-absolute d-flex flex-column align-items-center justify-content-center">
            <h1><?php echo $post->title; ?></h1>
            <h5><?php echo $post->subtitle; ?></h5>
            <p>Posted by : <?php echo $post->user_name; ?> on <?php echo date('M', strtotime($post->created_at)) . ' ' . date('d', strtotime($post->created_at)) . ', ' . date('Y', strtotime($post->created_at)); ?></p>
        </div>
    </div>
    <div class="container mt-5">
        <p style="font-size: 18px; font-weight:500; text-align:justify;">
            <?php echo $post->body; ?>
        </p>
    </div>
    <?php if (isset($_SESSION['user_id']) and $_SESSION['user_id'] == $post->user_id) : ?>
        <div class="container mt-5">
            <div class="d-flex justify-content-end gap-3">
                <a href="http://localhost/KneesunDo/components/pages/update.php?upd_id=<?php echo $post->id; ?>">
                    <button class="bg-warning">Update</button>
                </a>
                <a href="http://localhost/KneesunDo/components/pages/delete.php?del_id=<?php echo $post->id; ?>">
                    <button class="bg-danger">Delete</button>
                </a>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php require "../../dynamic/footer.php" ?>