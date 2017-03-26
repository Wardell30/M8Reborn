<?php
    if (isset($_COOKIE['mail_sent'])) {
        if($_COOKIE['mail_sent']){
            echo '<div class="alert alert-info alert-dismissable fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Info!</strong> Check your email in order to activate the account!
                </div>';
            
            unset($_COOKIE['mail_sent']);
            setcookie('mail_sent', '', time() - 3600, '/');
        }
    }

   include("config.php");
   session_start();
    error_reporting(E_ALL ^ E_WARNING);
   
    if($_SERVER["REQUEST_METHOD"] == "POST") { 
        if(isset($_POST["login"])){
            $user = $_REQUEST['l-form-username'];
            $pass = hash('sha512', $_POST['l-form-password']);

            $query = "SELECT * FROM LOGIN WHERE L_UNAME = '". mysqli_real_escape_string($conn, $user) ."' AND L_PASS = '". mysqli_real_escape_string($conn, $pass) ."'" ;
            $result = mysqli_query($conn,$query);
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['login_user'] = $user;
                
                $ses_sql = mysqli_query($conn,"SELECT L_UNI FROM LOGIN WHERE L_UNAME = '". mysqli_real_escape_string($conn, $user) ."'");
   
                $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                $value = $row['L_UNI'];
                
                $_SESSION['university'] = $value;
                
                header("location:dashboard.php");
            } else {
                header("location:login.php");
            }
        } else if(isset($_POST["register"])){
            
            //save fields in json file 
            $user = $_POST['r-form-username'];
            $pass = hash('sha512', $_POST['r-form-password']);
            $mail = $_POST['r-form-email'];
            $student = $_POST['student'];
            
            if($student == "on"){
                $student = 1;
            } else {
                $student = 0;
            }
            
            $cookie_name = 'user';
            $cookie_value = $user;
            
            $cookie_mail = 'mail';
            $cookie_value_mail = $mail;
            
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            setcookie($cookie_mail, $cookie_value_mail, time() + (86400 * 30), "/");
            
            $myObj->username = $user;
            $myObj->pass = $pass;
            $myObj->email = $mail;
            $myObj->student = $student;
            
            $myJSON = json_encode($myObj);
            
            $myfile = fopen($user . ".json", "w") or die ("Unable to open file!");
            
            fwrite($myfile, $myJSON);
            
            fclose($myfile);
            
            header("location:continue.php");
        }
   }
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>M8Reborn | Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/form-elements.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/toggle.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	<div class="container">
                	
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Welcome to M8Reborn</h1>
                        <div class="description">
                        	<p>
	                         	Knowledge is power, and I know a lot!
                        	</p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 show-forms">
                    	<span class="show-login-form active">Login</span> 
                    	<span class="show-forms-divider">/</span> 
                    	<span class="show-register-form">Register</span>
                    </div>
                </div>
                
                <div class="row login-form">
                    <div class="col-sm-4 col-sm-offset-1">
						<form role="form" action="" method="post" class="l-form">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="l-form-username">Username</label>
	                        	<input type="text" name="l-form-username" placeholder="Username..." class="l-form-username form-control" id="l-form-username">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="l-form-password">Password</label>
	                        	<input type="password" name="l-form-password" placeholder="Password..." class="l-form-password form-control" id="l-form-password">
	                        </div>
				            <button type="submit" class="btn" name="login">Sign in!</button>
				    	</form>
				    	<div class="social-login">
                        	<p>Or login with:</p>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-1" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
	                        	<a class="btn btn-link-1" href="https://twitter.com/?lang=en" target="_blank"><i class="fa fa-twitter"></i></a>
	                        	<a class="btn btn-link-1" href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a>
                        	</div>
                        </div>
                    </div>
                    <div class="col-sm-6 forms-right-icons">
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-user"></i></div>
							<div class="col-sm-10">
								<h3>New Features</h3>
								<p>Keep track of your daily schedule and projects, while experiencing the best time of your life (Hangout)</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-eye"></i></div>
							<div class="col-sm-10">
								<h3>Easy To Use</h3>
								<p>Navigate through sections wiht just one click. Mobile ready. Experince the full power of the application in your smartphone!</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-facebook"></i></div>
							<div class="col-sm-10">
								<h3>Social Integrated</h3>
								<p>Log in with social networks and share your thoughts, projects and notes on the largest social platforms nowadays!</p>
							</div>
						</div>
                    </div>
                </div>
                
                <div class="row register-form register-register">
                    <div class="col-sm-4 col-sm-offset-1">
						<form role="form" action="" method="post" class="r-form">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="r-form-username">First name</label>
	                        	<input type="text" name="r-form-username" placeholder="Username..." class="r-form-username form-control" id="r-form-username">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="r-form-password">Password</label>
	                        	<input type="password" name="r-form-password" placeholder="Password..." class="r-form-password form-control" id="r-form-password">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="r-form-email">Email</label>
	                        	<input type="text" name="r-form-email" placeholder="Email..." class="r-form-email form-control" id="r-form-email">
	                        </div>
                                
                            <div class="form-group">
                                <label class="text-color" id="option1">Student</label>
                                <label class="switch">
                                    <input type="checkbox" name="student">
                                    <div class="slider round"></div>
                                </label>
                                <label class="text-color" id="option2">University</label>
                            </div>
                                
				            <button type="submit" class="btn" name="register">Sign me up!</button>
						</form>
                    </div>
                    <div class="col-sm-6 forms-right-icons">
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-pencil"></i></div>
							<div class="col-sm-10">
								<h3>Shared note taking</h3>
								<p>Collect, nurture and share notes and ideas with M8Reborn. Your notes are always with you, always accesible and one click away!</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-graduation-cap"></i></div>
							<div class="col-sm-10">
								<h3>University tracker</h3>
								<p>M8Reborn allows you to visualize your goals, track your time and assign tasks for your projects!</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-mobile"></i></div>
							<div class="col-sm-10">
								<h3>Mobile ready</h3>
								<p>There is no need to always have your laptop with you. Just go to your pocket and get all the information you need!</p>
							</div>
						</div>
                    </div>
                </div>    
        	</div>
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Made by <a href="#" target="_blank">Dreams Pursuit</a>.</p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="vendor/js/jquery.backstretch.min.js"></script>
        <script src="js/login.js"></script>
        
        <!--[if lt IE 10]>
            <script src="vendor/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>