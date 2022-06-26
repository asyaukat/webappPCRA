<?php

session_start();

if(!isset($_SESSION['member_id']) ||  empty($_SESSION['member_id'])){
    header('Location: login/login.php');
}


require_once "sql.php";
$failure="";
$success="";
$db = new crud();


if(isset($_POST['id']) && isset($_POST['name']) && 
isset($_POST['definition']) && isset($_POST['minscore']) &&
isset($_POST['maxscore'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $definition = $_POST['definition'];
    $minscore = $_POST['minscore'];
    $maxscore = $_POST['maxscore'];

    $result = $db->updateComplexity($definition, $id);
}

$result = $db->readComplexity($_GET['id']);
foreach ($result as $read) {
    $id = $read['id'];
    $name = $read['name'];
    $definition = $read['definition'];
    $minscore = $read['minscore']; 
    $maxscore = $read['maxscore'];
}


?>

<h1>Update Complexity & Risk Level Definition</h1>
<form method="POST">
    <p>Name:</p>
    <input type="text" name="name" value="<?= $name ?>" readonly>
    <p>Definition:</p>
    <textarea name="definition" rows="10" cols="40" ><?= $definition ?></textarea>
    <p>Minimum score: 
    <input type="text" size="2" name="minscore" value="<?= $minscore ?>" readonly> </p>
    <p>Maximum score:
    <input type="text" size="2" name="maxscore" value="<?= $maxscore ?>" readonly> </p>

    <input type="hidden" name="id" value="<?= $id ?>">
    <p><input type="submit" value="Update"/>
    <a href="admin.php">Cancel</a></p>
</form>
