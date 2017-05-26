<?php
   include('config.php');

   if(!isset($_SESSION)){
     session_start();
   }

    if(isset($_SESSION['login_user'])){
        $user_check = $_SESSION['login_user'];
    }

   $ses_sql = mysqli_query($conn,"select L_UNAME from LOGIN where L_UNAME = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['L_UNAME'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
