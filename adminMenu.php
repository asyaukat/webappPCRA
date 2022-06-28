<?php
    if(!empty($_POST)){
        if($_POST['action'] == 'logout'){
        session_destroy();
        header('Location: login/login.php');
        }
    }

    if (!isset($_SESSION['member_id']) || empty($_SESSION['member_id'])) {
        header('Location: login/login.php');
      }
    else{
        $memberid = $_SESSION['member_id'];
    }
        
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>System Menu</h1>
        <p>Registered project: <a href="menu.php"> List of Project</a></p>
        <p>Modify Question: <a href="admin.php">Edit Question Link</a></p>
        <p>Modify Information:<a href="information.php">Edit Information Link</a></p>
        <form method="POST"><button name="action" value="logout">Log Out</button></form>
    </body>
</html>