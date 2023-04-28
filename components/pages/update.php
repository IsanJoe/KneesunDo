<?php require "../../dynamic/top.php" ?>
<?php require "../../config/config.php" ?>

<?php
if (isset($_GET['upd_id'])) {
    $id = $_GET['upd_id'];

    //TODO: first query - this is assign so we can use the data from the database to our form

    $select = $conn->query("SELECT * FROM posts WHERE id = '$id' ");
    $select->execute();
    $rows = $select->fetch(PDO::FETCH_OBJ);

    // FIXME: THIS IS NOT CLEAR YET
    // if ($_SESSION['user_id'] ==! $rows->user_id) {
    //     header('location: http://localhost/CleanBlog/index.php');
    // }

    //TODO: second query - this is assign in updating our post.

    if (isset($_POST['submit'])) {
        if ($_POST['title'] == '' or $_POST['subtitle'] == '' or $_POST['body'] == '') {
            echo "<div class='alert alert-danger text-center text-dark' role='alert'>Enter data into the inputs</div>";
        } else {

            // TODO: unlink was assign if we update the photo and delete it in the directory the old photo.
            unlink("photos/" . $rows->img . "");

            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $body = $_POST['body'];
            $img = $_FILES['img']['name'];

            $dir = 'photos/' . basename($img);

            $update = $conn->prepare("UPDATE posts SET title = :title, subtitle = :subtitle, body = :body, img = :img WHERE id = '$id' ");
            $update->execute([
                ':title' => $title,
                ':subtitle' => $subtitle,
                ':body' => $body,
                ':img' => $img,
            ]);

            if (move_uploaded_file($_FILES['img']['tmp_name'], $dir)) {

                header('location: http://localhost/KneesunDo/components/pages/posts.php');
            }

            // header('location: http://localhost/CleanBlog/index.php');
        }
    }
} else {
    header("location:http://localhost/KneesunDo/components/pages/404.php");
}
?>

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

            <form method="POST" action="update.php?upd_id=<?php echo $id; ?>" id="projectForm" enctype="multipart/form-data">
                <!-- <p class="fw-semibold text-danger">Please input all the desired data. Thank you!</p> -->
                <h1 class="fw-bold">Update your Blog Post</h1>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="<?php echo $rows->title; ?>" id="form2Example1" class="form-control" />
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" value="<?php echo $rows->subtitle; ?>" id="form2Example2" class="form-control" />
                </div>
                <div class="form-outline mb-4">
                    <label for="body">Body</label>
                    <textarea type="text" name="body" id="form2Example1" class="form-control" rows="8">
                        <?php echo $rows->body; ?>
                    </textarea>
                </div>
                <?php echo "<img src='photos/" . $rows->img . "' width=300px height=300px textAlign=center>"; ?>
                <div class="form-outline mb-4">
                    <label for="img">Cover Photo</label>
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