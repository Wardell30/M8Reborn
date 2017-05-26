<?php
    include('session.php');
    include('config.php');
    require_once('sidebar.php');
    require_once('topnavbar.php');

    error_reporting(E_ALL ^ E_WARNING);
    error_reporting(E_ALL | E_STRICT);

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

            $uc = $_GET['uc'];

            str_replace("%20", " ", $uc);

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
              <div class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="card">
                          <div class="chatTo">
                            <?php
                            $ses_sql = mysqli_query($conn,"SELECT * FROM USER WHERE U_UNAME = '". mysqli_real_escape_string($conn, $_SESSION['login_user']) ."'");

                            $row2 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                            $coID = $row2['U_CO_ID'];

                            $ses_sql = mysqli_query($conn,"SELECT * FROM COURSE WHERE CO_ID = '". mysqli_real_escape_string($conn, $coID) ."'");

                            $row2 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                            $coName = $row2['CO_NAME'];

                            echo '<h4>'.$coName.'</h4>';
                             ?>
                          </div>
                          <div class="scrollPeople">
                            <ul class="people">
                              <?php
                                $dataUC = 1;

                                $ses_sql = mysqli_query($conn,"SELECT * FROM USER WHERE U_UNAME = '". mysqli_real_escape_string($conn, $_SESSION['login_user']) ."'");

                                $row2 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                                $coID = $row2['U_CO_ID'];

                                $result = mysqli_query($conn, "SELECT * FROM UC WHERE UC_CO = '". mysqli_real_escape_string($conn, $coID) ."'");

                                $ucsArray = array();

                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                  $ucName = $row['UC_NAME'];
                                  $ucID = $row['UC_ID'];

                                  array_push($ucsArray, array($ucID, $dataUC));

                                  echo '<li class="person not" data-uc="uc'.$dataUC.'">
                                    <span class="name course" id="name'.$dataUC.'">'.$ucName.'</span>
                                  </li>';
                                  $dataUC++;
                                }
                               ?>
                            </ul>
                          </div>
                          <div id="freeSpace">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="card">
                          <div class="chatContainer">
                            <div class="chatTo">
                              <h4 id="ucName">UC Name</h4>
                            </div>
                            <div class="notesDiv" id="notesDiv">
                              <?php
                                foreach ($ucsArray as $row => $value) {
                                  echo '<div class="chat" data-uc="uc'.$value[1].'" id="uc'.$value[1].'">
                                    <div class="scrollPeople">
                                      <ul class="people">';

                                      $ucID = $value[0];

                                      $result = mysqli_query($conn, "SELECT * FROM NOTE WHERE N_UC_ID = '". mysqli_real_escape_string($conn, $ucID) ."'");

                                      $flag = false;

                                      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $ses_sql = mysqli_query($conn,"SELECT * FROM USER WHERE U_ID = '". mysqli_real_escape_string($conn, $row['N_U_ID']) ."'");

                                        $row2 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                                        $fName = $row2['U_FN'];
                                        $lName = $row2['U_LN'];

                                        $fullName = $fName . ' ' . $lName;

                                        echo '<a href="'.$row['N_FLOCA'].'" target="_blank"><li class="person">
                                          <span class="fileType"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></span>
                                          <span class="name">By: <a href="profile.php?public=true&userID='.$row['N_U_ID'].'" target="_blank">'.$fullName.'</a></span>
                                          <span class="description"><a href="'.$row['N_FLOCA'].'" target="_blank">'.$row['N_NAME'].'</a></span>
                                        </li></a>';

                                        $flag = true;
                                      }

                                      if($flag == false){
                                        echo '<li class="person">
                                          <span class="fileType"><i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i></span>
                                          <span class="name">By: <a>Admin</a></span>
                                          <span class="description">No notes to display!</span>
                                        </li>';
                                      }

                                      echo '</ul>
                                            </div>
                                          </div>';
                                    }
                                   ?>
                            </div>
                            <button class="w3-button w3-xlarge w3-circle w3-blue w3-hover-indigo w3-card-4" id="addNote">+</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php require_once('footer.php'); ?>
                <script src="js/notes.js" type="text/javascript"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#addNote").click(function(){
                          //window.location.href = "http://localhost/M8Reborn/savenote.php";
                            $('#addNoteModal').modal('show');
                        });

                    });
                </script>
</html>
