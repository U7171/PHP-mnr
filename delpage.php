
<?php
session_start();
if(!isset($_SESSION['admin_name']) || $_SESSION['role']!= 'admin'){
    header("location:index.php");
}
include("admin_inc/db.php");
$id = $_GET['did'];
$sel = "SELECT * FROM pages WHERE pid='$id'";
$res = $conn->query($sel);
$data = $res->fetch_assoc();
unlink("images/".$data['image']);

$del = "DELETE FROM pages WHERE pid='$id'";
if($conn->query($del)){
    header("location:listpages.php");
}
?>