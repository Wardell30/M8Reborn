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
                                <li id="searchLi">
                                    <span class="input input--nao">
                                        <input class="input__field input__field--nao" type="text" id="searchBar" />
                                        <label class="input__label input__label--nao" for="searchBar">
                                            <span class="input__label-content input__label-content--nao"><i class="fa fa-search"></i>Search</span>
                                        </label>
                                        <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                            <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                                        </svg>
                                    </span>
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