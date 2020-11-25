<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add':
        $content="views/kuliner/tambah_tempatmakan.php";
        include_once 'views/kuliner/template.php';    
        break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['Nama_Tempat'])){
                $err['Nama_Tempat']="Nama Tempat wajib diisi";
            }
            if(empty($_POST['Alamat'])){
                $err['Alamat']="Alamat wajib diisi";
            }
            if(empty($_POST['Maps'])){
                $err['Maps']="Link Maps wajib diisi";
            }
            if(!isset($err)){
            $id_admin=$_SESSION['login']['id'];
            if(!empty($_POST['id'])){
                //update
                $sql="UPDATE tempat_makan set Nama_Tempat='$_POST[Nama_Tempat]',Alamat='$_POST[Alamat]',Maps='$_POST[Maps]',
                id_admin=$id_admin where id='$_POST[id]'";
            }
            else{
                //save
            $sql = "INSERT INTO tempat_makan(Nama_Tempat,Alamat,Maps,id_admin)
            VALUES ('$_POST[Nama_Tempat]','$_POST[Alamat]','$_POST[Maps]',$id_admin)";
            }
            if ($conn->query($sql) === TRUE) {
            header('Location:'.$con->site_url().'/admin/index.php?mod=tempatmakan');
            } else {
            $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
        else{
            $err['msg']="tidak diijikan";
        }
        if(isset($err)){
            $content="views/kuliner/tambah_tempatmakan.php";
            include_once 'views/kuliner/template.php';    
        }
        break;
    case 'edit':
      $tempat="SELECT * FROM tempat_makan WhERE id='$_GET[id]'";
      $tempat=$conn->query($tempat);
      $_POST=$tempat->fetch_assoc();
      
        $content="views/kuliner/tambah_tempatmakan.php";
        include_once 'views/kuliner/template.php'; 
        break;
    case 'delete';
        $tempat="DELETE  FROM tempat_makan WhERE id='$_GET[id]'";
        $tempat=$conn->query($tempat);
        var_dump($tempat);
        header('Location:'.$con->site_url().'/admin/index.php?mod=tempatmakan');

    break;
    default:
    $sql = "Select * from tempat_makan";
    $tempat=$conn->query($sql);
    $conn->close();
    $content="views/kuliner/tampil_tempatmakan.php";
    include_once 'views/kuliner/template.php';
}
?>