<?php 
session_start();

if(!isset($_SESSION['member_id']) ||  empty($_SESSION['member_id'])){
  header('Location: login/login.php');
}


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>

<h2>Information</h2>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'calcMethod')">Calculation Method</button>
  <button class="tablinks" onclick="openCity(event, 'ques')">Questions</button>
  <button class="tablinks" onclick="openCity(event, 'secDes')">Section Description</button>
  <button class="tablinks" onclick="openCity(event, 'defi')">Definition</button>
</div>

<div id="calcMethod" class="tabcontent">
  <h3>Calculation Method</h3>
  <table border="1">
    <th></th>
    <th>Method</th>
    <?php
    require_once "sql.php";
    $db = new crud();
    $result = $db->calcMethod();

    foreach ($result as $method) {
      echo '<tr>
              <td>' . $method['id'] . '</td>
              <td>' . $method['method'] . '</td>
              </tr>';
    }
    ?>

  </table>
</div>

<div id="ques" class="tabcontent">
  <h3>Questions</h3>
  <table border="1">
    <th></th>
    <th>Question</th>
    <?php
    require_once "sql.php";
    $db = new crud();
    $result = $db->readQuestions(1);
    foreach ($result as $question) {
      echo '<tr>
              <td>' . $question['id'] . '</td>
              <td>' . $question['question'] . '</td>
            </tr>';
    }
    $result = $db->readQuestions(2);
    foreach ($result as $question) {
      echo '<tr>
              <td>' . $question['id'] . '</td>
              <td>' . $question['question'] . '</td>
            </tr>';
    }
    $result = $db->readQuestions(3);
    foreach ($result as $question) {
      echo '<tr>
              <td>' . $question['id'] . '</td>
              <td>' . $question['question'] . '</td>
            </tr>';
    }
    $result = $db->readQuestions(4);
    foreach ($result as $question) {
      echo '<tr>
              <td>' . $question['id'] . '</td>
              <td>' . $question['question'] . '</td>
            </tr>';
    }
    $result = $db->readQuestions(5);
    foreach ($result as $question) {
      echo '<tr>
              <td>' . $question['id'] . '</td>
              <td>' . $question['question'] . '</td>
            </tr>';
    }
    $result = $db->readQuestions(6);
    foreach ($result as $question) {
      echo '<tr>
              <td>' . $question['id'] . '</td>
              <td>' . $question['question'] . '</td>
            </tr>';
    }
    $result = $db->readQuestions(7);
    foreach ($result as $question) {
      echo '<tr>
              <td>' . $question['id'] . '</td>
              <td>' . $question['question'] . '</td>
            </tr>';
    }
    ?>

  </table>
</div>

<div id="secDes" class="tabcontent">
  <h3>Section Description</h3>
  <table border="1">
    <th></th>
    <th>Section</th>
    <th>Description</th>
    <?php
    require_once "sql.php";
    $db = new crud();
    $result = $db->readSection();

    foreach ($result as $section) {
      echo '<tr>
              <td>' . $section['id'] . '</td>
              <td>' . $section['name'] . '</td>
              <td>' . $section['description'] . '</td>
            </tr>';
    }
    ?>

  </table>
</div>

<div id="defi" class="tabcontent">
  <h3>Definition</h3>
  <table border="1">
    <th></th>
    <th>Complexity and Risk Level</th>
    <th>Definition</th>
    <th>Minimum Score</th>
    <th>Maximum Score</th>
    <th>Action</th>
    <?php
    require_once "sql.php";
    $db = new crud();
    $result = $db->complexity();

    foreach ($result as $risk) {
      echo '<tr>
              <td>'.$risk['id'].'</td>
              <td>'.$risk['name'].'</td>
              <td>'.$risk['definition'].'</td>
              <td>'.$risk['minscore'].'</td>
              <td>'.$risk['maxscore'].'</td> 
              <td>';
              echo '<a href="modifyComplexity.php?id='.$risk['id'].'">Edit</a>
              </td>
              </tr>';
    }
    ?>

  </table>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 