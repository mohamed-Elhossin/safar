<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';

$select = "SELECT * FROM `employees`";
$s = mysqli_query($conn, $select);
if (isset($_POST['send'])) {
    $data = $_POST['name'];
    $empId = $_POST['empId'];
    $userId =  $_SESSION['adminId'];
    $insert = "INSERT INTO `reting` VALUES (NULL , $userId , $empId,'$data' )";
    $i =  mysqli_query($conn, $insert);
    testMessage($i, "تم ارسال تقيمك بنجاح");
}
if ($_SESSION['admin']) {
} else {
    header("location:/safar/user/pages-login.php");
}
?>
<main id="main" class="main  my-5 pt-5">
    <div class="pagetitle">
        <h1 class="display-1 text-center text-info"> سجل اقتراحك </h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="container col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label> اترك تقيمك </label>
                                <select name="name" type="text" class="form-control">

                                    <?php for ($i = 0; $i <= 10; $i++) { ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> اختر العامل </label>
                                <select name="empId" type="text" class="form-control">
                                    <?php foreach ($s as $data) { ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button name="send" class="btn mt-3 btn-info btn-block w-50 mx-auto"> Send Data </button>
                        </form>
                    </div>
                </div>
            </div>

    </section>

</main><!-- End #main -->
<?php
include './shared/footer.php';
include './shared/script.php';
?>