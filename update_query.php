<?php
include "function.php";
if(isset($_POST["update-bt"])){
    $first_name=ucwords(strtolower($_POST["FIRST_NAME"]));
    $middle_name=$_POST["middle-name"] =="NULL" ||$_POST["middle-name"] =="" ? "NULL" : ucwords(strtolower($_POST["middle-name"]));
    $last_name=ucwords(strtolower($_POST["LAST_NAME"]));
    $class=(int)$_POST["menu-st-class"];
    $gender=ucwords(strtolower($_POST["gender"]));
    $phone=ucwords(strtolower($_POST["PHONE"]));
    $uid=$_POST["uid"];
    $Religion=ucwords(strtolower($_POST["RELIGION"]));
    $Section=ucwords(strtolower($_POST["SECTION"]));
    $year=$_POST["ACADEMIC_YEAR"];
    if($_POST["update-bt"]!=''){
        $filename=$_FILES["update-bt"]["name"];
        $tempname=$_FILES["update-bt"]["tmp_name"];
        $folder="img/".$filename;
        move_uploaded_file($tempname,$folder);
    }else{
        $folder=$_POST["hidden-photo-input-box"];

    }
    $array=array(
        "photo"=>$folder,
        "uid"=>$uid,
        "first_name"=>$first_name,
        "middle_name"=>$middle_name,
        "last_name"=>$last_name,
        "class"=>$class,
        "gender"=>$gender, 
        "phone"=>$phone,
        "Religion"=>$Religion,
        "Section"=>$Section,
        "year"=>$year
    );

    $query="UPDATE STUDENT SET PHOTO = '$folder', FIRST_NAME='$first_name',
    MIDDLE_NAME = '$middle_name',LAST_NAME='$last_name',CLASS='$class',GENDER='$gender',
    PHONE='$phone',RELIGION='$Religion',SECTION='$Section',ACADEMIC_YEAR='$year' WHERE  UID='$uid' ; ";

    $sql=sql_run($query);
    redirect("http://localhost//final_project//Student.php");

}
elseif(isset($_POST["update-cancel-bt"])){
    redirect("http://localhost//final_project//Student.php");
}
?>