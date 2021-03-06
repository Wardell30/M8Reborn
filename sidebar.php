<?php
?>
    <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="text/html; charset=UTF-8" />

                <title>M8Reborn | Dashboard</title>

                <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
                <meta name="viewport" content="width=device-width" />
                <meta name="theme-color" content="#3b70db" />

                <!-- Bootstrap core CSS-->
                <link href="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />

                <!-- Animation library for notifications   -->
                <link href="vendor/css/animate.min.css" rel="stylesheet"/>

                <link href="css/layout.css" rel="stylesheet"/>

                <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
                <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
                <link href="vendor/css/pe-icon-7-stroke.css" rel="stylesheet" />

                <link href="vendor/css/weather-icons-wind.css" rel="stylesheet" />
                <link href="vendor/css/weather-icons.css" rel="stylesheet" />
                <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">

                <link rel="stylesheet" href="vendor/js/fullcalendar/fullcalendar.min.css">
                <link rel="stylesheet" href="vendor/js/fullcalendar/fullcalendar.print.css" media="print">

                <script src="js/sidebar.js" type="text/javascript"></script>

            </head>

            <body>
                <div class="wrapper">
                    <div class="sidebar" data-color="blue" data-image="images/sidebar-5.jpg">
                        <div class="sidebar-wrapper">
                            <div class="logo">
                                <a href="dashboard.html" class="simple-text">
                                    <img src="images/UniM8RebornWhite.png" alt="logo" id="logo-nav"/> M8Reborn
                                </a>
                            </div>

                            <ul class="nav">
                                <li id="dashboardNav">
                                    <a href="dashboard.php">
                                        <i class="pe-7s-graph"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>

                                <?php
                                    if(isset($_SESSION['university']) && $_SESSION['university'] == 1){
                                        echo '<li id="courseNav">
                                                <a href="courses.php">
                                                    <i class="pe-7s-note2"></i>
                                                    <p>Courses/UCs</p>
                                                </a>
                                            </li>
                                            <li id="teachersNav">
                                                <a href="teachers.php">
                                                    <i class="pe-7s-user"></i>
                                                    <p>Teachers</p>
                                                </a>
                                            </li>';
                                    } else {
                                        echo '<li id="uniTrackerNav">
                                    <a href="unitracker.php">
                                        <i class="pe-7s-study"></i>
                                        <p>Uni Tracker</p>
                                    </a>
                                </li>
                                <li id="budgetTrackerNav">
                                    <a href="budgettracker.php">
                                        <i class="pe-7s-piggy"></i>
                                        <p>Budget Tracker</p>
                                    </a>
                                </li>
                                <li id="noteTakingNav">
                                    <a href="notetaking.php">
                                        <i class="pe-7s-note2"></i>
                                        <p>Note Taking</p>
                                    </a>
                                </li>
                                <li id="hangOutNav">
                                    <a href="hangout.php">
                                        <i class="pe-7s-users"></i>
                                        <p>Hang out</p>
                                    </a>
                                </li>
                                <li id="profileNav">
                                    <a href="profile.php">
                                        <i class="pe-7s-user"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li id="settingsNav">
                                    <a href="settings.php">
                                        <i class="pe-7s-settings"></i>
                                        <p>Settings</p>
                                    </a>
                                </li>';
                                    }
                                ?>
                                <li id="newsNav">
                                    <a href="news.php">
                                        <i class="pe-7s-news-paper"></i>
                                        <p>News</p>
                                    </a>
                                </li>
                                <li class="active-pro">
                                    <a href="profile.php">
                                        <i class="pe-7s-user"></i>
                                        <p><?php
                                            if(isset($_SESSION['login_user']) && strlen($_SESSION['login_user']) > 18){
                                                echo substr($_SESSION['login_user'], 0, 18);
                                            } else {
                                                echo $_SESSION['login_user'];
                                            }
                                            ?></p>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
