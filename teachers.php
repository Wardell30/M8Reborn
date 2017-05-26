<?php
    include('session.php');
    include('config.php');
    require_once('sidebar.php');
    require_once('topnavbar.php');

    error_reporting(E_ALL ^ E_WARNING);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_REQUEST['name'];
        $partial = $_REQUEST['partialTime'];
        $bac = $_REQUEST['bac'];
        $mas = $_REQUEST['mas'];
        $phd = $_REQUEST['phd'];
        $wlocations = $_REQUEST['wlocations'];

        $target_dir = "images/teachers/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header('teachers.php');
            echo '<div class="alert alert-danger alert-dismissable fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Error!</strong> Some problem occurred!
                </div>';
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $file = basename( $_FILES["fileToUpload"]["name"]);

                $university = $_SESSION['login_user'];

                $ses_sql = mysqli_query($conn,"SELECT UNI_ID FROM UNI WHERE UNI_NAME = '". mysqli_real_escape_string($conn, $university) ."'");

                $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                $id = $row['UNI_ID'];

                $query = "INSERT INTO TEACHER (T_ID, T_UNI, T_NAME, T_PAR, T_BAC, T_MAS, T_PHD, T_WPL, T_PHLOC) VALUES (NULL, '". mysqli_real_escape_string($conn, $id) ."', '". mysqli_real_escape_string($conn, $name) ."', '". mysqli_real_escape_string($conn, $partial) ."', '". mysqli_real_escape_string($conn, $bac) ."', '". mysqli_real_escape_string($conn, $mas) ."', '". mysqli_real_escape_string($conn, $phd) ."', '". mysqli_real_escape_string($conn, $wlocations) ."', '". mysqli_real_escape_string($conn, $file) ."');";

                if ($conn->query($query) === TRUE) {

                    $myfile = fopen("teachers.json", "r") or die("Unable to open file!");

                    $string = fread($myfile,filesize("teachers.json"));

                    fclose($myfile);

                    unlink('teachers.json');

                    $string = substr($string, 0, -1) . ",\"" . $name . "\"]";

                    $myfile = fopen("teachers.json", "w") or die ("Unable to open file!");

                    fwrite($myfile, $string);

                    fclose($myfile);

                    header('teachers.php');
                    echo '<div class="alert alert-success alert-dismissable fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Successfuly added!
                </div>';
                }
            } else {
                header('teachers.php');
                echo '<div class="alert alert-danger alert-dismissable fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Error!</strong> Some problem occurred!
                </div>';
            }
        }
    }
?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"><?php echo $_SESSION['login_user']; ?> Teachers</h4>
                                    </div>
                                    <div class="content all-icons">
                                        <div class="row">
                                            <?php
                                                $university = $_SESSION['login_user'];

                                                $ses_sql = mysqli_query($conn,"SELECT UNI_ID FROM UNI WHERE UNI_NAME = '". mysqli_real_escape_string($conn, $university) ."'");

                                                $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                                                $uniID = $row['UNI_ID'];

                                                $result = mysqli_query($conn, "SELECT * FROM TEACHER WHERE T_UNI = '". mysqli_real_escape_string($conn, $uniID) ."'");

                                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                    $name = $row["T_NAME"];

                                                    if($row["T_PAR"] == 0){
                                                        $partial = "Partial Time";
                                                    } else {
                                                        $partial = "Full Time";
                                                    }
                                                    $bac = $row["T_BAC"];
                                                    $mas = $row["T_MAS"];
                                                    $phd = $row["T_PHD"];
                                                    $wpl = $row["T_WPL"];
                                                    $photo = $row["T_PHLOC"];

                                                    $search = mysqli_query($conn, "SELECT UC_NAME FROM UC WHERE UC_TEAC = '". mysqli_real_escape_string($conn, $name) ."'");

                                                    $uclist = "";

                                                    $count = 0;

                                                    while ($ucs = mysqli_fetch_array($search, MYSQLI_ASSOC)) {
                                                      if($count < 3){
                                                        $uclist .= "<li class=\"jobdescr\">".$ucs["UC_NAME"]."</li>";
                                                      }
                                                      $count++;
                                                    }

                                                    if($uclist == ""){
                                                      $uclist = "<li class=\"jobdescr\">No info</li>";
                                                    }

                                                    echo '<div class="col-md-4 col-sm-6">
                                                <div class="card2-container">
                                                    <div class="card2">
                                                        <div class="front">
                                                            <div class="cover">
                                                                <img src="images/rotating_card_thumb2.png"/>
                                                            </div>
                                                            <div class="user">
                                                                <img class="img-circle" src="images/teachers/' .$photo.'"/>
                                                            </div>
                                                            <div class="content">
                                                                <div class="main">
                                                                    <h3 class="name">'.$name.'</h3>
                                                                    <p class="profession">'.$partial.'</p>

                                                                    <p class="text-center">'.$wpl.'</p>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end front panel -->
                                                        <div class="back">
                                                            <div class="content">
                                                                <div class="main">
                                                                    <h4 class="text-center">Job Description</h4>
                                                                    <ul class="joblist">
                                                                        '.$uclist.'
                                                                    </ul>
                                                                    <div class="stats-container">
                                                                        <div class="stats">
                                                                            <h4>'.$bac.'</h4>
                                                                            <p>
                                                                                Bachelor
                                                                            </p>
                                                                        </div>
                                                                        <div class="stats">
                                                                            <h4>'.$mas.'</h4>
                                                                            <p>
                                                                                Master
                                                                            </p>
                                                                        </div>
                                                                        <div class="stats">
                                                                            <h4>'.$phd.'</h4>
                                                                            <p>
                                                                                PhD
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end back panel -->
                                                    </div> <!-- end card -->
                                                </div> <!-- end card-container -->
                                            </div> <!-- end col-sm-3 -->';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="addBtn">
                                  <a href="pdf.php" target="_blank">
                                  <button type="button" class="w3-btn w3-blue w3-border w3-border-blue w3-round-large" id="exportBtn">
                                    <span class="glyphicon glyphicon-export"></span> Export
                                  </button></a>
                                  <button class="w3-button w3-xlarge w3-circle w3-blue w3-hover-indigo w3-card-4" id="addBtn">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once('footer.php'); ?>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#addBtn").click(function(){
                            $('#addTeachers').modal('show');
                        });
                    });
                </script>
</html>
