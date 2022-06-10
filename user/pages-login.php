<?php
include './shared/head.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
 
  $select  = "SELECT * FROM `users` where  `email` = '$email' and `password`= '$password'";
  $s =  mysqli_query($conn, $select);

  $numOfRows = mysqli_num_rows($s);
  $row = mysqli_fetch_assoc($s);
  if ($numOfRows > 0) {
    $_SESSION['admin'] =$email;
    $_SESSION['adminId'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['image'] = $row['image'];

    header("LOCATION:/safar/user/");
  } else {
    echo "<div class=' mt-5  alert alert-danger mx-auto w-50'>
    <h3>   Wrong Password OR User Name </h3>
        </div>";
  }
}
print_r($_SESSION);
?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
     
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">الدخول الي حسابك</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" novalidate method="POST">

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">الاميل</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="email" class="form-control" require >
                      <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">الرقم السري</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button name="login" class="btn btn-primary w-100" type="submit">تسجيل الدخول</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">ليس لديك حساب<a href="/safar/user/admins/add.php">سجل الان حساب جديد</a></p>
                  </div>
                </form>

              </div>
            </div>

            <div class="credits">
              Designed by <a href="">safar</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?php
