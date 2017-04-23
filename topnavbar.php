<?php ?>
            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" id="place" href="">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                        <i id="placeIcon" class="pe-7s-graph"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i id="placeIcon" class="fa fa-globe"></i>
                                        <b class="caret"></b>
                                        <span class="notification">5</span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a href="#">Notification 1</a></li>
                                        <li><a href="#">Notification 2</a></li>
                                        <li><a href="#">Notification 3</a></li>
                                        <li><a href="#">Notification 4</a></li>
                                        <li><a href="#">Another notification</a></li>
                                  </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i id="placeIcon" class="fa fa-comments"></i>
                                        <b class="caret"></b>
                                        <span class="notification">5</span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a href="#">Notification 1</a></li>
                                        <li><a href="#">Notification 2</a></li>
                                        <li><a href="#">Notification 3</a></li>
                                        <li><a href="#">Notification 4</a></li>
                                        <li><a href="#">Another notification</a></li>
                                  </ul>
                                </li>
                                <li id="searchLi">
                                  <form role="form" action="" method="post" class="l-form">
                                    <div class="form-group">
                                      <label class="sr-only" for="l-form-search">Search</label>
                                      <input type="text" name="l-form-search" placeholder="Search..." class="l-form-search form-control" id="l-form-search">
                                    </div>
                                  </form>
                                </li>
                                <li>
                                    <a id="time"></a>
                                </li>
                                <li id="predictNotification" onclick="m8reborn.showNotification('top','center')">
                                    <a>
                                        <i id="weatherIcon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a id="weatherTemp"></a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            Account
                                            <b class="caret"></b>
                                      </a>
                                      <ul class="dropdown-menu">
                                        <?php if(isset($_SESSION['university']) && $_SESSION['university'] != '1'){
                                            echo '<li><a href="#">Check status</a></li>';
                                        } ?>
                                        <li><a href="#">Change profile</a></li>
                                        <li><a href="#">Settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="logout.php">Log out</a></li>
                                      </ul>
                                </li>
                                <li>
                                    <a href="logout.php">
                                        Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
