<?php
session_start();

if(!isset($_SESSION['member_id']) ||  empty($_SESSION['member_id'])){
    header('Location: login/login.php');
}


require_once "sql.php";
$failure="";
$success="";
$db = new crud();


if(isset($_POST['question']) && isset($_POST['id'])) {
    $question = $_POST['question'];
    $id = $_POST['id'];
   
    $result = $db->updateQuestion($question, $id);

   //$success = "Project Registration Success!";

    if(isset($_POST['ratingtext']) && isset($_POST['value']) && isset($_POST['id'])) {
        $value = $_POST['value'];
        $questionID = $_POST['id'];
        $ratingtext = $_POST['ratingtext'];

        $result2 = $db->updateRating($ratingtext, $value, $questionID);
        header("location: admin.php");
    }
} else {

}

$result = $db->readAQuestion($_GET['id']);
foreach ($result as $read) {
    $id = $read['id'];
    $knowledgeArea = $read['knowledgearea'];
    $question = $read['question']; 
    $clarification = $read['clarification'];
}


 
if($failure !== false){
    echo ("<p style='color:red;'>".htmlentities($failure)."</p>\n");
}
if($success !== false){
    echo ("<p style='color:green;'>".htmlentities($success)."</p>\n");
}
?>

<h1>Update Question</h1>
<form method="POST">
    <p>Knowledge Area:</p>
    <input type="text" style="background-color:#ABABAB" name="knowledgearea" value="<?= $knowledgeArea ?>" readonly>
    <p>Question:</p>
    <textarea  rows="10" cols="55" name="question" ><?= $question ?> </textarea>
    <p>Clarifications:</p>
    <textarea readonly  style="background-color:#ABABAB" rows="10" cols="55" name="clarification" ><?= $clarification ?> </textarea>
    <p>Rating:</p>

    <?php 
        $result2 = $db->readRating($_GET['id']);
        foreach($result2 as $read2) {
            $value = $read2['value'];
            $ratingtext = $read2['ratingtext'];

            echo '<input type="text" style="background-color:#ABABAB" name="value" size="1" value="'.$value.'" readonly>';
            echo " - ";
            echo '<input type="text" name="ratingtext" value="'.$ratingtext.'"><br>';
        }
    ?>
    <input type="hidden" name="id" value="<?= $id ?>">
    <p><input type="submit" value="Update"/>
    <a href="admin.php">Cancel</a></p>
</form>
