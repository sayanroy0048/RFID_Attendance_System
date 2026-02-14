<?php
    $localhost="localhost";
    $root="root";
    $password="";
    $dbname="projectsem";

    $conn=mysqli_connect($localhost,$root,$password,$dbname);

    if(!$conn){
        echo "not connected ...";
    }
?>