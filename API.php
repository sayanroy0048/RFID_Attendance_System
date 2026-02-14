<?php
include "response_code.php";
include "function.php";
date_default_timezone_set("Asia/Kolkata");
if(strtotime(date("H:i:s"))>="05:05:5"){
}

if(isset($_GET["UID"])){  
        $x=$_GET["UID"];
        $query="SELECT * FROM STUDENT WHERE UID='$x';";
        $sql=sql_run($query);
        $row=mysqli_num_rows($sql);
        if($row<=0){
          $query="SELECT * FROM teacher_details WHERE UID='$x';";
        $sql=sql_run($query);
        $row=mysqli_num_rows($sql);
          if($row>0){
            insert_into_teacher($x);
            exit();
          }
          invalid();
        $query="INSERT INTO TEMP VALUES('$x') ;";
        $sql=sql_run($query);
        }else{
          
          $query="SELECT * FROM STUDENT_ATTENDENCE WHERE DATE=CURRENT_DATE() AND UID='$x';";
          $sql=sql_run($query);
          $row=mysqli_num_rows($sql);
          if($row<=0){
          valid();
          $query1="SELECT * FROM STUDENT WHERE UID = '$x';";
          $sql=sql_run($query1);
          $student_array=mysqli_fetch_assoc($sql);
          $photo=$student_array["PHOTO"];
          ?> <input type="text" value="<?php echo $photo ;?>"><?php
          $uid=$student_array["UID"];
          $first_name=strtolower($student_array["FIRST_NAME"]);
          $first_name=ucwords($first_name);
          $last_name=strtolower($student_array["LAST_NAME"]);
          $last_name=ucwords($last_name);
          $name=$first_name." ".$last_name;
          $section=$student_array["SECTION"];
          $class=$student_array["CLASS"];
          $date=strtotime(date("H:i:s"));
          $status=$date == "11:00:00" ? "Intime" :($date > "11:00:00" ?"Late":"Early");

          $query2="INSERT INTO STUDENT_ATTENDENCE VALUES('$photo','$uid','$name',
          '$class','$section',CURRENT_DATE(),CURRENT_TIME(),NULL,'$status') ;";
          $sql=sql_run($query2);

          }else{
            $query="SELECT * FROM STUDENT_ATTENDENCE WHERE DATE=CURRENT_DATE() AND UID = '$x' ;";
            $sql=sql_run($query);
            $array=mysqli_fetch_assoc($sql);
            if(empty($array["OUTGOING_TIME"])){
              valid();
              $query3="UPDATE STUDENT_ATTENDENCE SET OUTGOING_TIME = CURRENT_TIME() WHERE UID = '$x' AND DATE=CURRENT_DATE() ;";
              $sql=sql_run($query3);
            }else{
              invalid();
            }
          }
        }
}
function insert_into_teacher($x){

                         
  $query="SELECT * FROM TEACHER_ATTENDENCE WHERE DATE=CURRENT_DATE() AND UID='$x';";
  $sql=sql_run($query);
  $row=mysqli_num_rows($sql);
  if($row<=0){
   valid();
  //  $query1="SELECT * FROM STUDENT WHERE UID = '$x';";
  //  $sql=sql_run($query1);
  //  $student_array=mysqli_fetch_assoc($sql);
  //  $photo=$student_array["PHOTO"];
   
  //  $uid=$student_array["UID"];
  //  $first_name=strtolower($student_array["FIRST_NAME"]);
  //  $first_name=ucwords($first_name);
  //  $last_name=strtolower($student_array["LAST_NAME"]);
  //  $last_name=ucwords($last_name);
  //  $name=$first_name." ".$last_name;
  //  $section=$student_array["SECTION"];
  //  $class=$student_array["CLASS"];
   $date=strtotime(date("H:i:s"));
   $status=$date == "11:00:00" ? "Intime" :($date > "11:00:00" ?"Late":"Early");

   $query2="INSERT INTO TEACHER_ATTENDENCE VALUES('$x',
   CURRENT_DATE(),CURRENT_TIME(),'$status',NULL) ;";
   $sql=sql_run($query2);

  }else{
     $query="SELECT * FROM TEACHER_ATTENDENCE WHERE DATE=CURRENT_DATE() AND UID = '$x' ;";
     $sql=sql_run($query);
     $array=mysqli_fetch_assoc($sql);
     if(empty($array["OUTGOING_TIME"])){
       valid();
       $query3="UPDATE TEACHER_ATTENDENCE SET OUTGOING_TIME = CURRENT_TIME() WHERE UID = '$x' AND DATE=CURRENT_DATE() ;";
       $sql=sql_run($query3);
     }else{
       invalid();
     }
  }
}                       
?>


