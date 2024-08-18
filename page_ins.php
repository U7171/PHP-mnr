<?php include("admin_inc/session.php")?>
<?php
include("admin_inc/db.php");

if(isset($_POST['save'])){
    $ptitle = $_POST['ptitle'];
    $pdesc = $_POST['editor'];

    $buf = $_FILES['pimg']['tmp_name'];
    $fn = time().$_FILES['pimg']['name'];
    move_uploaded_file($buf,"img/".$fn);

    $sql = "INSERT INTO pages SET pname = '$ptitle', image = '$fn', details = '$pdesc'";

    if($conn->query($sql)){
        header("location:listpages.php");
    }

}
else {
    echo "404 forbidden";
}
?>