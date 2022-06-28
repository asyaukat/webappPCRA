<?php
session_start();
if(!empty($_GET)){
  if($_GET['action'] == 'logout'){
    session_destroy();
    header('Location: login/login.php');
  }
}


if (!isset($_SESSION['member_id']) || empty($_SESSION['member_id'])) {
  header('Location: login/login.php');
}
else
  $memberid = $_SESSION['member_id'];

?>
<!DOCTYPE html>
<html>

<head>
  <style>
    td,th{
      background-color: white;
      color:black;
    }
  </style>
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>
  <div class="navbar">
        <span> Project Complexity and Risk Assessment Tool </span>
        <a href="projectRegister.php" style ="display:inline-block;margin-right:1%;margin-left:auto;"><button type="button"  class="btn btn-primary" ><i class="bi bi-plus"></i></button></a>  
        <div class="div-right">
        <a class ="navlink active"  href="menu.php" >Project List</a>
        <a class ="navlink" href="information.php"  >Information</a>
        <a class ="navlink" href="menu.php?action=logout"> Log Out</a>
      </div>
        
  </div>
 
  <h1 style="color: red;display:block;width:100%;margin-left: auto;margin-right: auto;text-align:center"><?php 
  if(isset($_SESSION['answered']) ){
    if( $_SESSION['answered'] == 0){
      echo "Please answer the questions before viewing the results";
      unset($_SESSION['answered']);
    }
  }
  ?></h1>
  
  <div style="height:80vh;width:80%;margin: 50px auto;border-radius:15px;color:white">
    <div style="text-align:center;width:100%">
      <div style="display:inline-block;margin:20px;">
        <table class="table table-bordered" style="color:white;font-family: 'Inter', sans-serif;">
          <thead class="thead-dark" style="background-color:black;">
            <tr>
              <th scope="col">Project ID</th>
              <th scope="col">Project Name</th>
              <th scope="col">Owner</th>
              <th scope="col">Funds</th>
              <th scope="col">Project Duration</th>
              <th scope="col">Mode</th>
              <th scope="col">Question</th>
              <th scope="col">Result</th>
            </tr>
          </thead>
          <tbody>
            <form method="POST" action="menuController.php">
              <?php
              require_once "sql.php";
              $db = new crud();
              $result = $db->projectList($memberid);

              foreach ($result as $list) {
                echo '<tr>
                            <th scope="row">' . $list['projectID'] . '</td>
                            <td>' . $list['pName'] . '</td>
                            <td>' . $list['owner'] . '</td>
                            <td>' . $list['funds'] . '</td>
                            <td>' . $list['pDuration'] . '</td>
                            <td>' . $list['mode'] . '</td>
                            <td><button type="submit" class="btn btn-dark" name="viewquestions" value="' . $list['projectID'] . '"/>View Questions</button></td>
                            <td><button type="submit" class="btn btn-dark" name="viewresult" value="' . $list['projectID'] . '"/>View Result</button></td>
                          </tr>';
              }
              ?>
            </form>
          </tbody>
          </form>
        </table>

      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>