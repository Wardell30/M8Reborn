<?php
  include("session.php");
  include("config.php");

  $name = $_GET['name'];
  $color = $_GET['color'];
  $descr = $_GET['descr'];

  $start = $end = "";

  if(isset($_GET['start']) && isset($_GET['end'])){
    $start = $_GET['start'];
    $end = $_GET['end'];

    $query = "UPDATE TASK SET TA_START = '". mysqli_real_escape_string($conn, $start) ."', TA_END = '". mysqli_real_escape_string($conn, $end) ."' WHERE TASK.TA_NAME = '". mysqli_real_escape_string($conn, $name) ."';";

    if ($conn->query($query) === TRUE) {
    }


  } else {
    $query = "INSERT INTO TASK (TA_ID, TA_NAME, TA_START, TA_END, TA_COLOR, TA_DESCR) VALUES (NULL, '". mysqli_real_escape_string($conn, $name) ."', '". mysqli_real_escape_string($conn, $start) ."', '". mysqli_real_escape_string($conn, $end) ."', '". mysqli_real_escape_string($conn, $color) ."', '". mysqli_real_escape_string($conn, $descr) ."');";

    if ($conn->query($query) === TRUE) {

      $user = $_SESSION['login_user'];

      $ses_sql = mysqli_query($conn,"SELECT U_ID FROM USER WHERE U_UNAME = '". mysqli_real_escape_string($conn, $user) ."'");

      $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

      $uid = $row['U_ID'];

      $ses_sql = mysqli_query($conn,"SELECT TA_ID FROM TASK WHERE TA_NAME = '". mysqli_real_escape_string($conn, $name) ."'");

      $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

      $tid = $row['TA_ID'];

      $query = "INSERT INTO UTASK (UT_TA_ID, UT_U_ID) VALUES ('". mysqli_real_escape_string($conn, $tid) ."', '". mysqli_real_escape_string($conn, $uid) ."');";

      if ($conn->query($query) === TRUE) {
      }
    }
  }
?>
