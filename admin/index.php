<?php
include_once '../config/Config.php';
$con = new Config();
if($con->auth()){
//PANGGIL FUNGSI
switch(@$_GET['mod']){
    case 'kuliner':
        include_once 'controller/kuliner.php';
        break;
        case 'tempatmakan':
            include_once 'controller/tempatmakan.php';
            break;
            case 'resep':
                include_once 'controller/resep.php';
                break;
    default:
        include_once 'controller/home.php';
}
}
else{
    //panggil cont login
    include_once 'controller/login.php';
    
}

?>