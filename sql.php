<?php


class crud
{
  public $db;
  function __construct()
  {
    $this->db = new PDO(
      'mysql:host=118.100.40.126;port=3306;dbname=pcrat',
      'remote_user',
      'asd123asd123'
    );
    // See the "errors" folder for details...
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);;
  }
  function readQuestions($sectionID)
  {
    $sql = "select id,knowledgearea,question,clarification from question where sectionID= ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1, $sectionID);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $resultset[] = $row;
    }
    if (!empty($resultset)) {
      return $resultset;
    } else {
      return array();
    }
  }
  function readRating($questionID)
  {
    $sql = "select value,ratingtext from rating where questionID= ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1, $questionID);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $resultset[] = $row;
    }
    if (!empty($resultset)) {
      return $resultset;
    } else {
      return array();
    }
  }

  function register($pName, $own, $funds, $pDur, $mode, $memberid)
  {
    $sql = "INSERT INTO project (pName, owner, funds, pDuration, mode, memberid) VALUES (?, ?, ?, ?, ?,?)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1, $pName);
    $stmt->bindParam(2, $own);
    $stmt->bindParam(3, $funds);
    $stmt->bindParam(4, $pDur);
    $stmt->bindParam(5, $mode);
    $stmt->bindParam(6, $memberid);
    $stmt->execute();

    if ($stmt) {
      return $success = "success";
    }
  }

  function projectList($memberid)
  {
    $sql = "SELECT * FROM project where memberid = ? ";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1,$memberid);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $resultset[] = $row;
    }
    if (!empty($resultset)) {
      return $resultset;
    } else {
      return array();
    }
  }

  function insertAnswer($answer, $projectID)
  {
    $sql = "insert into project_question (questionID,projectID,value) values (?,?,?)";

    try {
      $stmt =  $this->db->prepare($sql);

      $this->db->beginTransaction();


      $stmt->bindParam(2, $projectID);

      foreach ($answer as $key => $val) {
        $stmt->bindParam(1, $key);
        $stmt->bindParam(3, $val);
        $stmt->execute();
      }

      $sql = "update project set answered = ? where projectID = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(1, 1);
      $stmt->bindParam(2, $projectID);
      $stmt->execute();

      $this->db->commit();
    } catch (\Exception $e) {
      if ($this->db->inTransaction()) {
        $this->db->rollback();
        // If we got here our two data updates are not in the database
      }
      throw $e;
    }
  }

  function checkAnswered($projectID)
  {
    $sql = "SELECT answered FROM project where projectID = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1, $projectID);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $row;
    }
    if (!empty($resultset)) {
      return $resultset;
    } else {
      return array();
    }
  }

  function updateAnswer($answer, $projectID)
  {
    $sql = "update project_question set value = ? where projectid = ? and questionID = ?";

    try {
      $stmt =  $this->db->prepare($sql);

      $this->db->beginTransaction();

      $stmt->bindParam(2, $projectID);

      foreach ($answer as $key => $val) {
        $stmt->bindParam(3, $key);
        $stmt->bindParam(1, $val);
        $stmt->execute();
      }

      $this->db->commit();
    } catch (\Exception $e) {
      if ($this->db->inTransaction()) {
        $this->db->rollback();
        // If we got here our two data updates are not in the database
      }
      throw $e;
    }
  }

  function getResultBySection($projectID, $sectionID)
  {
    $sql = "SELECT sum(a.value) as value FROM project_question a JOIN question b ON (a.questionID = b.id) where a.projectID = ? and b.sectionID = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1, $projectID);
    $stmt->bindParam(2, $sectionID);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $row;
    }
    if (!empty($resultset)) {
      return $resultset;
    } else {
      return array();
    }
  }


  
  function getSectionResultBySection($projectID, $sectionID)
  {
    $sql = "SELECT c.name as sectionname,sum(a.value)as value,c.maxscore as maxscore FROM project_question a JOIN question b ON (a.questionID = b.id), section c where a.projectID = ? and b.sectionID = ? and c.id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1, $projectID);
    $stmt->bindParam(2, $sectionID);
    $stmt->bindParam(3, $sectionID);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $row;
    }
    if (!empty($resultset)) {
      return $resultset;
    } else {
      return array();
    }
  }

  function getCRL($score)
  {
    $sql = "SELECT name,definition from complexityrisklevel where ?>=minscore and ?<=maxscore;";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1, $score);
    $stmt->bindParam(2, $score);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      return $row;
    }

    if (!empty($resultset)) {
      return $resultset;
    } else {
      return array();
    }
  }
  function readComplexity($id)
  {
    $sql = "SELECT id,name, definition, minscore, maxscore FROM complexityrisklevel WHERE id= ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $resultset[] = $row;
    }
    if (!empty($resultset)) {
      return $resultset;
    } else {
      return array();
    }
  }
  function updateComplexity($definition, $id)
  {
    $sql = "UPDATE complexityrisklevel SET definition=? WHERE id=?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1, $definition);
    $stmt->bindParam(2, $id);

    $stmt->execute();

    if ($stmt) {
      return $success = "success";
    }
  }

  function readAQuestion($id){
    $sql = "select id,knowledgearea,question,clarification from question where id= ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(1,$id);
    $stmt ->execute();

    while ( $row =$stmt->fetch(PDO::FETCH_ASSOC) ) {
        $resultset[] = $row;
      }
      if(!empty($resultset)){
                  return $resultset;
      }
      else{
        return array();
      }
    }
}
