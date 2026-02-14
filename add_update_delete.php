<?php
include('function.php');
if($_SERVER["REQUEST_METHOD"]=="POST" and $_POST['job']!=null){
    // var_dump($_POST)  ;
    $uid=$_POST['uid'];
    
    if($_POST['job']=="add" or $_POST['job']=="update"){
        $name=$_POST['name'];
        $dept=$_POST['department'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $phone_no=$_POST['p_no'];
        $error=$_FILES['PPic']['error'];
        if($error!=4){
            $img_name=$_FILES['PPic']['name'];
            $temp=$_FILES['PPic']['tmp_name'];
            $folder="ujjaleditz/".$img_name;
            move_uploaded_file($temp,$folder);
        }
    }
    switch($_POST['job']){
        case "add":                   
            $sql="INSERT INTO `teacher_details` ";
            $sql.="(`uid`, `teach_img`, `name`, `department`, `gender`, `email`, `phone_no`)";
            $sql.="VALUES ('$uid', '$folder', '$name', '$dept', '$gender', '$email', '$phone_no');";
            $data=mysqli_query($conn,$sql);
            delete_query("Temp",$uid);
            break;
        case "update":
            if($error==4){
                $sql="UPDATE `teacher_details` SET `name` = '$name',";
            }
            else{
                $sql="UPDATE `teacher_details` SET `teach_img` = '$folder', `name` = '$name',";
            }
            $sql.="`department` = '$dept', `gender` = '$gender', `email` = '$email',";
            $sql.=" `phone_no` = '$phone_no' WHERE `teacher_details`.`uid` = '$uid';";
            $data=mysqli_query($conn,$sql);
            break;
        case "delete":
            // $sql="DELETE FROM `teacher_details` WHERE `teacher_details`.`uid` = '$uid'";
            $table=$_POST['table'];
            delete_query($table,$uid);
            delete_query("teacher_attendence",$uid);
            // if($table=="teacher_attendence")
            // header("Location:teacher_attnd.php");
            // $data=mysqli_query($conn,$sql);
            break;
        case "delete_attendence":
            $date=$_POST['date'];
            $sql="DELETE FROM teacher_attendence WHERE UID = '$uid' and DATE ='$date'";
            // $table=$_POST['table'];           
            $data=mysqli_query($conn,$sql);
            break;
        default:
            echo "<h2>error occured</h2>";
    }
    $conn->close();
    $loc=$_POST['job']=="delete_attendence"?"teacher_attnd.php":"search1.php";
    header("Location:$loc");
} 
?>