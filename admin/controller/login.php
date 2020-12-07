<?php
if(isset($_POST['email'])){
    //action
    $conn=$con->koneksi();
    $email=$_POST['email'];$psw=md5($_POST['password']);
    $sql="select * from data_login where password = '$psw' and email = '$email' and active='Y'";
    $user=$conn->query($sql);
    if($user->num_rows > 0){
        $sess=$user->fetch_array();
        session_start();
        $_SESSION['login']['email']=$sess['email'];
        $_SESSION['login']['id']=$sess['id'];
        header('Location: http://localhost/infokuliner/admin/index.php?mod=kuliner');
        //echo'Yes';
    }
    else{
        $msg="Email dan Password tidak cocok";
        include_once 'views/v_login.php';
       // echo'No';
    }
}
else{
    include_once 'views/v_login.php';
}

?>