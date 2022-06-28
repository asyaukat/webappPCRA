<?php
session_start();

if(!isset($_SESSION['member_id']) ||  empty($_SESSION['member_id'])){
  header('Location: login/login.php');
}


if (isset($_SESSION['projectID']) && !empty($_SESSION['projectID'])) {
  $projectID = $_SESSION['projectID'];
} else {
  header('Location: menu.php');
}

$exp = "/^(6[0-4]|[1-5][0-9]|[1-9])$/";

require_once "sql.php";

$array = array();
$counter = 0;
if (!empty($_POST)) {
  foreach ($_POST as $key => $val) {
    if (strlen($key) == 2 && substr($key, 0, 1) == 'q' && preg_match($exp, substr($key, -1, 1))) {
      $array[substr($key, -1, 1)] = $val;
      $counter++;
    } else if (strlen($key) == 3 && substr($key, 0, 1) == 'q' && preg_match($exp, substr($key, -2))) {
      $array[substr($key, -2)] = $val;
      $counter++;
    } else {
      echo $key . " " . $val . " " . preg_match($exp, substr($key, -1, 2)) . " " . substr($key, -2) . "()";
    }
  }
  $db = new crud();
  $check = $db->checkAnswered($projectID)['answered'];
  $array = tripleConstraint($array);

  if ($counter == 64 && $check == 0) {
    $db->insertAnswer($array, $projectID);
    header('Location: result.php');
  } else if ($counter == 64 && $check == 1) {
    $db->updateAnswer($array, $projectID);
    header('Location: result.php');
  } else {
    echo $counter;
  }
}

function tripleConstraint($array) {
  
  if($array['1'] == 5 && $array['3'] == 5 && $array['11'] == 5) {
    for($i=1;$i <=18;$i++) {
      $array[$i] = 5;
    }

    return $array;
  }
  else
    return $array;
  
}


?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial;
    }

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

    .navbar {
    background-color:#00B98E;
    overflow: hidden;
}

.navbar h2, .navbar a, .navbar span {
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

.navbar a:hover {
    background-color:#ddd;
    color:black;
}

.navbar div.div-right {
    font-size: 15px;
    float:right;
}
.navbar .navlink {
    font-size: 15px;
}
  </style>

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
<link rel="stylesheet" href="css/style.css">
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
h3 {
  color:white;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="navbar">
    <h2>Questions</h2>
    <div class="div-right">
      <a class="navlink" href="menu.php">Project List</a>
    </div>
  </div>
  <p style="font-size: 26px; font-weight: bold; padding-top: 10px;color:white">Sections</p>
  <button type="submit" form="form1">Submit All Answers</button>
  <div class="tab">
    <button class="tablinks" onclick="openSection(event, 'instruction')">Instructions</button>
    <button class="tablinks" onclick="openSection(event, 'projchar')">Project Characteristics</button>
    <button class="tablinks" onclick="openSection(event, 'stramanagerisk')">Strategic Management Risks</button>
    <button class="tablinks" onclick="openSection(event, 'procrisk')">Procurement Risks</button>
    <button class="tablinks" onclick="openSection(event, 'hrrisk')">Human Resource Risks</button>
    <button class="tablinks" onclick="openSection(event, 'busrisk')">Business Risks</button>
    <button class="tablinks" onclick="openSection(event, 'pmirisk')">Project Management Integration Risks</button>
    <button class="tablinks" onclick="openSection(event, 'prrisk')">Project Requirement Risks</button>
  </div>

  <form method="POST" action="questions.php" id="form1">
    <div id="instruction" class="tabcontent">
      <h1 style="width:100%">Instructions</h1>
    <p style = "white-space: pre-wrap;color:white"> 
1.All question must be answered. If you are sure a question does not apply to your project, answer with the lowest score ("1") for that question;
2.If the answer to a question is unknown, answer with the highest score ("5") for that question; and
3.If you answer "1" to Question 2 in the "Project characteristics" section (3.1), questions in the "Procurement risks" section (3.3) should be answered with a "1" only.</p>
    </div>
    <div id="projchar" class="tabcontent">
      <h3>Project Characteristics</h3>
      <table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
      <thead class="thead-dark" style="background-color:black;">  
      <th></th>
        <th>Knowledge Area</th>
        <th>Question</th>
        <th>Clarifications</th>
        <th>Rating</th>
        <?php
        require_once "sql.php";
        $db = new crud();
        $result = $db->readQuestions(1);

        foreach ($result as $question) {
          echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td style = "white-space: pre-wrap">' . $question['question'] . '</td>
                <td style = "white-space: pre-wrap">' . $question['clarification'] . '</td>
                <td>';
          $result2 = $db->readRating($question['id']);
          foreach ($result2 as $rating) {
            if ($rating['value'] == 1) {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            } else {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            }
          }
          echo '</td>
            </tr>';
        }
        ?>
      </thead>
      </table>
    </div>

    <div id="stramanagerisk" class="tabcontent">
      <h3>Strategic Management Risks</h3>
      <table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
      <thead class="thead-dark" style="background-color:black;">
        <th></th>
        <th>Knowledge Area</th>
        <th>Question</th>
        <th>Clarifications</th>
        <th>Rating</th>
        <?php
        require_once "sql.php";
        $db = new crud();
        $result = $db->readQuestions(2);

        foreach ($result as $question) {
          echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td style = "white-space: pre-wrap">' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
          $result2 = $db->readRating($question['id']);
          foreach ($result2 as $rating) {
            if ($rating['value'] == 1) {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            } else {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            }
          }
          echo '</td>
            </tr>';
        }
        ?>
      </thead>
      </table>
    </div>

    <div id="procrisk" class="tabcontent">
      <h3>Procurement Risks</h3>
      <table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
      <thead class="thead-dark" style="background-color:black;">
        <th></th>
        <th>Knowledge Area</th>
        <th>Question</th>
        <th>Clarifications</th>
        <th>Rating</th>
        <?php
        require_once "sql.php";
        $db = new crud();
        $result = $db->readQuestions(3);

        foreach ($result as $question) {
          echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td style = "white-space: pre-wrap">' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
          $result2 = $db->readRating($question['id']);
          foreach ($result2 as $rating) {
            if ($rating['value'] == 1) {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            } else {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            }
          }
          echo '</td>
            </tr>';
        }
        ?>
      </thead>
      </table>
    </div>

    <div id="hrrisk" class="tabcontent">
      <h3>Human Resource Risks</h3>
      <table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
      <thead class="thead-dark" style="background-color:black;">
        <th></th>
        <th>Knowledge Area</th>
        <th>Question</th>
        <th>Clarifications</th>
        <th>Rating</th>
        <?php
        require_once "sql.php";
        $db = new crud();
        $result = $db->readQuestions(4);

        foreach ($result as $question) {
          echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td style = "white-space: pre-wrap">' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
          $result2 = $db->readRating($question['id']);
          foreach ($result2 as $rating) {
            if ($rating['value'] == 1) {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            } else {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            }
          }
          echo '</td>
            </tr>';
        }
        ?>
      </thead>
      </table>
    </div>

    <div id="busrisk" class="tabcontent">
      <h3>Business Risks</h3>
      <table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
      <thead class="thead-dark" style="background-color:black;">
        <th></th>
        <th>Knowledge Area</th>
        <th>Question</th>
        <th>Clarifications</th>
        <th>Rating</th>
        <?php
        require_once "sql.php";
        $db = new crud();
        $result = $db->readQuestions(5);

        foreach ($result as $question) {
          echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td style = "white-space: pre-wrap">' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
          $result2 = $db->readRating($question['id']);
          foreach ($result2 as $rating) {
            if ($rating['value'] == 1) {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            } else {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            }
          }
          echo '</td>
            </tr>';
        }
        ?>
      </thead>
      </table>
    </div>

    <div id="pmirisk" class="tabcontent">
      <h3>Project Management Integration Risks</h3>
      <table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
      <thead class="thead-dark" style="background-color:black;">
        <th></th>
        <th>Knowledge Area</th>
        <th>Question</th>
        <th>Clarifications</th>
        <th>Rating</th>
        <?php
        require_once "sql.php";
        $db = new crud();
        $result = $db->readQuestions(6);

        foreach ($result as $question) {
          echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td style = "white-space: pre-wrap">' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
          $result2 = $db->readRating($question['id']);
          foreach ($result2 as $rating) {
            if ($rating['value'] == 1) {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            } else {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            }
          }
          echo '</td>
            </tr>';
        }
        ?>
      </thead>
      </table>
    </div>

    <div id="prrisk" class="tabcontent">
      <h3>Project Requirement Risks</h3>
      <table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
      <thead class="thead-dark" style="background-color:black;">
        <th></th>
        <th>Knowledge Area</th>
        <th>Question</th>
        <th>Clarifications</th>
        <th>Rating</th>
        <?php
        require_once "sql.php";
        $db = new crud();
        $result = $db->readQuestions(7);

        foreach ($result as $question) {
          echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td style = "white-space: pre-wrap">' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
          $result2 = $db->readRating($question['id']);
          foreach ($result2 as $rating) {
            if ($rating['value'] == 1) {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            } else {
              echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . " = " . $rating['ratingtext'] . "</label><br>\n";
            }
          }
          echo '</td>
            </tr>';
        }
        ?>
      </thead>
      </table>
    </div>

    <script>
      function openSection(evt, cityName) {
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
  </form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>