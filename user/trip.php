<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
$select = "SELECT * FROM `employees`";
$s = mysqli_query($conn, $select);
if ($_SESSION['admin']) {
} else {
    header("location:/safar/user/pages-login.php");
}
?>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container">
        <header class="section-header">
            <h3>الخدامات</h3>
        </header>

        <div class="row flex-items-xs-middle flex-items-xs-center">
            <!-- Basic Plan  -->
            <?php foreach ($s as $data) { ?>
                <div class="col-xs-12 col-lg-3">
                    <div class="card mt-5">
                        <h1 class="text-center"> <?php echo $data['filed'] ?></h1>
                        <div class="card-block">
                            <h4 class="card-title">
                                <?php echo $data['name'] ?>
                            </h4>
                            <p>
                                <?php echo $data['phone'] ?>
                            </p>
                            <p> <?php echo $data['address'] ?>
                            </p>
                            <?php if (isset($_SESSION['admin'])) : ?>
                                <a href="/safar/user/payment.php?booking=<?php echo $data['id'] ?>" class="btn">احجز الان</a>
                            <?php else : ?>
                                <a href="/safar/user/pages-login.php" class="btn">احجز الان</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

</section><!-- End Pricing Section -->

<?php
include './shared/footer.php';
include './shared/script.php';

?>