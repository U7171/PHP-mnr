
<?php
session_start();
if(!isset($_SESSION['admin_name']) || $_SESSION['role']!= 'admin'){
    header("location:index.php");
}

include("admin_inc/db.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="custom.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("admin_inc/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("admin_inc/topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">List Pages</h1>
                    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Page Title</th>
            <th>Page Image</th>
            <th>Page Details</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result_per_page = 4;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $page_first_result = ($page - 1) * $result_per_page;

        $sql = "SELECT * FROM pages";
        $re = $conn->query($sql);
        $number_of_result = $re->num_rows;

        $number_of_page = ceil($number_of_result / $result_per_page);

        $sel = "SELECT * FROM pages LIMIT $page_first_result, $result_per_page";
        $rs = $conn->query($sel);

        while ($row = $rs->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['pname']; ?></td>
                <td><img style="width:100px;" src="img/<?php echo htmlspecialchars($row['image']); ?>"/></td>
                <td><?php echo $row['details']; ?></td>
                <td><a onclick="return confirm('Are you sure?');" href="delpage.php?did=<?php echo$row['pid']; ?>"
                class="btn btn-danger">Delete</a></td>

                <td><a onclick="return confirm('Are you sure?');" href="editpage.php?eid=<?php echo $row['pid']; ?>"
                class="btn btn-success">Edit</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
for ($page = 1; $page <= $number_of_page; $page++) {
    // // Highlight current page link
    $class = (isset($_GET['page']) && (int)$_GET['page'] == $page) ? 'class="active"' : '';
    ?>
    <a class="btn btn-outline-secondary pegi" href="listpages.php?page=<?php echo $page; ?>" <?php echo $class; ?>> <?php echo $page; ?> </a>
    <?php
}
?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("admin_inc/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include("admin_inc/logout_modal.php"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>