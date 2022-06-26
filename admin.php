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
  </style>
</head>

<body>

  <h2>Questions</h2>
  <p>Sections</p>

  <div class="tab">
    <button class="tablinks" onclick="openSection(event, 'projchar')">Project Characteristics</button>
    <button class="tablinks" onclick="openSection(event, 'stramanagerisk')">Strategic Management Risks</button>
    <button class="tablinks" onclick="openSection(event, 'procrisk')">Procurement Risks</button>
    <button class="tablinks" onclick="openSection(event, 'hrrisk')">Human Resource Risks</button>
    <button class="tablinks" onclick="openSection(event, 'busrisk')">Business Risks</button>
    <button class="tablinks" onclick="openSection(event, 'pmirisk')">Project Management Integration Risks</button>
    <button class="tablinks" onclick="openSection(event, 'prrisk')">Project Requirement Risks</button>
  </div>

  <div id="projchar" class="tabcontent">
    <h3>Project Characteristics</h3>
    <table border="1">
      <th></th>
      <th>Knowledge Area</th>
      <th>Question</th>
      <th>Clarifications</th>
      <th>Rating</th>
      <th>Action</th>
      <?php
      require_once "sql.php";
      $db = new crud();
      $result = $db->readQuestions(1);

      foreach ($result as $question) {
        echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td>' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
        $result2 = $db->readRating($question['id']);
        foreach ($result2 as $rating) {
          if ($rating['value'] == 1) {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          } else {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          }
        }
        echo '</td>';
        echo '<td>';
        echo ('<a href="modifyQuestion.php?id='.$question['id'].'">Edit</a> '); 
        echo '</td>
            </tr>';
      }
      ?>

    </table>
  </div>

  <div id="stramanagerisk" class="tabcontent">
    <h3>Strategic Management Risks</h3>
    <table border="1">
      <th></th>
      <th>Knowledge Area</th>
      <th>Question</th>
      <th>Clarifications</th>
      <th>Rating</th>
      <th>Action</th>
      <?php
      require_once "sql.php";
      $db = new crud();
      $result = $db->readQuestions(2);

      foreach ($result as $question) {
        echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td>' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
        $result2 = $db->readRating($question['id']);
        foreach ($result2 as $rating) {
          if ($rating['value'] == 1) {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          } else {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          }
        }
        echo '</td>';
        echo '<td>';
        echo ('<a href="modifyQuestion.php?id='.$question['id'].'">Edit</a> '); 
        echo '</td>
            </tr>';
      }
      ?>

    </table>
  </div>

  <div id="procrisk" class="tabcontent">
    <h3>Procurement Risks</h3>
    <table border="1">
      <th></th>
      <th>Knowledge Area</th>
      <th>Question</th>
      <th>Clarifications</th>
      <th>Rating</th>
      <th>Action</th>
      <?php
      require_once "sql.php";
      $db = new crud();
      $result = $db->readQuestions(3);

      foreach ($result as $question) {
        echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td>' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
        $result2 = $db->readRating($question['id']);
        foreach ($result2 as $rating) {
          if ($rating['value'] == 1) {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          } else {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          }
        }
        echo '</td>';
        echo '<td>';
        echo ('<a href="modifyQuestion.php?id='.$question['id'].'">Edit</a> '); 
        echo '</td>
            </tr>';
      }
      ?>

    </table>
  </div>

  <div id="hrrisk" class="tabcontent">
    <h3>Human Resource Risks</h3>
    <table border="1">
      <th></th>
      <th>Knowledge Area</th>
      <th>Question</th>
      <th>Clarifications</th>
      <th>Rating</th>
      <th>Action</th>
      <?php
      require_once "sql.php";
      $db = new crud();
      $result = $db->readQuestions(4);

      foreach ($result as $question) {
        echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td>' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
        $result2 = $db->readRating($question['id']);
        foreach ($result2 as $rating) {
          if ($rating['value'] == 1) {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          } else {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          }
        }
        echo '</td>';
        echo '<td>';
        echo ('<a href="modifyQuestion.php?id='.$question['id'].'">Edit</a> '); 
        echo '</td>
            </tr>';
      }
      ?>

    </table>
  </div>

  <div id="busrisk" class="tabcontent">
    <h3>Business Risks</h3>
    <table border="1">
      <th></th>
      <th>Knowledge Area</th>
      <th>Question</th>
      <th>Clarifications</th>
      <th>Rating</th>
      <th>Action</th>
      <?php
      require_once "sql.php";
      $db = new crud();
      $result = $db->readQuestions(5);

      foreach ($result as $question) {
        echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td>' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
        $result2 = $db->readRating($question['id']);
        foreach ($result2 as $rating) {
          if ($rating['value'] == 1) {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          } else {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          }
        }
        echo '</td>';
        echo '<td>';
        echo ('<a href="modifyQuestion.php?id='.$question['id'].'">Edit</a> '); 
        echo '</td>
            </tr>';
      }
      ?>

    </table>
  </div>

  <div id="pmirisk" class="tabcontent">
    <h3>Project Management Integration Risks</h3>
    <table border="1">
      <th></th>
      <th>Knowledge Area</th>
      <th>Question</th>
      <th>Clarifications</th>
      <th>Rating</th>
      <th>Action</th>
      <?php
      require_once "sql.php";
      $db = new crud();
      $result = $db->readQuestions(6);

      foreach ($result as $question) {
        echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td>' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
        $result2 = $db->readRating($question['id']);
        foreach ($result2 as $rating) {
          if ($rating['value'] == 1) {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          } else {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          }
        }
        echo '</td>';
        echo '<td>';
        echo ('<a href="modifyQuestion.php?id='.$question['id'].'">Edit</a> '); 
        echo '</td>
            </tr>';
      }
      ?>

    </table>
  </div>

  <div id="prrisk" class="tabcontent">
    <h3>Project Requirement Risks</h3>
    <table border="1">
      <th></th>
      <th>Knowledge Area</th>
      <th>Question</th>
      <th>Clarifications</th>
      <th>Rating</th>
      <th>Action</th>
      <?php
      require_once "sql.php";
      $db = new crud();
      $result = $db->readQuestions(7);

      foreach ($result as $question) {
        echo '<tr>
                <td>' . $question['id'] . '</td>
                <td>' . $question['knowledgearea'] . '</td>
                <td>' . $question['question'] . '</td>
                <td>' . $question['clarification'] . '</td>
                <td>';
        $result2 = $db->readRating($question['id']);
        foreach ($result2 as $rating) {
          if ($rating['value'] == 1) {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\" checked><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          } else {
            echo "<input type=\"radio\" id=\"" . $rating['value'] . "\" name=\"q" . $question['id'] . "\" value=\"" . $rating['value'] . "\"><label for=\"" . $rating['value'] . "\" >" . $rating['value'] . "-" . $rating['ratingtext'] . "</label><br>\n";
          }
        }
        echo '</td>';
        echo '<td>';
        echo ('<a href="modifyQuestion.php?id='.$question['id'].'">Edit</a> '); 
        echo '</td>
            </tr>';
      }
      ?>

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

</body>

</html>