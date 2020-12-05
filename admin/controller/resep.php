<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add':
        $content="views/kuliner/tambahresep.php";
        include_once 'views/kuliner/template.php';    
        break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['Nama_Resep'])){
                $err['Nama_Resep']="Nama Resep wajib diisi";
            }
            //validasi data
            if(!empty($_FILES['fileToUpload']['name'])){
            $target_dir = "../media/";
$file=basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $file;
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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
if($FileType != "pdf" ) {
    $err['fileToUpload']= "Sorry, only PDF is allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $_POST['Resep']=$file;
    if(isset($_POST['file_old']) && $_POST['file_old']!=''){
        unlink($target_dir.$_POST['file_old']);
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
                if(isset($_POST['Resep'])){
                    $sql="UPDATE resep set Nama_Resep='$_POST[Nama_Resep]',Resep='$_POST[Resep]',
                id_admin=$id_admin where id='$_POST[id]'";
                }else{
                    $sql="UPDATE resep set Nama_Resep='$_POST[Nama_Resep]',
                    id_admin=$id_admin where id='$_POST[id]'";
                }
            }
            else{
                //save
                if(isset($_POST['Resep'])){
                    $sql = "INSERT INTO resep(Nama_Resep,Resep,id_admin)
            VALUES ('$_POST[Nama_Resep]','$_POST[Resep]',$id_admin)";

                }else{
            $sql = "INSERT INTO resep(Nama_Resep,id_admin)
            VALUES ('$_POST[Nama_Resep]',$id_admin)";
                }
            }
            if ($conn->query($sql) === TRUE) {
            header('Location:'.$con->site_url().'/admin/index.php?mod=resep');
            } else {
            $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
        else{
            $err['msg']="tidak diijikan";
        }
        if(isset($err)){
            $content="views/kuliner/tambahresep.php";
            include_once 'views/kuliner/template.php';    
        }
        break;
    case 'edit':
      $resep="SELECT * FROM resep WhERE id='$_GET[id]'";
      $resep=$conn->query($resep);
      $_POST=$resep->fetch_assoc();
      
        $content="views/kuliner/tambahresep.php";
        include_once 'views/kuliner/template.php'; 
        break;
        case 'delete';
        $resep="DELETE  FROM resep WhERE id='$_GET[id]'";
        $resep=$conn->query($resep);
        header('Location:'.$con->site_url().'/admin/index.php?mod=resep');

    break;
    default:
    $sql = "Select * from resep";
    $resep=$conn->query($sql);
    $conn->close();
    $content="views/kuliner/tampilresep.php";
    include_once 'views/kuliner/template.php';
}
?>