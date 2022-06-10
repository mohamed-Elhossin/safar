<?php
include '../shared/head.php';
include '../shared/header.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $insert = "INSERT INTO `users` VALUES (NULL , '$name', '$email','$password' ,'$address' , '$phone')";
    $i =  mysqli_query($conn, $insert);
    testMessage($i, "Now You Are signed IN");
}
?>
<main id="main" class="main  my-5 pt-5">
    <div class="pagetitle">
        <h1 class="display-1 text-center text-info">سجل آلان </h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="container col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                  
                            <div class="form-group">
                                <label> الاسم بالكامل</label>
                                <input name="name" type="text" class="form-control">
                            </div>
                  
                            <div class="form-group">
                                <label>الاميل</label>
                                <input name="email" type="email" class="form-control">

                            </div>
                            <div class="form-group">
                                <label> رقم سري</label>
                                <input name="password" type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> العنوان</label>
                                <input name="address" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> رقم الهاتف</label>
                                <input name="phone" type="text" class="form-control">
                            </div>
            
                            <button name="send" class="btn mt-3 btn-info btn-block w-50 mx-auto"> ارسال </button>
                        </form>
                    </div>
                </div>
            </div>

    </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>