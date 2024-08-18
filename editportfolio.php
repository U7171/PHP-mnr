<?php
session_start();
if(!isset($_SESSION['admin_name']) || $_SESSION['role']!= 'admin'){
    header("location:index.php");
}
include("admin_inc/db.php");
$id = $_GET['eid'];
// echo $id;
$sel = "SELECT * FROM portfolio WHERE pid='$id'";
$res = $conn->query($sel);
$data = $res->fetch_assoc();
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>;
    <style>
        .ck-content{
            height: 230px;
        }
    </style>

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
                    <h1 class="h3 mb-4 text-gray-800">Edit Portfolio</h1>
                    <form action="updportfolio.php" enctype = "multipart/form-data" method = "POST">
                    <input type="hidden" name="id" value="<?php echo $data['pid'];?>" />
                        <p>Portfolio name</p>
                        <p><input type="text" name="pname" id="pname" class="form-control" value="<?php echo $data['pname']; ?>"></p>

                        <p>Portflio Date</p>
                        <p><input type="date" id="pdate" name="pdate" class="form-control" value="<?php echo $data['pdate']; ?>"></p>

                        <p>Portfolio Location</p>
                        <p><input type="text" id="ploc" name="ploc" class="form-control" value="<?php echo $data['ploc']; ?>"></p>

                        <p>Image</p>
                        <p><input type="file" name="pimg" id="pimg"></p>
                        <p><img  style="width:100px;" src="portfolio_images/<?php echo $data['pimg']?>"/></p>
                        
                        <p>Description</p>
                        <textarea class="form-control" id="editor" rows="3" name="editor"><?php echo htmlspecialchars($data['pdesc']); ?></textarea>
                        <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) );
                        </script>
                        <p><input type="submit" name="save" id="save" value ="Update" class= "btn btn-primary "></p>
                    </form>

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