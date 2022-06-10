<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';

if (isset($_POST['send'])) {
    $data = $_POST['name'];
    $userId =  $_SESSION['adminId'];
    $insert = "INSERT INTO `notes` VALUES (NULL ,'$data' , $userId)";
    $i =  mysqli_query($conn, $insert);
    testMessage($i, "تم ارسال اقتراحك");
}
if($_SESSION['admin']){

}else{
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
                                <label> اترك اقتراحك </label>
                                <input name="name" type="text" class="form-control">
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