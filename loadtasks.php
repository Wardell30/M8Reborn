<?php
  include("session.php");
  include("config.php");

  $user = $_SESSION['login_user'];

  $ses_sql = mysqli_query($conn,"SELECT U_ID FROM USER WHERE U_UNAME = '". mysqli_real_escape_string($conn, $user) ."'");

  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

  $uid = $row['U_ID'];

  $result = mysqli_query($conn,"SELECT UT_TA_ID FROM UTASK WHERE UT_U_ID = '". mysqli_real_escape_string($conn, $uid) ."'");

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $tid = $row['UT_TA_ID'];

      $ses_sql = mysqli_query($conn,"SELECT * FROM TASK WHERE TA_ID = '". mysqli_real_escape_string($conn, $tid) ."'");

      if ($ses_sql->num_rows > 0) {
        while($line = $ses_sql->fetch_assoc()) {
          $taskName = $line['TA_NAME'];
          $start = $line['TA_START'];
          $end = $line['TA_END'];
          $color = $line['TA_COLOR'];
          $descr = $line['TA_DESCR'];
        }
      }

      echo $taskName . ";" . $start . ";" . $end . ";" . $color . ";" . $descr . "/";
    }
  }
?>
