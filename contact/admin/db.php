<?php
        $db_servername = "localhost";
        $db_database = "misshosting";
        $db_username = "root";
        $db_password = "root";

    try {
        $db = new PDO("mysql:host=$db_servername;
        dbname=$db_database;
        charset=utf8", 
        $db_username, 
        $db_password);
        
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "Connected successfully";
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>