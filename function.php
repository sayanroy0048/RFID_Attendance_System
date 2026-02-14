<?php
include "connection.php";

function redirect($data){
    ?>
    <script>
        window.location.href="<?php echo $data ; ?>";
    </script>
    <?php

}
function sql_run($query){
    global $conn;
    $sql=mysqli_query($conn,$query);
    return $sql;
}
function delete_query($table_name,$uid){
    $query="DELETE FROM $table_name WHERE UID = '$uid' ; ";
    $sql=sql_run($query);
}
function Student_insertion_query($table_name,$array){
    $photo=$array['photo'];
    $uid=$array['uid'];
    $first_name=$array['first_name'];
    $middle_name=$array['middle_name'];
    $last_name=$array['last_name'];
    $class=$array['class'];
    $gender=$array['gender'];
    $phone=$array['phone'];
    $Section=$array["Section"];
    $Religion=$array["Religion"];
    $year=$array["year"];

    $query="INSERT INTO $table_name VALUES ('$photo','$uid','$Section',
    '$Religion','$first_name','$middle_name','$last_name', $class,
    '$gender','$year', $phone) ;";
    
    $aql=sql_run($query);
    delete_query("TEMP",$uid);
}
function Student_details_display(){
    $query="SELECT * FROM STUDENT ;";
    $sql=sql_run($query);
    return $sql;
}
?>