<?php
    include("config.php");

    $string = file_get_contents($_COOKIE["user"] . ".json");

    $json_a=json_decode($string,true);

    foreach ($json_a as $key => $value){
        if($key === 'username'){
            $user = $value;
        }

        if($key === 'pass'){
            $pass = $value;
        }

        if($key === 'student'){
            $student = $value;
        }
    }

    $query = "INSERT INTO sql11160894.LOGIN (L_ID, L_UNAME, L_PASS, L_UNI) VALUES ('', '". mysqli_real_escape_string($conn, $user) ."', '". mysqli_real_escape_string($conn, $pass) ."', '". mysqli_real_escape_string($conn, $student) ."');";

    if ($conn->query($query) === TRUE) {

        if($student == 0){
            $id = mysqli_insert_id($conn);

            $query = "UPDATE USER SET U_ACT='1' WHERE U_ID='".$id."' AND U_ACT='0'";

            if ($conn->query($query) === TRUE) {
                unlink($user . ".json");
                header('location:login.php');
            }
        }  else {
            unlink($user . ".json");
            header('location:login.php');
        }

    }

?>
