<?php include("admin_inc/session.php")?>
<?php
include("admin_inc/db.php");

if(isset($_POST['save'])){
    $pname = $_POST['pname'];
    $pdate = $_POST['pdate'];
    $ploc = $_POST['ploc'];
    $pdesc = $_POST['editor'];
    $pid = $_POST['id'];
// echo $pid;
    if(isset($_FILES['pimg']['tmp_name']) && $_FILES['pimg']['name']!=""){
        $buf = $_FILES['pimg']['tmp_name'];
        $fn = time().$_FILES['pimg']['name'];
        move_uploaded_file($buf,"portfolio_images/".$fn);

        $upd = "UPDATE portfolio SET pname = '$pname',pdate = '$pdate', ploc = '$ploc', pimg = '$fn', pdesc = '$pdesc' WHERE pid ='$pid' ";

        if($conn->query($upd)){
        header("location:listportfolio.php");
        }
    }else{
        $upd = "UPDATE portfolio SET pname = '$pname',pdate = '$pdate', ploc = '$ploc', pdesc = '$pdesc' WHERE pid ='$pid' ";

        if($conn->query($upd)){
        header("location:listportfolio.php");
        }
    }
}
?>