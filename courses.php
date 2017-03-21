<?php 
    include('session.php');
    require_once('sidebar.php'); 
    require_once('topnavbar.php');

/*  UCS

    <div class="row collapse" id="uc11">
        <div class="col-md-8 col-sm-offset-1">
            <div class="card">
                <div class="business-card uccourse">
                    Contabilidade Geral (5 ECTS)
                </div>
            </div>
        </div>
    </div>

*/

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
                                                 
                                                $sql = mysqli_query($conn,"SELECT * FROM TEACHER WHERE T_NAME = '". mysqli_real_escape_string($conn, $name) ."'");

                                                $photo = mysqli_fetch_array($sql,MYSQLI_ASSOC);

                                                $respPhoto = $photo["T_PHLOC"];

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
                                                    <div class="row collapse" id="semester11">
                                                        <div class="col-md-10 col-sm-offset-1">
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc1'.$id.'" data-toggle="collapse">1st Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc2'.$id.'" data-toggle="collapse">2nd Semester</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="business-card uccourse">
                                                            <a href="#semester2'.$id.'" data-toggle="collapse">2nd Year</a>
                                                        </div>
                                                    </div>
                                                    <div class="row collapse" id="semester21">
                                                        <div class="col-md-10 col-sm-offset-1">
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc3'.$id.'" data-toggle="collapse">1st Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc4'.$id.'" data-toggle="collapse">2nd Semester</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="business-card uccourse">
                                                            <a href="#semester3'.$id.'" data-toggle="collapse">3rd Year</a>
                                                        </div>
                                                    </div>
                                                    <div class="row collapse" id="semester31">
                                                        <div class="col-md-10 col-sm-offset-1">
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc5'.$id.'" data-toggle="collapse">1st Semester</a>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="business-card uccourse">
                                                                    <a href="#uc6'.$id.'" data-toggle="collapse">2nd Semester</a>
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
