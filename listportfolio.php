
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

<body id="portfolio-top">

    <!-- portfolio Wrapper -->
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

                <!-- Begin portfolio Content -->
                <div class="container-fluid">

                    <!-- portfolio Heading -->
                    <h1 class="h3 mb-4 text-gray-800">List Portfolios</h1>
                    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Location</th>
            <th>Image</th>
            <th>Description</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result_per_portfolio = 4;

        $portfolio = isset($_GET['portfolio']) ? (int)$_GET['portfolio'] : 1;

        $portfolio_first_result = ($portfolio - 1) * $result_per_portfolio;

        $sql = "SELECT * FROM portfolio";
        $re = $conn->query($sql);
        $number_of_result = $re->num_rows;

        $number_of_portfolio = ceil($number_of_result / $result_per_portfolio);

        $sel = "SELECT * FROM portfolio LIMIT $portfolio_first_result, $result_per_portfolio";
        $rs = $conn->query($sel);

        while ($row = $rs->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['pname']; ?></td>
                <td><?php echo $row['pdate']; ?></td>
                <td><?php echo $row['ploc']; ?></td>
                <td><img style="width:100px;" src="portfolio_images/<?php echo htmlspecialchars($row['pimg']); ?>"/></td>
                <td><?php echo $row['pdesc']; ?></td>
                <td><a onclick="return confirm('Are you sure?');" href="delportfolio.php?did=<?php echo $row['pid']; ?>" class="btn btn-danger">Delete</a></td>
                <td><a  href="editportfolio.php?eid=<?php echo $row['pid']?>" class="btn btn-success">Edit</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
for ($portfolio = 1; $portfolio <= $number_of_portfolio; $portfolio++) {
    // // Highlight current portfolio link
    $class = (isset($_GET['portfolio']) && (int)$_GET['portfolio'] == $portfolio) ? 'class="active"' : '';
    ?>
    <a class="btn btn-outline-secondary pegi" href="listportfolio.php?portfolio=<?php echo $portfolio; ?>" <?php echo $class; ?>> <?php echo $portfolio; ?> </a>
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
    <!-- End of portfolio Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#portfolio-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include("admin_inc/logout_modal.php"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all portfolios-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>