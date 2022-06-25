<?php

session_start();
require_once "sql.php";
if (isset($_SESSION['projectID']) && !empty($_SESSION['projectID'])) {
  $projectID = $_SESSION['projectID'];
} else {
  header('Location: menu.php');
}

?>
<!DOCTYPE html>
<html>

<head>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>
  <h1>Summary and Result</h1>
  <div class="tab">
    <button class="tablinks" onclick="openSection(event, 'projchar')">Project Characteristics</button>
    <button class="tablinks" onclick="openSection(event, 'stramanagerisk')">Strategic Management Risks</button>
    <button class="tablinks" onclick="openSection(event, 'procrisk')">Procurement Risks</button>
    <button class="tablinks" onclick="openSection(event, 'hrrisk')">Human Resource Risks</button>
    <button class="tablinks" onclick="openSection(event, 'busrisk')">Business Risks</button>
    <button class="tablinks" onclick="openSection(event, 'pmirisk')">Project Management Integration Risks</button>
    <button class="tablinks" onclick="openSection(event, 'prrisk')">Project Requirement Risks</button>
    <button class="tablinks" onclick="openSection(event, 'overall')">Overall</button>
  </div>

  <div id="projchar" class="tabcontent">
    <h3>Project Characteristics</h3>
    <?php

    $db = new crud;
    $result = $db->getSectionResultBySection($projectID, 1);
    echo "<div class='display-6'>Section Score: " . $result['value'] . "/" . $result['maxscore'] . "</div>";
    echo '<br><div class="progress" style="height: 50px;">
  <div class="progress-bar" role="progressbar" style="width: ' . $result['value'] / $result['maxscore'] * 100 . '%;" aria-valuenow="' . $result['value'] . '" aria-valuemin="0" aria-valuemax="' . $result['maxscore'] . '">' . $result['value'] . '/' . $result['maxscore'] . '</div>
</div>';

    ?>
    <div style="text-align: center;font-size:22px;">A high score in this category is an indication that the project has a high degree of complexity and risk and will require more extensive project management practices and discipline.</div>
  </div>
  <div id="stramanagerisk" class="tabcontent">
    <h3>Strategic Management Risks</h3>
    <?php

    $db = new crud;
    $result = $db->getSectionResultBySection($projectID, 2);
    echo "<div class='display-6'>Section Score: " . $result['value'] . "/" . $result['maxscore'] . "</div>";
    echo '<br><div class="progress" style="height: 50px;">
<div class="progress-bar" role="progressbar" style="width: ' . $result['value'] / $result['maxscore'] * 100 . '%;" aria-valuenow="' . $result['value'] . '" aria-valuemin="0" aria-valuemax="' . $result['maxscore'] . '">' . $result['value'] . '/' . $result['maxscore'] . '</div>
</div>';

    ?>
    <div style="text-align: center;font-size:22px;">A high score for this category may be an indication that the project will be challenged with respect to communicating and maintaining alignment with the organization's mandate, objectives or priorities as described in its strategic plan, Program Alignment Architecture or Report on Plans and Priorities, and remaining an investment priority over the project life-cycle. Thus, the project may be at risk of not delivering against the defined baseline and support the organization's objectives.</div>
  </div>
  <div id="procrisk" class="tabcontent">
    <h3>Procurement Risks</h3>
    <?php

    $db = new crud;
    $result = $db->getSectionResultBySection($projectID, 3);
    echo "<div class='display-6'>Section Score: " . $result['value'] . "/" . $result['maxscore'] . "</div>";
    echo '<br><div class="progress" style="height: 50px;">
<div class="progress-bar" role="progressbar" style="width: ' . $result['value'] / $result['maxscore'] * 100 . '%;" aria-valuenow="' . $result['value'] . '" aria-valuemin="0" aria-valuemax="' . $result['maxscore'] . '">' . $result['value'] . '/' . $result['maxscore'] . '</div>
</div>';

    ?>
    <div style="text-align: center;font-size:22px;">
      <p>A high score in this category may indicate that there could be an absence of procurement management activities or processes that seek to ensure the appropriate selection and management of vendors. It may further indicate :</p>
      <ul>
        <li>Potential issues regarding the quality or compatibility of procured goods and/or services; and</li>
        <li>Potential risk of vendor dependency, scope and requirements management, cost and schedule control of the contract(s).</li>
      </ul>
    </div>
  </div>
  <div id="hrrisk" class="tabcontent">
    <h3>Human Resource Risks</h3>
    <?php

    $db = new crud;
    $result = $db->getSectionResultBySection($projectID, 4);
    echo "<div class='display-6'>Section Score: " . $result['value'] . "/" . $result['maxscore'] . "</div>";
    echo '<br><div class="progress" style="height: 50px;">
<div class="progress-bar" role="progressbar" style="width: ' . $result['value'] / $result['maxscore'] * 100 . '%;" aria-valuenow="' . $result['value'] . '" aria-valuemin="0" aria-valuemax="' . $result['maxscore'] . '">' . $result['value'] . '/' . $result['maxscore'] . '</div>
</div>';

    ?>
    <div style="text-align: center;font-size:22px;">
      <p>A high score in this category is an indicator that the project's scope and schedule may be at risk due to potential human resourcing issues such as:</p>
      <ul>
        <li>Inadequate subject matter expertise, in particular, with respect to relevant and available technology, industry best practices or project management skills;</li>
        <li>Understaffing; and</li>
        <li>High degree of staff turnover.</li>
      </ul>
    </div>
  </div>
  <div id="busrisk" class="tabcontent">
    <h3>Business Risks</h3>
    <?php

    $db = new crud;
    $result = $db->getSectionResultBySection($projectID, 5);
    echo "<div class='display-6'>Section Score: " . $result['value'] . "/" . $result['maxscore'] . "</div>";
    echo '<br><div class="progress" style="height: 50px;">
<div class="progress-bar" role="progressbar" style="width: ' . $result['value'] / $result['maxscore'] * 100 . '%;" aria-valuenow="' . $result['value'] . '" aria-valuemin="0" aria-valuemax="' . $result['maxscore'] . '">' . $result['value'] . '/' . $result['maxscore'] . '</div>
</div>';

    ?>
    <div style="text-align: center;font-size:22px;">A high score in this area is an indication that the project may experience challenges in transitioning the project deliverables or solutions (goods or services) to the client or user. Challenges may include issues with client or user acceptance of the product, extending the project's normalization or transition period, or a change in scope with respect to training or change management.</div>
  </div>
  <div id="pmirisk" class="tabcontent">
    <h3>Project Management Integration Risks</h3>
    <?php

    $db = new crud;
    $result = $db->getSectionResultBySection($projectID, 6);
    echo "<div class='display-6'>Section Score: " . $result['value'] . "/" . $result['maxscore'] . "</div>";
    echo '<br><div class="progress" style="height: 50px;">
<div class="progress-bar" role="progressbar" style="width: ' . $result['value'] / $result['maxscore'] * 100 . '%;" aria-valuenow="' . $result['value'] . '" aria-valuemin="0" aria-valuemax="' . $result['maxscore'] . '">' . $result['value'] . '/' . $result['maxscore'] . '</div>
</div>';

    ?>
    <div style="text-align: center;font-size:22px;">A high score in this area is an indication that the project management framework of the department may not be sufficient or that the project team may not have the skills or experience to establish or employ well integrated control mechanisms, and, as a result, may be challenged with respect to control, prioritization, informed decision making, and effective and timely communication.</div>
  </div>
  <div id="prrisk" class="tabcontent">
    <h3>Project Requirement Risks</h3>
    <?php

    $db = new crud;
    $result = $db->getSectionResultBySection($projectID, 7);
    echo "<div class='display-6'>Section Score: " . $result['value'] . "/" . $result['maxscore'] . "</div>";
    echo '<br><div class="progress" style="height: 50px;">
<div class="progress-bar" role="progressbar" style="width: ' . $result['value'] / $result['maxscore'] * 100 . '%;" aria-valuenow="' . $result['value'] . '" aria-valuemin="0" aria-valuemax="' . $result['maxscore'] . '">' . $result['value'] . '/' . $result['maxscore'] . '</div>
</div>';

    ?>
    <div style="text-align: center;font-size:22px;">A high score may indicate that the project is not prepared to manage potential impacts on schedule, cost and scope as a result of poorly defined requirements. Even if the project is well defined, the requirements may be very complex in nature and the project will require a high degree of capacity in this area in order to be effectively managed.</div>
  </div>
  <div id="overall" class="tabcontent">
    <h3>Overall</h3>
    <table class="table">
      <thead>
        <tr class="table-dark">
          <th scope="col">Section</th>
          <th scope="col">Score</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = array();
        for ($i = 1; $i <= 7; $i++) {
          $result[] = $db->getSectionResultBySection($projectID, $i);
        }
        $total = 0;
        $max = 0;
        foreach ($result as $array) {
          echo '<tr>
        <td scope="row">' . $array['sectionname'] . '</td>
        <td>' . $array['value'] . '/' . $array['maxscore'] . '</td>
        </tr>';

          $total += $array['value'];
          $max += $array['maxscore'];
        }

        echo '<tr class="table-dark">
      <td scope="row" >Overall</td>
      <td>' . $total . '/' . $max . '</td>
      </tr>';
        ?>
      </tbody>
    </table>
    <?php
    echo '<br><div class="progress" style="height: 50px;">
    <div class="progress-bar" role="progressbar" style="width: ' . $total / $max * 100 . '%;" aria-valuenow="' . $total . '" aria-valuemin="0" aria-valuemax="' . $max . '">' . $total . '/' . $max . '</div>
    </div>';
    $score = ($total / ($max * 0.7))*100;
    $result = $db->getCRL($score);
    echo 'Complexity and Risk Level: <strong>' . $result['name'] . '</strong><br>';
    echo "Definition: " . $result['definition'];
    ?>
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

<!--   <div><canvas id="myChart"></canvas>
</div>

<script>
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>-->