<?php ?>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>

                            </ul>
                        </nav>
                        <p class="copyright pull-right">
                            &copy; 2017 <a href="dashboard.php">Dreams Pursuit</a>, Never stop dreaming 'till you get there
                        </p>
                    </div>
                </footer>

            </div>
        </div>

        <div class="modal fade" id="addTeachers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Add a Teacher</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="partialTime" class="form-control-label">Partial Time</label>
                                <select name="partialTime">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bac" class="form-control-label">Bachelor</label>
                                <input type="number" class="form-control" id="bac" name="bac" min="1">
                            </div>
                            <div class="form-group">
                                <label for="mas" class="form-control-label">Master</label>
                                <input type="number" class="form-control" id="mas" name="mas" min="1">
                            </div>
                            <div class="form-group">
                                <label for="phd" class="form-control-label">PhD</label>
                                <input type="number" class="form-control" id="phd" name="phd" min="1">
                            </div>
                            <div class="form-group">
                                <label for="wlocations" class="form-control-label">Work Locations</label>
                                <input type="text" class="form-control" id="wlocations" name="wlocations" min="1">
                            </div>
                            <div class="form-group">
                                <label for="fileToUpload" class="form-control-label">Teacher Image</label>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addCourses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#coursetab">Course</a></li>
                          <li><a data-toggle="tab" href="#uctab">UC</a></li>
                        </ul>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content">
                          <div id="coursetab" class="tab-pane fade in active">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="coord" class="form-control-label">Coordenator</label>
                                    <select name="coord" id="coord">
                                        <?php
                                            if(file_exists("teachers.json")){
                                              $string = file_get_contents("teachers.json");

                                              $json_a=json_decode($string,true);

                                              $count = 1;

                                              foreach ($json_a as $key){
                                                  echo "<option name=\"coord'.$count.'\">" . $key . "</option>";
                                                  $count++;
                                              }
                                            } else {
                                              echo "<option name=\"coord0\" disabled>No teachers registered, please register</option>";
                                            }

                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="depart" class="form-control-label">Department</label>
                                    <input type="text" class="form-control" id="depart" name="depart">
                                </div>
                                <div class="form-group">
                                    <label for="dur" class="form-control-label">Duration</label>
                                    <input type="number" class="form-control" id="dur" name="dur" min="1">
                                </div>
                                <div class="form-group">
                                    <label for="degree" class="form-control-label">Type of Degree</label>
                                    <select name="degree" id="degree">
                                        <option>Bachelor</option>
                                        <option>Master</option>
                                        <option>PhD</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cdescrpt" class="form-control-label">Course Description</label>
                                    <textarea rows="4" cols="50" name="cdescrpt"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="submitcourse" id="submitcourse">Save</button>
                                </div>
                            </form>
                          </div>
                          <div id="uctab" class="tab-pane fade">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="courseSelect" class="form-control-label">Course</label>
                                    <select name="courseSelect" id="courseSelect">
                                        <?php
                                            if(file_exists("courses.json")){
                                              $string = file_get_contents("courses.json");

                                              $json_a=json_decode($string,true);

                                              $count = 1;

                                              foreach ($json_a as $key){
                                                  echo "<option name=\"courseSelect'.$count.'\">" . $key . "</option>";
                                                  $count++;
                                              }
                                            } else {
                                              echo "<option name=\"courseSelect0\" disabled>No courses registered, please register</option>";
                                            }

                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ects" class="form-control-label">ECTS</label>
                                    <input type="number" class="form-control" id="ects" name="ects" min="1" max="10">
                                </div>
                                <div class="form-group">
                                    <label for="year" class="form-control-label">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" min="1" max="3">
                                </div>
                                <div class="form-group">
                                    <label for="sem" class="form-control-label">Semester</label>
                                    <input type="number" class="form-control" id="sem" name="sem" min="1" max="2">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="submitUC" id="submitUC">Save</button>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!--   Core JS Files   -->
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/matereborn.js" type="text/javascript"></script>
    <script src="vendor/js/bootstrap-notify.js" type="text/javascript"></script>
    <script src="vendor/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="vendor/js/bootstrap-checkbox-radio-switch.js" type="text/javascript"></script>
    <script src="vendor/js/light-bootstrap-dashboard.js" type="text/javascript"></script>
    <script src="vendor/js/chartist.min.js" type="text/javascript"></script>
    <script src="js/timeweather.js" type="text/javascript"></script>
