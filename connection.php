<?php

    $host='localhost';
    $dbname='places_app';
    $username='root';
    $password='';

    $dbConnection=new mysqli($host , $username , $password , $dbname);

    if($dbConnection->connect_errno){
        die("connection error : " . $dbConnection->connect_errno);
    }

    return $dbConnection;