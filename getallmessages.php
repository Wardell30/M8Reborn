<?php
  include("config.php");
  error_reporting(E_ALL ^ E_WARNING);

  $ses_sql = mysqli_query($conn,"SELECT * FROM MESSA");

  while ($row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC)){
    $id = $row['MES_ID'];
    $message = $row['MES_TXT'];
    $time = $row['MES_TIME'];
    $delivered = $row['MES_DEL'];

    echo $message . " Time: " . $time;
  }
?>
