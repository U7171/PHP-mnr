<?php include("admin_inc/session.php")?>
<?php
include("admin_inc/db.php");

if(isset($_POST['save'])){
    $ptitle = $_POST['ptitle'];
    $pdesc = $_POST['editor'];
    $id = $_POST['id'];

    if(isset($_FILES['pimg']['tmp_name']) && $_FILES['pimg']['name']!=""){
        $buf = $_FILES['pimg']['tmp_name'];
        $fn = time().$_FILES['pimg']['name'];
        move_uploaded_file($buf,"img/".$fn);

        $upd = "UPDATE pages SET pname = '$ptitle', image = '$fn', details = '$pdesc' WHERE pid ='$id' ";

        if($conn->query($upd)){
        header("location:listportfolio.php");
        }
    }else{
        $upd = "UPDATE pages SET pname = '$ptitle', details = '$pdesc' WHERE pid='$id'";

        if($conn->query($upd)){
        header("location:listportfolio.php");
        }
    }
}
?>