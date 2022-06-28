<?php 
session_start();

if(!isset($_SESSION['member_id']) ||  empty($_SESSION['member_id'])){
    header('Location: login/login.php');
}

$membertype = $_SESSION['member_type'];
    echo $membertype;

    
if(!empty($_SESSION['member_type'])){
    if($membertype == 'admin') {
        if(!empty($_POST['action'])){
            if($_POST['action'] == 'logout'){
                session_destroy();
                header('Location: login/login.php');
            }
        }
        else {
            header('Location: adminMenu.php');
        }
    }
    else if($membertype == 'user') {

        if (!empty($_POST['viewquestions'])){
            $_SESSION['projectID'] = $_POST['viewquestions'];
            header('Location: questions.php');
        }else if(!empty($_POST['viewresult'])){
            $_SESSION['projectID'] = $_POST['viewresult'];
            header('Location: result.php');
        }
    }
    
}
?>