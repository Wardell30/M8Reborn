<?php
  include("config.php");
  include("session.php");

  $m = $_GET['m'];

  //$ses_sql = mysqli_query($conn,"SELECT U_ID FROM USER WHERE U_UNAME = '". mysqli_real_escape_string($conn, $_SESSION['login_user']) ."'");

  //$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

  //$id = $row['U_ID'];

  $query = "INSERT INTO MESSA (MES_ID ,MES_USER ,MES_TXT ,MES_TIME)VALUES (NULL , '1', '".$m."',CURRENT_TIMESTAMP);";

  if ($conn->query($query) === TRUE) {
      echo $m;
  }
?>
