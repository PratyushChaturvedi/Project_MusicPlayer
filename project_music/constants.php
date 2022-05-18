<?php
        //start session
        session_start();


        //create constants to store non repeating values
        define('SITEURL','http://localhost/project_music/');
        define('LOCALHOST','localhost:3307');
        define('DB_USERNAME','root');
        define('DB_PASSWORD','');
        define('DB_NAME','pearl');

        
        $conn = mysqli_connect(LOCALHOST,DB_USERNAME) or die(mysqli_error($conn));
        $db_select = mysqli_select_db($conn ,'pearl') or die(mysqli_error($conn));

?>