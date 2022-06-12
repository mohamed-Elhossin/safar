<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `employees`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM employees where id = $id";
  $d =  mysqli_query($conn, $delete);
  header('LOCATION: /safar/admin/emps/list.php');
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>عرض الصنايعيه</h1>
    <nav>

    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container col-9 mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table table-dark">
              <tr>
                <th>الكود</th>
                <th>الاسم</th>
                <th>الرقم</th>
                <th>العنوان</th>
                <th>التخصص</th>
                <th>البطاقه</th>
                <th colspan="3">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['name'] ?> </th>
                  <th> <?php echo $data['phone'] ?> </th>
                  <th> <?php echo $data['address'] ?> </th>
                  <th> <?php echo $data['filed'] ?> </th>
                  <th> <img width="30" src="./upload/<?php echo $data['image'] ?>" alt=""> </th>
                  <th> <a class="btn btn-warning" href="/safar/admin/emps/add.php?edit=<?php echo $data['id'] ?>">تعديل </a> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/safar/admin/emps/list.php?delete=<?php echo $data['id'] ?>">مسح </a> </th>
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