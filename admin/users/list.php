<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `users`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM trips where id = $id";
  $d =  mysqli_query($conn, $delete);
  // header('LOCATION: /ivisitor/admin/trips/list.php');
  testMessage($d , "Delete Trip $id ");
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>عرض المستخدمين</h1>
    <nav>

    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container  mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table table-dark">
              <tr>
                <th>ID</th>
                <th>الاسم</th>
                <th>الاميل</th>
                <th>عنوان</th>
                <th>رقم</th>
               
                <th colspan="3">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['name'] ?> </th>
                  <th> <?php echo $data['email'] ?> </th>
                  <th> <?php echo $data['address'] ?> </th>
                  <th> <?php echo $data['phone'] ?> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/safar/admin/users/list.php?delete=<?php echo $data['id'] ?>">حذف </a> </th>
                </tr>
              <?php } ?>
            </table>
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