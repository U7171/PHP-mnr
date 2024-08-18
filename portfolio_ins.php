<?php include("admin_inc/session.php")?>
<?php
include("admin_inc/db.php");

if(isset($_POST['save'])){
    $pname = $conn->real_escape_string($_POST['pname']);
    $pdate = $_POST['pdate'];

    $ploc = $conn->real_escape_string($_POST['ploc']);
    $pdesc = $conn->real_escape_string($_POST['editor']);
    // $pimg = $_POST['editor'];

    $buf = $_FILES['pimg']['tmp_name'];
    $fn = time().$_FILES['pimg']['name'];
    move_uploaded_file($buf,"portfolio_images/".$fn);

    $sql = "INSERT INTO portfolio SET pname = '$pname', pdate = '$pdate', ploc = '$ploc', pdesc = '$pdesc', pimg = '$fn'";

    if($conn->query($sql)){
        header("location:listportfolio.php");
    }

}
else {
    echo "404 forbidden";
}
?>