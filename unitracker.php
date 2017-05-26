<?php
    include('session.php');
    require_once('sidebar.php');
    require_once('topnavbar.php');
    error_reporting(E_ALL ^ E_WARNING);

?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <section class="content">
                              <div class="row">
                                <div class="col-md-3">
                                  <div class="box box-solid">
                                    <div class="box-header with-border">
                                      <h4 class="box-title">Tasks</h4>
                                    </div>
                                    <div class="box-body">
                                      <div id="external-events">
                                        <div class="external-event bg-green">No tasks created</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="box box-solid">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Create Task</h3>
                                    </div>
                                    <div class="box-body">
                                      <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                        <ul class="fc-color-picker" id="color-chooser">
                                          <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                                          <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                                        </ul>
                                      </div>
                                      <form role="form" action="" method="post" onsubmit=return javascript:addEvents()>

                                        <div class="input-group">
                                          <select name="projectSelect">
                                            <option value="pro0">Select a project</option>
                                            <?php
                                            $user = $_SESSION['login_user'];

                                            $ses_sql = mysqli_query($conn,"SELECT U_ID FROM USER WHERE U_UNAME = '". mysqli_real_escape_string($conn, $user) ."'");

                                            $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                                            $uid = $row['U_ID'];

                                            $result = mysqli_query($conn,"SELECT UPR_PR_ID FROM USERPROJ WHERE UPR_U_ID = '". mysqli_real_escape_string($conn, $uid) ."'");

                                            $options = "";

                                            if ($result->num_rows > 0) {
                                              while($row = $result->fetch_assoc()) {
                                                $pid = $row['UPR_PR_ID'];

                                                $ses_sql = mysqli_query($conn,"SELECT PR_NAME FROM PROJ WHERE PR_ID = '". mysqli_real_escape_string($conn, $pid) ."'");

                                                $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                                                $pName = $row['PR_NAME'];

                                                $options .= "<option value=\"pro".$pid."\">".$pName."</option>";
                                              }
                                            } ?>
                                            <?php echo $options; ?>
                                          </select>
                                          <input id="new-event" type="text" class="form-control" name="new-event" placeholder="Event Title">
                                          <input id="new-description" type="text" class="form-control" name="new-description" placeholder="Event Description">
                                          <div class="input-group-btn">
                                              <button id="add-new-event" type="button" class="btn btn-primary btn-flat" name="add-new-event">Add</button>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                  <div class="box box-solid">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Create Project</h3>
                                    </div>
                                    <div class="box-body">
                                      <form role="form" action="" method="post" onsubmit=return javascript:addEvents()>

                                        <div class="input-group">
                                          <select name="ucSelect">
                                            <option value="uc0">Select an UC</option>
                                            <?php
                                            $user = $_SESSION['login_user'];

                                            $ses_sql = mysqli_query($conn,"SELECT U_ID FROM USER WHERE U_UNAME = '". mysqli_real_escape_string($conn, $user) ."'");

                                            $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                                            $uid = $row['U_ID'];

                                            $result = mysqli_query($conn,"SELECT UUC_UC_ID FROM USERUC WHERE UUC_U_ID = '". mysqli_real_escape_string($conn, $uid) ."'");

                                            $options2 = "";

                                            if ($result->num_rows > 0) {
                                              while($row = $result->fetch_assoc()) {
                                                $ucid = $row['UUC_UC_ID'];

                                                $ses_sql = mysqli_query($conn,"SELECT UC_NAME FROM UC WHERE UC_ID = '". mysqli_real_escape_string($conn, $ucid) ."'");

                                                $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                                                $ucName = $row['UC_NAME'];

                                                $options2 .= "<option value=\"uc".$ucid."\">".$ucName."</option>";
                                              }
                                            } ?>
                                            <?php echo $options2; ?>
                                          </select>
                                          <input id="new-project" type="text" class="form-control" name="new-event" placeholder="Project Title">
                                          <div class="input-group-btn">
                                              <button id="add-new-project" type="button" class="btn btn-primary btn-flat" name="add-new-project">Add</button>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-9">
                                  <div class="box box-primary">
                                    <div class="box-body no-padding">
                                      <div id="calendar"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                        </div>
                    </div>
                </div>

                <?php require_once('footer.php'); ?>


                <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
                <script src="vendor/js/slimScroll/jquery.slimscroll.min.js"></script>
                <script src="vendor/js/fastclick/fastclick.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
                <script src="vendor/js/fullcalendar/fullcalendar.min.js"></script>

                <script>
                  $(function () {

                    /* initialize the external events
                     -----------------------------------------------------------------*/
                    function ini_events(ele) {
                      ele.each(function () {

                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                          title: $.trim($(this).text()) // use the element's text as the event title
                        };

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject);

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                          zIndex: 1070,
                          revert: true, // will cause the event to go back to its
                          revertDuration: 0  //  original position after the drag
                        });

                      });
                    }

                    ini_events($('#external-events div.external-event'));

                    /* initialize the calendar
                     -----------------------------------------------------------------*/

                    //Date for the calendar events (dummy data)
                    var date = new Date();
                    var d = date.getDate(),
                        m = date.getMonth(),
                        y = date.getFullYear();
                    $('#calendar').fullCalendar({
                      header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                      },
                      buttonText: {
                        today: 'today',
                        month: 'month',
                        week: 'week',
                        day: 'day'
                      },
                      editable: true,
                      droppable: true, // this allows things to be dropped onto the calendar !!!
                      drop: function (date, allDay) { // this function is called when something is dropped
                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject');

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;
                        copiedEventObject.backgroundColor = $(this).css("background-color");
                        copiedEventObject.borderColor = $(this).css("border-color");

                        // render the event on the calendar
                        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                        $(this).remove();

                        var xmlhttp = new XMLHttpRequest();

                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && (this.status === 200 || this.status === 0)) {
                              if(this.responseText !== ''){
                              }
                            }
                        };

                        dateToSave = moment(copiedEventObject.start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                        endToSave = moment(copiedEventObject.end, 'DD.MM.YYYY').format('YYYY-MM-DD');
                        xmlhttp.open("GET","savetask.php?name="+copiedEventObject.title+"&color="+copiedEventObject.backgroundColor+"&start="+dateToSave+"&end="+endToSave,true);
                        xmlhttp.send();

                      },
                      eventClick: function(calEvent, jsEvent, view) {
                        dateToSave = moment(calEvent.start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                        getTaskInfo(calEvent.title, dateToSave, calEvent.description, calEvent.end);
                        $('#showTask').modal('show');
                      }
                    });

                    var cal_events = {};
                    var eventsToAdd = [];

                    function loadCalendar(){
                      $.ajax({url: "loadtasks.php", success: function(result){
                        var tasks = result.split('/');

                        for(var i = 0; i < tasks.length; i++){
                          if(tasks[i] !== ''){
                            var specs = tasks[i].split(';');

                            if(specs[1] === ""){
                              event = $("<div />");
                              event.css({"background-color": specs[3], "border-color": specs[3], "color": "#fff"}).addClass("external-event");
                              event.html(specs[0]);
                              $('#external-events').prepend(event);

                              ini_events(event);
                            } else {

                              evt = {
                                'title' : specs[0],
                                'start' : specs[1],
                                'end' : specs[2],
                                'backgroundColor' : specs[3],
                                'description' : specs[4]
                              };

                              eventsToAdd.push(evt);
                            }
                          }
                        }

                        cal_events['events'] = eventsToAdd;

                        $("#calendar").fullCalendar('addEventSource', cal_events);
                      }});
                    }

                    loadCalendar();


                    /* ADDING EVENTS */
                    var currColor = "#3c8dbc"; //Red by default
                    //Color chooser button
                    var colorChooser = $("#color-chooser-btn");
                    $("#color-chooser > li > a").click(function (e) {
                      e.preventDefault();
                      //Save color
                      currColor = $(this).css("color");
                      //Add color effect to button
                      $('#add-new-event').css({"background-color": currColor, "border-color": currColor, "color": "white"});
                    });
                    $("#add-new-event").click(function (e) {
                      e.preventDefault();
                      //Get value and make sure it is not null
                      var val = $("#new-event").val();
                      var descr = $("#new-description").val();
                      if (val.length == 0) {
                        return;
                      }

                      //Create events
                      var event = $("<div />");
                      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
                      event.html(val);
                      $('#external-events').prepend(event);

                      //Add draggable funtionality
                      ini_events(event);

                      var xmlhttp = new XMLHttpRequest();

                      xmlhttp.onreadystatechange = function() {
                          if (this.readyState == 4 && (this.status === 200 || this.status === 0)) {
                            if(this.responseText !== ''){
                            }
                          }
                      };
                      xmlhttp.open("GET","savetask.php?name="+val+"&color="+currColor+"&descr="+descr,true);
                      xmlhttp.send();

                      //Remove event from text input
                      $("#new-event").val("");
                      $("#new-description").val("");
                    });
                  });
                </script>
</html>
