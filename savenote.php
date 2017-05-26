<?php
include('session.php');
include('config.php');

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $expensions= array("pdf","txt","docx");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"notes/".$file_name);

         if(isset($_POST['noteDescription'])){
           $descr = $_POST['noteDescription'];
         } else {
           $descr = "No description given";
         }

         $file = "notes/" . basename( $_FILES["image"]["name"]);

         $user = $_SESSION['login_user'];

         $ses_sql = mysqli_query($conn,"SELECT U_ID FROM USER WHERE U_UNAME = '". mysqli_real_escape_string($conn, $user) ."'");

         $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

         $id = $row['U_ID'];

         $uc = 'Sistemas Web';

         $ses_sql = mysqli_query($conn,"SELECT UC_ID FROM UC WHERE UC_NAME = '". mysqli_real_escape_string($conn, $uc) ."'");

         $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

         $uid = $row['UC_ID'];

         $query = "INSERT INTO NOTE (N_ID, N_NAME, N_U_ID, N_UC_ID, N_FLOCA) VALUES (NULL, '". mysqli_real_escape_string($conn, $descr) ."', '". mysqli_real_escape_string($conn, $id) ."', '". mysqli_real_escape_string($conn, $uid) ."', '". mysqli_real_escape_string($conn, $file) ."');";

         if ($conn->query($query) === TRUE) {
             echo '<div class="alert alert-success alert-dismissable fade in">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Success!</strong> Successfuly added!
         </div>';
         }
      }else{
        echo '<div class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong> Some problem occurred!
        </div>';
      }
   }
?>
<html>
   <body>

      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>

   </body>
</html>
