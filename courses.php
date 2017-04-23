<?php
    include('session.php');
    require_once('sidebar.php');
    require_once('topnavbar.php');

    error_reporting(E_ALL ^ E_WARNING);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["submitcourse"])) {
        $name = $_REQUEST["name"];

        if(!(isset($_REQUEST["coord"]))){
          header("location: courses.php");
        } else {
          $coord = $_REQUEST["coord"];
          $depart = $_REQUEST["depart"];
          $dur = $_REQUEST["dur"];
          $degree = $_REQUEST["degree"];
          $cdescrpt = $_REQUEST["cdescrpt"];

          $university = $_SESSION['login_user'];

          $ses_sql = mysqli_query($conn,"SELECT UNI_ID FROM UNI WHERE UNI_NAME = '". mysqli_real_escape_string($conn, $university) ."'");

          $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

          $id = $row['UNI_ID'];

          $query = "INSERT INTO sql11160894.COURSE (CO_ID, CO_UNI, CO_DEP, CO_RESP, CO_NAME, CO_DUR, CO_TYPE, CO_DESC) VALUES (NULL, '". mysqli_real_escape_string($conn, $id) ."', '". mysqli_real_escape_string($conn, $depart) ."', '". mysqli_real_escape_string($conn, $coord) ."', '". mysqli_real_escape_string($conn, $name) ."', '". mysqli_real_escape_string($conn, $dur) ."', '". mysqli_real_escape_string($conn, $degree) ."', '". mysqli_real_escape_string($conn, $cdescrpt) ."')";

          if ($conn->query($query) === TRUE) {
            if(file_exists("courses.json")){
              $myfile = fopen("courses.json", "r") or die("Unable to open file!");

              $string = fread($myfile,filesize("courses.json"));

              fclose($myfile);

              unlink('courses.json');

              $string = substr($string, 0, -1) . ",\"" . $name . "\"]";

              $myfile = fopen("courses.json", "w") or die ("Unable to open file!");

              fwrite($myfile, $string);

              fclose($myfile);
            } else {
              $myfile = fopen("courses.json", "w") or die ("Unable to open file!");

              $string = "[\"".$name."\"]";

              fwrite($myfile, $string);

              fclose($myfile);
            }

            header("location: courses.php");
            echo '<div class="alert alert-success alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Successfuly added!
        </div>';

          }
        }
      } elseif (isset($_POST["submitUC"])) {
        $name = $_REQUEST["name"];

        if(!(isset($_REQUEST["courseSelect"]))){
          header("location: courses.php");
        } else {
          $course = $_REQUEST["courseSelect"];
          $ects = $_REQUEST["ects"];
          $year = $_REQUEST["year"];
          $sem = $_REQUEST["sem"];
          $teacher = $_REQUEST["teacher"];

          $ses_sql = mysqli_query($conn,"SELECT CO_ID FROM COURSE WHERE CO_NAME = '". mysqli_real_escape_string($conn, $course) ."'");

          $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

          $id = $row['CO_ID'];

          $query = "INSERT INTO sql11160894.UC (UC_ID, UC_CO, UC_TEAC, UC_NAME, UC_ECTS, UC_SEM, UC_Y) VALUES (NULL, '". mysqli_real_escape_string($conn, $id) ."', '". mysqli_real_escape_string($conn, $teacher) ."','". mysqli_real_escape_string($conn, $name) ."','". mysqli_real_escape_string($conn, $ects) ."','". mysqli_real_escape_string($conn, $sem) ."','". mysqli_real_escape_string($conn, $year) ."')";

          if ($conn->query($query) === TRUE) {
            header("location: courses.php");
            echo '<div class="alert alert-success alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Successfuly added!
        </div>';
          }
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
                                        <h4 class="title"><?php echo $_SESSION['login_user']; ?> Courses</h4>
                                    </div>
                                    <div class="content all-icons">
                                        <?php
                                            $university = $_SESSION['login_user'];

                                            $ses_sql = mysqli_query($conn,"SELECT UNI_ID FROM UNI WHERE UNI_NAME = '". mysqli_real_escape_string($conn, $university) ."'");

                                            $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                                            $uniID = $row['UNI_ID'];

                                            $result = mysqli_query($conn, "SELECT * FROM COURSE WHERE CO_UNI = '". mysqli_real_escape_string($conn, $uniID) ."'");

                                             while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                $id = $row["CO_ID"];
                                                $name = $row["CO_NAME"];
                                                $dep = $row["CO_DEP"];
                                                $resp = $row["CO_RESP"];
                                                $dur = $row["CO_DUR"];
                                                $type = $row["CO_TYPE"];
                                                $desc = $row["CO_DESC"];

                                                $sql = mysqli_query($conn,"SELECT * FROM TEACHER WHERE T_NAME = '". mysqli_real_escape_string($conn, $resp) ."'");

                                                $photo = mysqli_fetch_array($sql,MYSQLI_ASSOC);

                                                $respPhoto = $photo["T_PHLOC"];

                                                $courses = mysqli_query($conn, "SELECT * FROM UC WHERE UC_CO = '". mysqli_real_escape_string($conn, $id) ."'");

                                                $uc1 = $uc2 = $uc3 = $uc4 = $uc5 = $uc6 = "";

                                                $part1 = '<div class="card"><div class="business-card uccourse">';

                                                $part2 = '</div></div>';

                                                 while ($row2 = mysqli_fetch_array($courses, MYSQLI_ASSOC)) {
                                                    $ucname = $row2["UC_NAME"];
                                                    $ects = $row2["UC_ECTS"];
                                                    $sem = $row2["UC_SEM"];
                                                    $year = $row2["UC_Y"];

                                                    $stringToAdd = $part1 . $ucname . ' (' . $ects . ' ECTS)' . $part2;

                                                    if($year == '1'){
                                                      if($sem == '1'){
                                                        $uc1 .= $stringToAdd;
                                                      } else {
                                                        $uc2 .= $stringToAdd;
                                                      }
                                                    } elseif ($year == '2') {
                                                      if($sem == '1'){
                                                        $uc3 .= $stringToAdd;
                                                      } else {
                                                        $uc4 .= $stringToAdd;
                                                      }
                                                    } elseif ($year == '3') {
                                                      if($sem == '1'){
                                                        $uc5 .= $stringToAdd;
                                                      } else {
                                                        $uc6 .= $stringToAdd;
                                                      }
                                                    }
                                                  }

                                                echo '<div class="business-card" id="course'.$id.'">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="circleCourse">'.substr($name,0,1).'</div>
                                                </div>
                                                <div class="media-body coursePanel">
                                                    <h2 class="media-heading courseName">'.$name.'</h2>
                                                    <div class="job">'.$dep.'</div>
                                                    <div class="mail">'.$type.' Degree ('.$dur.' years)</div>
                                                    <div class="expandUC"><a href="#ucs'.$id.'" data-toggle="collapse">Learn More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="ucs'.$id.'" class="collapse">
                                            <div class="row">
                                                <div class="col-md-10 col-sm-offset-1">
                                                    <div class="card">
                                                        <div class="business-card">
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <img class="media-object img-circle profile-img" src="images/teachers/' .$respPhoto.'">
                                                                </div>
                                                                <div class="media-body coursePanel">
                                                                    <h2 class="media-heading courseName">Coordenator: '.$resp.'</h2>
                                                                    <div class="description">' . $desc . '</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="business-card uccourse">
                                                            <a href="#semester1'.$id.'" data-toggle="collapse">1st Year</a>
                                                        </div>
                                                    </div>
                                                    <div class="row collapse" id="semester1'.$id.'">
                                                        <div class="col-md-10 col-sm-offset-1">
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc1'.$id.'" data-toggle="collapse">1st Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="row collapse" id="uc1'.$id.'">
                                                                <div class="col-md-8 col-sm-offset-1">
                                                                  '.$uc1.'
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc2'.$id.'" data-toggle="collapse">2nd Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="row collapse" id="uc2'.$id.'">
                                                                <div class="col-md-8 col-sm-offset-1">
                                                                  '.$uc2.'
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="business-card uccourse">
                                                            <a href="#semester2'.$id.'" data-toggle="collapse">2nd Year</a>
                                                        </div>
                                                    </div>
                                                    <div class="row collapse" id="semester2'.$id.'">
                                                        <div class="col-md-10 col-sm-offset-1">
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc3'.$id.'" data-toggle="collapse">1st Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="row collapse" id="uc3'.$id.'">
                                                                <div class="col-md-8 col-sm-offset-1">
                                                                  '.$uc3.'
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc4'.$id.'" data-toggle="collapse">2nd Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="row collapse" id="uc4'.$id.'">
                                                                <div class="col-md-8 col-sm-offset-1">
                                                                  '.$uc4.'
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="business-card uccourse">
                                                            <a href="#semester3'.$id.'" data-toggle="collapse">3rd Year</a>
                                                        </div>
                                                    </div>
                                                    <div class="row collapse" id="semester3'.$id.'">
                                                        <div class="col-md-10 col-sm-offset-1">
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc5'.$id.'" data-toggle="collapse">1st Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="row collapse" id="uc5'.$id.'">
                                                                <div class="col-md-8 col-sm-offset-1">
                                                                  '.$uc5.'
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc6'.$id.'" data-toggle="collapse">2nd Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="row collapse" id="uc6'.$id.'">
                                                                <div class="col-md-8 col-sm-offset-1">
                                                                  '.$uc6.'
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';

                                             }
                                        ?>
                                    </div>
                                    <div class="card card-nav-tabs">
                                			<div class="header header-success">
                                				<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                				<div class="nav-tabs-navigation">
                                					<div class="nav-tabs-wrapper">
                                						<ul class="nav nav-tabs" data-tabs="tabs">
                                							<li class="active">
                                								<a href="#profile" data-toggle="tab">
                                									<i class="material-icons">face</i>
                                									Profile
                                								</a>
                                							</li>
                                							<li>
                                								<a href="#messages" data-toggle="tab">
                                									<i class="material-icons">chat</i>
                                									Messages
                                								</a>
                                							</li>
                                							<li>
                                								<a href="#settings" data-toggle="tab">
                                									<i class="material-icons">build</i>
                                									Settings
                                								</a>

                                							</li>
                                						</ul>
                                					</div>
                                				</div>
                                			</div>
                                			<div class="content">
                                				<div class="tab-content text-center">
                                					<div class="tab-pane active" id="profile">
                                            <div class="header header-success">
                                      				<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                      				<div class="nav-tabs-navigation">
                                      					<div class="nav-tabs-wrapper">
                                      						<ul class="nav nav-tabs" data-tabs="tabs">
                                      							<li class="active">
                                      								<a href="#profile" data-toggle="tab">
                                      									<i class="material-icons">face</i>
                                      									Profile
                                      								</a>
                                      							</li>
                                      							<li>
                                      								<a href="#messages" data-toggle="tab">
                                      									<i class="material-icons">chat</i>
                                      									Messages
                                      								</a>
                                      							</li>
                                      							<li>
                                      								<a href="#settings" data-toggle="tab">
                                      									<i class="material-icons">build</i>
                                      									Settings
                                      								</a>

                                      							</li>
                                      						</ul>
                                      					</div>
                                      				</div>
                                      			</div>
                                      			<div class="content">
                                      				<div class="tab-content text-center">
                                      					<div class="tab-pane active" id="profile">
                                      						<p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
                                      					</div>
                                      					<div class="tab-pane" id="messages">
                                      						<p> I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                                      					</div>
                                      					<div class="tab-pane" id="settings">
                                      						<p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                                      					</div>
                                      				</div>
                                      			</div>
                                					</div>
                                					<div class="tab-pane" id="messages">
                                						<p> I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                                					</div>
                                					<div class="tab-pane" id="settings">
                                						<p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                </div>
                                <button class="w3-button w3-xlarge w3-circle w3-blue w3-hover-indigo w3-card-4 addBtn" id="addCourse">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php require_once('footer.php'); ?>

                <script type="text/javascript">
                    $(document).ready(function () {
                        var jsonObj;
                        $("#addCourse").click(function(){
                            $.getJSON("teachers.json", function(json) {
                                jsonObj = json;
                            });
                            $('#addCourses').modal('show');
                        });
                    });
                </script>
</html>
