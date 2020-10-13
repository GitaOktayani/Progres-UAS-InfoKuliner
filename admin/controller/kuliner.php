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
            //validasi
            if(empty($_POST['Jenis_Kuliner'])){
                $err['Jenis_Kuliner']="Jenis Kuliner wajib diisi";
            }
            if(empty($_POST['Nama_Kuliner'])){
                $err['Nama_Kuliner']="Nama Kuliner wajib diisi";
            }
            if(!isset($err)){
            $id_admin=$_SESSION['login']['id'];
            if(!empty($_POST['id'])){
                //update
                $sql="UPDATE data_kuliner set Jenis_Kuliner='$_POST[Jenis_Kuliner]',Nama_Kuliner='$_POST[Nama_Kuliner]',
                Keterangan='$_POST[Keterangan]',id_admin=$id_admin where id='$_POST[id]'";
            }
            else{
                //save
            $sql = "INSERT INTO data_kuliner(Jenis_Kuliner,Nama_Kuliner,Keterangan,id_admin)
            VALUES ('$_POST[Jenis_Kuliner]','$_POST[Nama_Kuliner]','$_POST[Keterangan]',$id_admin)";
            }
            if ($conn->query($sql) === TRUE) {
            header('Location:'.$con->site_url().'/admin/index.php?mod=kuliner');
            } else {
            $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
            }
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
      $kuliner="SELECT * FROM data_kuliner WhERE id='$_GET[id]'";
      $kuliner=$conn->query($kuliner);
      $_POST=$kuliner->fetch_assoc();
      
       
        $content="views/kuliner/tambah.php";
        include_once 'views/kuliner/template.php'; 
        break;
    default:
    $sql = "Select * from data_kuliner";
    $kuliner=$conn->query($sql);
    $conn->close();
    $content="views/kuliner/tampil.php";
    include_once 'views/kuliner/template.php';
}
?>