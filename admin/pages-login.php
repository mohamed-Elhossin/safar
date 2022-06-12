<?php
include './shared/head.php';
include './sharedFunc/db.php';

if (isset($_POST['login'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];
 
    $select  = "SELECT * FROM `admin` where  `name` = '$name' and `password`= '$password'";
    $s =  mysqli_query($conn, $select);
   

  $numOfRows = mysqli_num_rows($s);
  $row = mysqli_fetch_assoc($s);
  if ($numOfRows > 0) {
    $_SESSION['admin'] = $name;
    $_SESSION['adminId'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['image'] = $row['image'];
    $_SESSION['job'] = $row['job'];
    header("LOCATION:/safar/admin/");
  } else {
    echo "<div class=' mt-5  alert alert-danger mx-auto w-50'>
    <h3>   Wrong Password OR User Name </h3>
        </div>";
  }
}

?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="/NiceAdmin/index.php" class="logo d-flex align-items-center w-auto">
                <span class="d-none d-lg-block">Safar</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">تسحيل الدخول</h5>
                </div>

                <form class="row g-3 needs-validation" novalidate method="POST">

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">الاسم</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="name" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">الباسورد</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>
         
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">ذكرني</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button name="login" class="btn btn-primary w-100" type="submit">الدخول</button>
                  </div>
   
                </form>

              </div>
            </div>

   

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?php
