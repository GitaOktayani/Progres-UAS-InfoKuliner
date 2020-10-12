<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add':
        echo 'tambah data';
    break;
    case 'edit':
        echo 'edit';
    break;
    default:
    $sql = "Select * from kuliner";
    $kuliner=$conn->query($sql);
    $conn->close();
    $content="views/kuliner/tampil.php";
    include_once 'views/templates.php';
}
?>