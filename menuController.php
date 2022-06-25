<?php 
session_start();

#if(!isset($_SESSION['user']) ||  empty($_SESSION['user'])){
    #header('Location: login.php');
#}


if (!empty($_POST['viewquestions'])){
    $_SESSION['projectID'] = $_POST['viewquestions'];
    header('Location: questions.php');
}else if(!empty($_POST['viewresult'])){
    $_SESSION['projectID'] = $_POST['viewresult'];
    header('Location: result.php');
}

?>