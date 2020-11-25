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
            //validasi data
            if(!empty($_FILES['fileToUpload']['name'])){
            $target_dir = "../media/";
$photo=basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $photo;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == false) {
        $err["fileToUpload"]= "File is not an image.";
        $uploadOk = 0;
    } else {
        
    
    }
  }
// Check if file already exists
if (file_exists($target_file)) {
    $err['fileToUpload']= "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 1048576) {
    $err['fileToUpload']= "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $err['fileToUpload']= "Sorry, only JPG, JPEG, PNG & GIF are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $_POST['photo']=$photo;
    if(isset($_POST['photo_old']) && $_POST['photo_old']!=''){
        unlink($target_dir.$_POST['photo_old']);
    }
  }
    else{
        $err['fileToUpload']= "Sorry, There was an error uploading file.";
    }
}
}
            

            if(!isset($err)){
            $id_admin=$_SESSION['login']['id'];
            if(!empty($_POST['id'])){
                //update
                if(isset($_POST['photo'])){
                    $sql="UPDATE data_kuliner set Jenis_Kuliner='$_POST[Jenis_Kuliner]',Nama_Kuliner='$_POST[Nama_Kuliner]',
                Keterangan='$_POST[Keterangan]',id_admin=$id_admin, photo='$_POST[photo]' where id='$_POST[id]'";
                }else{
                $sql="UPDATE data_kuliner set Jenis_Kuliner='$_POST[Jenis_Kuliner]',Nama_Kuliner='$_POST[Nama_Kuliner]',
                Keterangan='$_POST[Keterangan]',id_admin=$id_admin where id='$_POST[id]'";
                }
            }
            else{
                //save
                if(isset($_POST['photo'])){
                    $sql = "INSERT INTO data_kuliner(Jenis_Kuliner,Nama_Kuliner,Keterangan,id_admin,photo)
            VALUES ('$_POST[Jenis_Kuliner]','$_POST[Nama_Kuliner]','$_POST[Keterangan]',$id_admin,'$_POST[photo]')";

                }else{
            $sql = "INSERT INTO data_kuliner(Jenis_Kuliner,Nama_Kuliner,Keterangan,id_admin)
            VALUES ('$_POST[Jenis_Kuliner]','$_POST[Nama_Kuliner]','$_POST[Keterangan]',$id_admin)";
                }
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
    case 'delete';
        $kuliner="DELETE  FROM data_kuliner WhERE id='$_GET[id]'";
        $kuliner=$conn->query($kuliner);
        header('Location:'.$con->site_url().'/admin/index.php?mod=kuliner');

    break;
    default:
    $sql = "Select * from data_kuliner";
    $kuliner=$conn->query($sql);
    $conn->close();
    $content="views/kuliner/tampil.php";
    include_once 'views/kuliner/template.php';
}
?>