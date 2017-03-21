<?php 
    include('session.php');
    require_once('sidebar.php'); 
    require_once('topnavbar.php');
?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div id="tabsWrapper">
                                    <h3 id="usernameHeader">Username</h3>
                                      <ul class="nav nav-tabs">
                                        <li class="active"><a href="#">Just Me</a></li>
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">Status</a></li>
                                      </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php require_once('footer.php'); ?>
</html>