<?php
$pdo = new PDO('mysql:host=118.101.82.225;port=3306;dbname=pcrat', 
   'remote_user', 'asd123asd123',[PDO::ATTR_TIMEOUT=>90]);
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
