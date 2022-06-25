<?php
session_start();
require_once "authCookieSessionValidate.php";
if(!$isLoggedIn) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
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
        <h2>Project List</h2>
        <table border="1">
            <tr>
                <th>Project ID</th>
                <th>Project Name</th>
                <th>Owner</th>
                <th>Funds</th>
                <th>Project Duration</th>
                <th>Mode</th>
            </tr>
            <?php
                require_once "sql.php";
                $db = new crud();
                $result = $db->projectList();

                foreach($result as $list){
                    echo '<tr>
                            <td>'.$list['projectID'].'</td>
                            <td>'.$list['pName'].'</td>
                            <td>'.$list['owner'].'</td>
                            <td>'.$list['funds'].'</td>
                            <td>'.$list['pDuration'].'</td>
                            <td>'.$list['mode'].'</td>
                          </tr>';
                }
            ?>
        </table>
        <div class="member-dashboard">
            You have Successfully logged in!. <a href="logout.php">Logout</a>
        </div>
    </body>
</html>