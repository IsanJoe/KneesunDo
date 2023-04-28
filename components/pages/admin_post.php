<?php require "../../dynamic/top.php" ?>
<?php require "../../config/config.php" ?>

<section class=" container-fluid" id="admin_project">
    <div class="row">
        <div class="col-lg-5 col-12 d-flex justify-content-lg-center justify-content-between flex-lg-column flex-row align-items-center order-lg-1 order-0" id="registerFirstColumn">
            <img src="http://localhost/KneesunDo/asset/img/logoWhite.png" alt="">
            <div class="mt-3 text-center">
                <a href="http://localhost/KneesunDo/components/pages/admin_dashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                <p class="mt-2 text-light fw-bold text-center">Dashboard</p>
            </div>
        </div>
        <div class="col-lg-7 col-12 d-flex justify-content-center flex-column align-items-center order-lg-0 order-1" id="registerSecondColumn">


            <form method="POST" action="admin_post.php" id="projectForm" enctype="multipart/form-data">
                <!-- <p class="fw-semibold text-danger">Please input all the desired data. Thank you!</p> -->
                <h1 class="fw-bold">Add a Blog Post</h1>

                <?php
                $categories = $conn->query("SELECT * FROM categories");
                $categories->execute();
                $category = $categories->fetchAll(PDO::FETCH_OBJ);

                if (isset($_POST['submit'])) {
                    if ($_POST['title'] == '' or $_POST['subtitle'] == '' or $_POST['body'] == '') {
                        echo "
                        <div id='Alert' class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <span class='fw-semibold'>You should check in on some of those fields below.</span> 
                            <button type='button' class='btn-close bg-transparent text-dark' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                    } else {
                        $title = $_POST['title'];
                        $subtitle = $_POST['subtitle'];
                        $body = $_POST['body'];
                        $img = $_FILES['img']['name'];
                        $category_id = $_POST['category_id'];
                        $user_id = $_SESSION['user_id'];
                        $user_name = $_SESSION['username'];

                        $dir = 'photos/' . basename($img);

                        $insert = $conn->prepare("INSERT INTO posts (title, subtitle, body, img, category_id, user_id, user_name) VALUES (:title, :subtitle, :body, :img, :category_id, :user_id, :user_name)");
                        $insert->execute([
                            ':title' => $title,
                            ':subtitle' => $subtitle,
                            ':body' => $body,
                            ':img' => $img,
                            ':category_id' => $category_id,
                            ':user_id' => $user_id,
                            ':user_name' => $user_name,
                        ]);
                        if (move_uploaded_file($_FILES['img']['tmp_name'], $dir)) {
                            echo "
                            <div id='Alert' class='alert alert-primary alert-dismissible fade show' role='alert'>
                                <span class='fw-semibold'>Your post was now added to the site.</span> 
                                <button type='button' class='btn-close bg-transparent text-dark' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                        }
                    }
                }
                ?>


                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="form2Example1" class="form-control" />
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" id="form2Example2" class="form-control" />
                </div>
                <div class="form-outline mb-4">
                    <label for="body">Body</label>
                    <textarea type="text" name="body" id="form2Example1" class="form-control" rows="1"></textarea>
                </div>
                <div class="form-outline mb-4">
                    <label for="img">Cover Photo</label>
                    <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" required />
                </div>
                <div class="form-outline mb-4">
                    <select name="category_id" class="form-select" aria-label="Default select">
                        <option selected="">Choose category</option>

                        <?php foreach ($category as $cat) : ?>
                            <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Submit</button>
                <!-- Register buttons -->
            </form>
        </div>
    </div>
</section>




<?php require "../../dynamic/foot.php" ?>