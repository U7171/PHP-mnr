<?php session_start();

include("admin_inc/db.php");

if(isset($_POST['login'])){
    $e = $_POST['email'];
    $p = $_POST['pass'];
    $err;

    $sel = "SELECT * FROM admin WHERE aemail='$e' AND apass='$p'";
    $rs = $conn->query($sel);
    if($rs->num_rows>0){
        $dt = $rs->fetch_assoc();
        $_SESSION['admin_name'] = $dt['aname'];
        $_SESSION['role'] = $dt['role'];
        header("location:dashboard.php");
    }else{
        $err = 'Invalid Login';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin_inc/custom.css">
    <style>
        /* <style> */
    .login {
        margin-top: 100px;
    }

    .bg-login-image {
        background-image: url("img/H9.jpg"); /* Corrected here */
        background-repeat: no-repeat; /* Separate property for no-repeat */
        background-size: cover; /* Background size property */
    }

    .bg-image {
        background-image: url("img/H10.jpg");
        background-repeat: no-repeat; /* Separate property for no-repeat */
        background-size: cover; /* Background size property */
    }
</style>

    <!-- </style> -->

</head>

<body class="bg-gradient-primary bg-image" >

    <div class="container login">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
   <?php if(isset($err)) { ?>
    <div class="alert alert-danger">
    <strong>Error!</strong> <?php echo $err; ?>
    </div>
    <?php } ?>
                        <div class="alert alert-success">
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input name= "pass" type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <input type="submit" name="login" value="login" class="btn btn-primary btn-user btn-block">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>