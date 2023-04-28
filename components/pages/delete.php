<?php require "../../dynamic/top.php" ?>
<?php require "../../config/config.php" ?>

<?php

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];

    // TODO: this is assign to delete the image from the directory file.
    $select = $conn->query("SELECT * FROM posts WHERE id = '$id' ");
    $select->execute();
    $posts = $select->fetch(PDO::FETCH_OBJ);

    // FIXME: THIS IS NOT CLEAR!! THE IF STATEMENT!! BOBO KAAYU. DAPAT KUNG DILI PARYA UG ID MO REDIRECT SA INDEX BALIKTAD NA HINUON. 
    if ($_SESSION['user_id'] === $posts->user_id) {
        header("location: http://localhost/KneesunDo/index.php");
    } else {
        unlink("photos/" . $posts->img . "");

        // TODO: This is assign in just deleting the post.
        $delete = $conn->prepare("DELETE FROM posts WHERE id = :id ");
        $delete->execute([
            ':id' => $id,
        ]);
    }

    header("location: http://localhost/KneesunDo/components/pages/posts.php");
} else {
    header("location:http://localhost/KneesunDo/components/pages/404.php");
}

?>

<? //php require "../../dynamic/foot.php" 
?>