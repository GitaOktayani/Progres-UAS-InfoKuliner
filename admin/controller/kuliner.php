<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add':
        $content="views/kuliner/tambah.php";
        include_once 'views/kuliner/template.php';    
        break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $id_admin=$_SESSION['login']['id'];
            $sql = "INSERT INTO data_kuliner(Jenis_Kuliner,Nama_Kuliner,Keterangan,id_admin)
            VALUES ('$_POST[Jenis_Kuliner]','$_POST[Nama_Kuliner]','$_POST[Keterangan]',$id_admin)";

            if ($conn->query($sql) === TRUE) {
            header('Location:'.$con->site_url().'/admin/index.php?mod=kuliner');
            } else {
            $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        else{
            $err['msg']="tidak diijikan";
        }
        if(isset($err)){
            $content="views/kuliner/tambah.php";
            include_once 'views/kuliner/template.php';    
        }
        break;
    case 'edit':
        echo 'edit';
        break;
    default:
    $sql = "Select * from data_kuliner";
    $kuliner=$conn->query($sql);
    $conn->close();
    $content="views/kuliner/tampil.php";
    include_once 'views/kuliner/template.php';
}
?>