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
  background-color: #1B2430;
  display: block;
  
}

/* Style the buttons inside the tab */
.tab button,.barlink {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-weight:bold;
  font-family: 'Inter', sans-serif;
  font-size: 17px;
  color: white;
}

.barlink {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-weight:bold;
  font-family: 'Inter', sans-serif;
  font-size: 17px;
  color: white;
}

/* Change background color of buttons on hover */
.tab button:hover,.barlink:hover {
  background-color: #ddd;
  color: #1B2430;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
  color:#4E235F;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

td,th{
      background-color: white;
      color:black;
    }

    h1 {
    float:left;
    text-align: center;
    padding: 14px 16px;
    color: #f2f2f2;
    text-decoration: none;
    font-size: 30px;
    font-weight: bold;
    font-family: 'Inter', sans-serif;
    text-shadow: 3px 3px 6px black;
}

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<h1 style="display:block; width:100%;">Information</h1>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'calcMethod')">Calculation Method</button>
  <button class="tablinks" onclick="openCity(event, 'ques')">Questions</button>
  <button class="tablinks" onclick="openCity(event, 'secDes')">Section Description</button>
  <button class="tablinks" onclick="openCity(event, 'defi')">Definition</button>
  <div style="float:right"><a href="menuController.php" class="barlink">Project List</a></div>
</div>

<div id="calcMethod" class="tabcontent">

  <table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
    <thead class="thead-dark" style="background-color:black;">
    <th>#</th>
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
     </thead>

  </table>
</div>

<div id="ques" class="tabcontent">
  
<table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
    <thead class="thead-dark" style="background-color:black;">
    <th>#</th>
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
   </thead>
  </table>
</div>

<div id="secDes" class="tabcontent">
<table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
    <thead class="thead-dark" style="background-color:black;">
    <th>#</th>
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
</thead>
  </table>
</div>

<div id="defi" class="tabcontent">
<table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
    <thead class="thead-dark" style="background-color:black;">
    <th>#</th>
    <th>Complexity and Risk Level</th>
    <th>Definition</th>
    <th>Minimum Score</th>
    <th>Maximum Score</th>
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
            </tr>';
    }
    ?>
</thead>
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