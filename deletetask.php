<?php
  include("session.php");
  include("config.php");

  $name = $_GET['name'];

  $user = $_SESSION['login_user'];

  $ses_sql = mysqli_query($conn,"SELECT U_ID FROM USER WHERE U_UNAME = '". mysqli_real_escape_string($conn, $user) ."'");

  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

  $uid = $row['U_ID'];

  $ses_sql = mysqli_query($conn,"SELECT TA_ID FROM TASK WHERE TA_NAME = '". mysqli_real_escape_string($conn, $name) ."'");

  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

  $tid = $row['TA_ID'];

  $query2 = "DELETE FROM UTASK WHERE UTASK.UT_TA_ID = '". mysqli_real_escape_string($conn, $tid) ."' AND UTASK.UT_U_ID = '". mysqli_real_escape_string($conn, $uid) ."';";

  if ($conn->query($query2) === TRUE) {
    $query = "DELETE FROM TASK WHERE TA_NAME = '". mysqli_real_escape_string($conn, $name) ."';";

    if ($conn->query($query) === TRUE) {
    }
  }
 ?>
