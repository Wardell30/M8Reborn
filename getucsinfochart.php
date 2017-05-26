<?php
  include('session.php');
  include('config.php');

  $ses_sql = mysqli_query($conn,"SELECT * FROM USER WHERE U_UNAME = '". mysqli_real_escape_string($conn, $_SESSION['login_user']) ."'");

  $row2 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

  $coID = $row2['U_CO_ID'];

  $result = mysqli_query($conn, "SELECT * FROM UC WHERE UC_CO = '". mysqli_real_escape_string($conn, $coID) ."'");

  $ucsArray = array();

  $ucsCourse = array();

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $ucName = $row['UC_NAME'];
    $ucID = $row['UC_ID'];

    array_push($ucsCourse, array($ucID, $ucName));
  }

  $queryHelper = "";

  foreach ($ucsCourse as $row => $value) {
    if($queryHelper == ""){
      $queryHelper .= "N_UC_ID = " . $value[0];
    } else {
      $queryHelper .= " OR N_UC_ID = " . $value[0];
    }
  }

  $echoVariabale = "";

  foreach ($ucsCourse as $row => $value) {
    $result = mysqli_query($conn, "SELECT * FROM NOTE WHERE N_UC_ID = '". mysqli_real_escape_string($conn, $value[0]) ."'");

    $ucNotesCount = 0;

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $ucNotesCount++;
    }

    $echoVariabale .= $value[1] . ',' . $ucNotesCount . ';';
  }

  $result = mysqli_query($conn, "SELECT * FROM NOTE WHERE " . $queryHelper);

  $count = 0;

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $count++;
  }

  if($count == 0){
    $echoVariabale = "No info, 100";
  }

  echo $echoVariabale;

 ?>
