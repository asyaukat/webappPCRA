<?php
    require_once "sql.php";

    session_start();

    if(!isset($_SESSION['member_id']) ||  empty($_SESSION['member_id'])){
        header('Location: login/login.php');
    }

    $failure="";
    $success="";
    $db = new CRUD();

    if(!isset($_SESSION['member_id']) ||  empty($_SESSION['member_id'])){
        header('Location: login.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!isset($_POST['pName']) || !isset($_POST['own']) || !isset($_POST['funds']) || !isset($_POST['pDur'])){
            $failure = "Input cannot be blank!";
        } else {
            
            $pName = $_POST['pName'];
            $own = $_POST['own'];
            $funds = $_POST['funds'];
            $pDur = $_POST['pDur'];
            $mode = $_POST['mode'];
            $memberid = $_SESSION['member_id'];
    
            if(strlen($pName) < 1 || strlen($own) < 1 || strlen($funds) < 1 || strlen($pDur) < 1){
                $failure = "Input cannot be blank!";
            } else {
                if(in_array($mode, array(""))){
                    $failure="Select mode for your project!";
                } else {
                    $result = $db->register($pName, $own, $funds, $pDur, $mode, $memberid);
    
                    if($result){
                        $success = "Project Registration Success!";
                    }
                }
            } 
        }
    }
   
    
    /**USE pcrat;

CREATE TABLE project (
	projectID int not null AUTO_INCREMENT PRIMARY KEY,
    pName VARCHAR(100),
    owner VARCHAR(100),
    funds VARCHAR(100),
    pDuration VARCHAR(100),
    mode VARCHAR(100)
); */
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Project Registration</h1>
        <?php
            if($failure !== false){
                echo ("<p style='color:red;'>".htmlentities($failure)."</p>\n");
            }
            
            if($success !== false){
                echo ("<p style='color:green;'>".htmlentities($success)."</p>\n");
            }
        ?>
        <form method="POST">
            <table>
                <tr>
                    <th for="pName">Project Name:</th>
                    <td><input type="text" name="pName" id="pName"></td>
                </tr>
                <tr>
                    <th for="own">Owner:</th>
                    <td><input type="text" name="own" id="own"></td>
                </tr>
                <tr>
                    <th for="funds">Financial/Funds (MYR):</th>
                    <td><input type="text" name="funds" id="funds"></td>
                </tr>
                <tr>
                    <th for="pDur">Project Duration (Weeks):</th>
                    <td><input type="text" name="pDur" id="pDur"></td>
                </tr>
                <tr>
                    <th for="mode">Project Mode:</th>
                    <td>
                        <select id="mode" name="mode">
                            <option value="">Select a mode</option>
                            <option value="insource">Insource</option>
                            <option value="outsource">Outsource</option>
                            <option value="cosource">Co-source</option>
                            <option value="unspecified">Unspecified</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                    <input type="submit" value="Register">
                    </td>
                </tr>
            </table>
        </form>
        <p>Go to <a href="menu.php">main page</a></p>
    </body>
</html>