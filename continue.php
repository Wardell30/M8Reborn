<?php
    $string = file_get_contents($_COOKIE["user"] . ".json");
                
    $json_a=json_decode($string,true);

    foreach ($json_a as $key => $value){
        if($key === 'student'){
            $student = $value;
        }
        
        if($key === 'email'){
            $mail = $value;
        }
    }

    include('config.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["confirm"])){
            
            $country = $_REQUEST['r-form-country'];
            $state = $_REQUEST['r-form-states'];
            $address = $_REQUEST['r-form-address'];
            $zip = $_REQUEST['r-form-zip'];
            
            if($student == 0){
                $fname = $_REQUEST['r-form-first-name'];
                $lname = $_REQUEST['r-form-last-name'];
                $university = $_REQUEST['r-form-university'];
                $course = $_REQUEST['r-form-course'];
                $studentN = $_REQUEST['r-form-student-number'];
                $about = $_REQUEST['r-form-about-yourself'];
                
                $query = "INSERT INTO sql11160894.USER (ID, firstName, lastName, address, city, country, zipCode, university, course, studentNumber, universityConfirmation, aboutMe, active) VALUES ('', '". mysqli_real_escape_string($conn, $fname) ."', '". mysqli_real_escape_string($conn, $lname) ."', '". mysqli_real_escape_string($conn, $address) ."', '". mysqli_real_escape_string($conn, $state) ."', '". mysqli_real_escape_string($conn, $country) ."', '". mysqli_real_escape_string($conn, $zip) ."', '". mysqli_real_escape_string($conn, $university) ."', '". mysqli_real_escape_string($conn, $course) ."', '". mysqli_real_escape_string($conn, $studentN) ."', '0', '". mysqli_real_escape_string($conn, $about) ."', '0')";
                
            } else {
                $since = $_REQUEST['r-form-since'];
                $hm = $_REQUEST['r-form-hm'];
                $vhm = $_REQUEST['r-form-vhm'];
                $ms = $_REQUEST['r-form-ms'];
                
                $query = "INSERT INTO sql11160894.UNI (UNI_ID, UNI_NAME, UNI_M, UNI_COUN, UNI_CT, UNI_ADD, UNI_ZIP, UNI_SIN, UNI_HM, UNI_VHM, UNI_MS) VALUES (NULL, '". mysqli_real_escape_string($conn, $student) ."', '". mysqli_real_escape_string($conn, $mail) ."', '". mysqli_real_escape_string($conn, $country) ."', '". mysqli_real_escape_string($conn, $state) ."', '". mysqli_real_escape_string($conn, $address) ."', '". mysqli_real_escape_string($conn, $zip) ."', '". mysqli_real_escape_string($conn, $since) ."', '". mysqli_real_escape_string($conn, $hm) ."', '". mysqli_real_escape_string($conn, $vhm) ."', '". mysqli_real_escape_string($conn, $ms) ."')";
            }


            if ($conn->query($query) === TRUE) {
                include('mail.php');
            } else {
                echo 'wtf';
            }
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>M8Reborn | Finishing</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/form-elements.css">
        <link rel="stylesheet" href="vendor/css/bootstrap-formhelpers.min.css">
        <link rel="stylesheet" href="css/style.css">

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
                        <h1>Welcome to M8Reborn, <?php echo $_COOKIE["user"]; ?>!</h1>
                        <div class="description">
                        	<p>
	                         	Knowledge is power, and I know a lot!<br />
                                You are now one step away from using <strong>M8Reborn</strong>!
                        	</p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-2 show-forms">
                    	<span class="show-register-form active">Register</span> 
                    </div>
                </div>
                
                <div class="row register-form">
                    <div class="col-sm-10 col-sm-offset-1">
						<form role="form" action="" method="post" class="r-form">
                            <div class="col-sm-5 col-sm-offset-1">
                                <?php
                                    if($student == 0){
                                        echo '<div class="form-group">
                                    <label class="sr-only" for="r-form-first-name">First name</label>
                                    <input type="text" name="r-form-first-name" placeholder="First name..." class="r-form-first-name form-control" id="r-form-first-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-last-name">Last name</label>
                                    <input type="text" name="r-form-last-name" placeholder="Last name..." class="r-form-last-name form-control" id="r-form-last-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-country">Country</label>
                                    <select class="input-medium bfh-countries form-control" data-country="PT" id="countryStates" name="r-form-country"></select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-State">State</label>
                                    <select class="input-medium bfh-states form-control" data-country="countryStates" data-state="NCS" name="r-form-states">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-address">Address</label>
                                    <input type="text" name="r-form-address" placeholder="Address..." class="r-form-address form-control" id="r-form-address">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-zip">Zip Code</label>
                                    <input type="text" name="r-form-zip" pattern="[0-9]{4}" placeholder="ZIP Code..." class="r-form-zip form-control" id="r-form-zip">
                                </div>';
                                    } else {
                                        echo '<div class="form-group">
                                    <label class="sr-only" for="r-form-country">Country</label>
                                    <select class="input-medium bfh-countries form-control" data-country="PT" id="countryStates" name="r-form-country"></select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-State">State</label>
                                    <select class="input-medium bfh-states form-control" data-country="countryStates" data-state="NCS" name="r-form-states">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-address">Address</label>
                                    <input type="text" name="r-form-address" placeholder="Address..." class="r-form-address form-control" id="r-form-address">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-zip">Zip Code</label>
                                    <input type="text" name="r-form-zip" pattern="[0-9]{4}" placeholder="ZIP Code..." class="r-form-zip form-control" id="r-form-zip">
                                </div>';
                                    }
                                ?>
                                
                            </div>
	                    	
	                        <div class="col-sm-5">
                                <?php 
                                    if($student == 0){
                                        echo '<div class="form-group">
                                    <label class="sr-only" for="r-form-university">University</label>
                                    <input type="text" name="r-form-university" placeholder="University..." class="r-form-university form-control" id="r-form-university">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-course">Course</label>
                                    <input type="text" name="r-form-course" placeholder="Course..." class="r-form-course form-control" id="r-form-course">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-uniMail">University Email</label>
                                    <input type="text" name="r-form-uniMail" placeholder="University Email..." class="r-form-uniMail form-control" id="r-form-uniMail">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-student-number">Student Number</label>
                                    <input type="text" name="r-form-student-number" placeholder="Student Number..." class="r-form-student-number form-control" id="r-form-student-number">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-about-yourself">About yourself</label>
                                    <textarea name="r-form-about-yourself" placeholder="About yourself..." 
                                                class="r-form-about-yourself form-control" id="r-form-about-yourself"></textarea>
                                </div>';
                                    } else {
                                        echo '<div class="form-group">
                                    <label class="sr-only" for="r-form-since">Since</label>
                                    <input type="text" name="r-form-since" placeholder="Since..." class="r-form-since form-control" id="r-form-since">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-hm">Head Master</label>
                                    <input type="text" name="r-form-hm" placeholder="Head Master..." class="r-form-hm form-control" id="r-form-hm">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-vhm">Vice Head Master</label>
                                    <input type="text" name="r-form-vhm" placeholder="Vice Head Master..." class="r-form-vhm form-control" id="r-form-vhm">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="r-form-ms">Mail suffix</label>
                                    <input type="text" name="r-form-ms" placeholder="Mail Suffix..." class="r-form-ms form-control" id="r-form-ms">
                                </div>';
                                    }
                                ?>
                            </div>
				            <button type="submit" class="btn" name="confirm">Confirm!</button>
						</form>
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
        <script src="vendor/js/bootstrap-formhelpers.min.js"></script>
        <script src="js/continue.js"></script>
        
        <!--[if lt IE 10]>
            <script src="vendor/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>