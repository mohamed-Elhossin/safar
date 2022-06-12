<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `admin`";
$s = mysqli_query($conn, $select);
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $addess = $_POST['addess'];
    $filed = $_POST['filed'];
    $adminId = $_POST['adminId'];
    // Image Code
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    if (move_uploaded_file($image_tmp, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    $insert = "INSERT INTO `employees` VALUES (NULL ,'$name','$phone','$addess','$filed','$image_name',$adminId )";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "تم اضافه الصنايعي ");
}


$name = '';
$phone = '';
$addess = '';
$filed = "";
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id =   $_GET['edit'];
    $select = "SELECT * from `employees` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $filed = $row['filed'];
    $phone = $row['phone'];
    $addess = $row['address'];
    
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $addess = $_POST['addess'];
        $filed = $_POST['filed'];
        $adminId = $_POST['adminId'];
        $update = "UPDATE `employees` SET `name` = '$name', `phone` = '$phone',`address` = '$addess' , `filed` = '$filed', `adminId` = '$adminId' where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "تم تعديل الصنايعي");
        // header('LOCATION: http://localhost/ivisitor/admin/travelAgenecy/list.php');
    }
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <?php if ($update) : ?>
            <h1 class="display-1 text-center text-warning"> تعديل صنايعي </h1>
        <?php else : ?>
            <h1 class="display-1 text-center text-info">اضافه صنايعي </h1>
        <?php endif; ?>
        <nav>

        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">

            <div class="row">
                <div class="card col-lg-9">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> الاسم : </label>
                                <input class="form-control" value="<?php echo $name ?>" name="name" type="text">
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <label>رقم الهاتف </label>
                                    <input type="text" value="<?php echo $phone ?>" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label> العنوان </label>
                                    <input type="text" value="<?php echo $addess ?>" class="form-control" name="addess">
                                </div>
                                <div class="form-group">
                                    <label> التخصص </label>
                                    <input type="text"  value="<?php echo $filed ?>" class="form-control" name="filed">
                                </div>
                                <div class="form-group">
                                    <label> رفق صوره البطاقه </label>
                                    <input type="file"  class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <label> ادمن </label>
                                    <select type="text" class="form-control" name="adminId">
                                        <?php foreach ($s as $data) { ?>
                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <?php if ($update) : ?>
                                    <button name="update" class="mt-4 btn btn-primary btn-block w-50 mx-auto">Update Data </button>
                                <?php else : ?>
                                    <button name="send" class=" mt-4 btn btn-info btn-block w-50 mx-auto">Send Data</button>
                                <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- End Right side columns -->
    </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>