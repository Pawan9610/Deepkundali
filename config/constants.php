<?php

    /**start session**/
    session_start();


    //define db_conn values 
    define('SITEURL', 'http://localhost/deepkundali/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'deepkundali');

    //Execute Query and store form data in database

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database
?>