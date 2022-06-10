<?php
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/safar/user/');
}
?>
<!-- ======= Header ======= -->

<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="index.php">اطلب صنايعي
      </a></h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="/safar/user/#hero">الرئسيه</a></li>
        <li><a class="nav-link scrollto" href="/safar/user/#about">من نحن</a></li>
        <li><a class="nav-link scrollto" href="/safar/user/notes.php">ارسل اقتراحك</a></li>
        <li><a class="nav-link scrollto" href="/safar/user/rating.php">ارسل تقيمك</a></li>

        <li><a class="nav-link scrollto" href="/safar/user/trip.php">الخدامات</a></li>
        <li><a class="nav-link scrollto" href="/safar/user/#footer">تواصل</a></li>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <div class="social-links">
      <?php if (isset($_SESSION['admin'])) : ?>
        <form action="">
          <button name="logout" class="btn btn-info"> تسجيل الخروج </button>
        </form>
        <a class="btn btn-danger p-3" href="/safar/user/orders.php">طلباتك</a>
      <?php else : ?>
        <a href="/safar/user/admins/add.php" class="btn btn-info p-3 "> التسجيل في الموقع </a>
        <a href="/safar/user/pages-login.php" class="btn btn-warning p-3">تسجيل الدخول</a>
      <?php endif; ?>
    </div>
  </div>
</header><!-- End Header -->