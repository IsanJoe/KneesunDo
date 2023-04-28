<?php require "../../dynamic/top.php" ?>
<?php require "../../config/config.php" ?>

<?php

if (isset($_GET['delCon_id'])) {
    $id = $_GET['delCon_id'];

    // TODO: this is assign to delete the image from the directory file.
    $select = $conn->query("SELECT * FROM contacts WHERE id = '$id' ");
    $select->execute();
    $posts = $select->fetch(PDO::FETCH_OBJ);

    $delete = $conn->prepare("DELETE FROM contacts WHERE id = :id ");
    $delete->execute([
        ':id' => $id,
    ]);

    header("location: http://localhost/KneesunDo/components/pages/admin_dashboard.php");
} else {
    header("location:http://localhost/KneesunDo/components/pages/404.php");
}

?>

<? //php require "../../dynamic/foot.php" 
?>