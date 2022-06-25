<?php

require_once "pdo.php";

if (!empty($_POST['valueR5']) == true) {
    $sql = "insert into question values(?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['section']);
    $stmt->bindParam(2, $_POST['questionnum']);
    $stmt->bindParam(3, $_POST['knowarea']);
    $stmt->bindParam(4, $_POST['question']);
    $stmt->bindParam(5, $_POST['clari']);

    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR1']);
    $stmt->bindParam(3, $_POST['ratingR1']);
    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR2']);
    $stmt->bindParam(3, $_POST['ratingR2']);
    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR3']);
    $stmt->bindParam(3, $_POST['ratingR3']);
    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR4']);
    $stmt->bindParam(3, $_POST['ratingR4']);
    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR5']);
    $stmt->bindParam(3, $_POST['ratingR5']);
    $stmt->execute();
} else if (!empty($_POST['valueR4']) == true) {
    $sql = "insert into question values(?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['section']);
    $stmt->bindParam(2, $_POST['questionnum']);
    $stmt->bindParam(3, $_POST['knowarea']);
    $stmt->bindParam(4, $_POST['question']);
    $stmt->bindParam(5, $_POST['clari']);

    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR1']);
    $stmt->bindParam(3, $_POST['ratingR1']);
    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR2']);
    $stmt->bindParam(3, $_POST['ratingR2']);
    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR3']);
    $stmt->bindParam(3, $_POST['ratingR3']);
    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR4']);
    $stmt->bindParam(3, $_POST['ratingR4']);
    $stmt->execute();
} else if (!empty($_POST['valueR3']) == true) {

    $sql = "insert into question values(?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['section']);
    $stmt->bindParam(2, $_POST['questionnum']);
    $stmt->bindParam(3, $_POST['knowarea']);
    $stmt->bindParam(4, $_POST['question']);
    $stmt->bindParam(5, $_POST['clari']);

    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR1']);
    $stmt->bindParam(3, $_POST['ratingR1']);
    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR2']);
    $stmt->bindParam(3, $_POST['ratingR2']);
    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR3']);
    $stmt->bindParam(3, $_POST['ratingR3']);
    $stmt->execute();
} else if (!empty($_POST['valueR2']) == true) {

    $sql = "insert into question values(?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['section']);
    $stmt->bindParam(2, $_POST['questionnum']);
    $stmt->bindParam(3, $_POST['knowarea']);
    $stmt->bindParam(4, $_POST['question']);
    $stmt->bindParam(5, $_POST['clari']);

    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR1']);
    $stmt->bindParam(3, $_POST['ratingR1']);
    $stmt->execute();

    $sql = "insert into rating values(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST['questionnum']);
    $stmt->bindParam(2, $_POST['valueR2']);
    $stmt->bindParam(3, $_POST['ratingR2']);
    $stmt->execute();
}





?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <form method="POST" action="insert.php">
        <p> Section number</p>
        <input type="text" name="section"><br>
        <p> Question number</p>
        <input type="text" name="questionnum"><br>
        <p> Knowledge area</p>
        <input type="text" name="knowarea"><br>
        <p> Question</p>
        <textarea name="question"></textarea><br>
        <p> Clarification </p>
        <textarea name="clari"></textarea><br>

        <p> rating 1 </p>
        <input type="text" name="valueR1">
        <input type="text" name="ratingR1"><br>
        <p> rating 2 </p>
        <input type="text" name="valueR2">
        <input type="text" name="ratingR2"><br>
        <p> rating 3 </p>
        <input type="text" name="valueR3">
        <input type="text" name="ratingR3"><br>
        <p> rating 4 </p>
        <input type="text" name="valueR4">
        <input type="text" name="ratingR4"><br>
        <p> rating 5 </p>
        <input type="text" name="valueR5">
        <input type="text" name="ratingR5"><br>

        <input type="submit">
    </form>
</body>

</html>