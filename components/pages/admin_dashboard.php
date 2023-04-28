<?php require "../../dynamic/admin/navbar.php" ?>
<?php require "../../config/config.php" ?>


<section class="projectBanner d-flex flex-md-row flex-column align-items-center justify-content-center gap-3">
    <div class="text-center order-lg-0 order-1">
        <h1 class="text-light">DASHBOARD</h1>
        <p class="text-light">The Right page at The Right Time.</p>
        <a href="http://localhost/KneesunDo/index.php">
            <button type="button" class="btn btn-warning fs-6 fw-bold">
                <i class="fa fa-window-maximize" aria-hidden="true"></i>
                <span>Site</span>
            </button>
        </a>
    </div>
    <div class="order-lg-1 order-0">
        <img src="../../asset/img/b.png" alt="Dashboard">
    </div>
</section>




<?php
$contact = $conn->query("SELECT * FROM contacts");
$contact->execute();
$rows = $contact->fetchAll(PDO::FETCH_OBJ);
?>

<section class="container mt-5">
    <?php foreach ($rows as $row) : ?>
        <div class="position-relative">
            <div class="card mb-5">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row->sender; ?></h5>
                    <p class="card-text"><?php echo $row->messages; ?></p>
                    <btn class="btn btn-primary mt-2"><?php echo $row->email; ?></btn>
                    <btn class="btn btn-primary mt-2"><?php echo $row->company_name; ?></btn>
                    <btn class="btn btn-primary mt-2"><?php echo $row->locations; ?></btn>
                </div>
                <div class="card-footer text-muted">
                    <?php echo date('M', strtotime($row->created_at)) . ' ' . date('d', strtotime($row->created_at)) ?>
                </div>
            </div>
            <a href="http://localhost/KneesunDo/components/pages/deleteContact.php?delCon_id=<?php echo $row->id; ?>" class="position-absolute top-0 w-100 d-flex justify-content-end text-decoration-none text-dark">
                <i class="fa fa-times fs-4" aria-hidden="true"></i>
            </a>
        </div>
    <?php endforeach ?>
</section>


<?php require "../../dynamic/foot.php" ?>