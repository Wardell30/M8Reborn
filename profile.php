<?php
    include('session.php');

    if(isset($_GET['public'])){
      include('config.php');

      $uname = $_GET['userID'];

      $result = mysqli_query($conn,"SELECT * FROM USER WHERE U_ID = '". mysqli_real_escape_string($conn, $uname) ."'");

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $username = $row['U_UNAME'];
          $firstName = $row['U_FN'];
          $lastName = $row['U_LN'];
          $about = $row['U_AB'];
        }
      }

      if($username != $_SESSION['login_user']){
        $button = '<button name="friendAdd" class="addFriend" id="addFriend" onClick="">Add Friend</button>';
      } else {
        $button = '';
      }

      echo '<!doctype html>
      <html lang="en">
      <head>
      	<meta charset="utf-8" />
      	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

      	<title>M8Reborn | Profile</title>

      	<meta content=\'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\' name=\'viewport\' />

      	<!--     Fonts and icons     -->
      	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
          <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
      	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

      	<!-- CSS Files -->
          <link href="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
          <link href="vendor/css/material-kit.css" rel="stylesheet"/>

      </head>

      <body class="profile-page">
      	<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
          	<div class="container">
              	<!-- Brand and toggle get grouped for better mobile display -->
              	<div class="navbar-header">
              		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                  		<span class="sr-only">Toggle navigation</span>
      		            <span class="icon-bar"></span>
      		            <span class="icon-bar"></span>
      		            <span class="icon-bar"></span>
              		</button>
              		<a class="navbar-brand" href="index.php">M8Reborn</a>
              	</div>

              	<div class="collapse navbar-collapse" id="navigation-example">
              		<ul class="nav navbar-nav navbar-right">
      		            <li>
      		                <a href="https://twitter.com/" target="_blank" class="btn btn-simple btn-white btn-just-icon">
      							<i class="fa fa-twitter"></i>
      						</a>
      		            </li>
      		            <li>
      		                <a href="https://www.facebook.com/" target="_blank" class="btn btn-simple btn-white btn-just-icon">
      							<i class="fa fa-facebook-square"></i>
      						</a>
      		            </li>
      					<li>
      		                <a href="https://www.instagram.com/" target="_blank" class="btn btn-simple btn-white btn-just-icon">
      							<i class="fa fa-instagram"></i>
      						</a>
      		            </li>
              		</ul>
              	</div>
          	</div>
          </nav>

          <div class="wrapper">
      		<div class="header header-filter" style="background-image: url(\'images/city.jpg\');"></div>

      		<div class="main main-raised">
      			<div class="profile-content">
      	            <div class="container">
      	                <div class="row">
      	                    <div class="profile">
      	                        <div class="name">
      	                            <h3 class="title">'.$firstName . ' ' . $lastName . '</h3>
      								<h6>Student</h6>
                      '.$button.'
      	                        </div>
      	                    </div>
      	                </div>
      	                <div class="description text-center">
                              <p>'.$about.'</p>
      	                </div>

      					<div class="row">
      						<div class="col-md-6 col-md-offset-3">
      							<div class="profile-tabs">
      			                    <div class="nav-align-center">
      									<ul class="nav nav-pills" role="tablist">
      										<li class="active">
      											<a href="#studio" role="tab" data-toggle="tab">
      												<i class="material-icons">camera</i>
      												Studio
      											</a>
      										</li>
      										<li>
      				                            <a href="#work" role="tab" data-toggle="tab">
      												<i class="material-icons">palette</i>
      												Work
      				                            </a>
      				                        </li>
      				                        <li>
      				                            <a href="#shows" role="tab" data-toggle="tab">
      												<i class="material-icons">favorite</i>
      				                                Favorite
      				                            </a>
      				                        </li>
      				                    </ul>

      				                    <div class="tab-content gallery">
      										<div class="tab-pane active" id="studio">
      				                            <div class="row">
      												<div class="col-md-6">
      													<img src="../assets/img/examples/chris1.jpg" class="img-rounded" />
      													<img src="../assets/img/examples/chris0.jpg" class="img-rounded" />
      												</div>
      												<div class="col-md-6">
      													<img src="../assets/img/examples/chris3.jpg" class="img-rounded" />
      													<img src="../assets/img/examples/chris4.jpg" class="img-rounded" />
      												</div>
      				                            </div>
      				                        </div>
      				                        <div class="tab-pane text-center" id="work">
      											<div class="row">
      												<div class="col-md-6">
      													<img src="../assets/img/examples/chris5.jpg" class="img-rounded" />
      													<img src="../assets/img/examples/chris7.jpg" class="img-rounded" />
      													<img src="../assets/img/examples/chris9.jpg" class="img-rounded" />
      												</div>
      												<div class="col-md-6">
      													<img src="../assets/img/examples/chris6.jpg" class="img-rounded" />
      													<img src="../assets/img/examples/chris8.jpg" class="img-rounded" />
      												</div>
      											</div>
      				                        </div>
      										<div class="tab-pane text-center" id="shows">
      											<div class="row">
      												<div class="col-md-6">
      													<img src="../assets/img/examples/chris4.jpg" class="img-rounded" />
      													<img src="../assets/img/examples/chris6.jpg" class="img-rounded" />
      												</div>
      												<div class="col-md-6">
      													<img src="../assets/img/examples/chris7.jpg" class="img-rounded" />
      													<img src="../assets/img/examples/chris5.jpg" class="img-rounded" />
      													<img src="../assets/img/examples/chris9.jpg" class="img-rounded" />
      												</div>
      											</div>
      				                        </div>

      				                    </div>
      								</div>
      							</div>
      							<!-- End Profile Tabs -->
      						</div>
      	                </div>

      	            </div>
      	        </div>
      		</div>

          </div>
          <footer class="footer">
              <div class="container">
                  <nav class="pull-left">
      				<ul>
      					<li>
      						<a href="index.php">
      							M8Reborn
      						</a>
      					</li>
      					<li>
      						<a href="index.php">
      						   About Us
      						</a>
      					</li>

      				</ul>
                  </nav>
                  <div class="copyright pull-right">
                    &copy; 2017 <a href="index.php">Dreams Pursuit</a>, Never stop dreaming \'till you get there
                  </div>
              </div>
          </footer>


      </body>
      	<!--   Core JS Files   -->
      	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
      	<script src="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
      	<script src="vendor/js/material.min.js"></script>

      	<script src="vendor/js/material-kit.js" type="text/javascript"></script>

      </html>
';
    } else {
      require_once('sidebar.php');
      require_once('topnavbar.php');

      echo '<div class="content">
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
      </div>';

      require_once('footer.php');

      echo "</html>";
    }
?>
