<?php
include('function.php') ; 
if($_SERVER['REQUEST_METHOD']=="POST" and $_POST['source']!= null){
    $date=$_POST['date'];
    $uid=$_POST['uid'];
    $sql2="SELECT name,UID,class,section,DATE,INCOMING_TIME,STATUS,OUTGOING_TIME FROM STUDENT_ATTENDENCE ;";
    $sql1="select t.name,a.UID,t.department,a.DATE,a.INCOMING_TIME,a.STATUS,a.OUTGOING_TIME from teacher_attendence a,teacher_details t where t.uid=a.UID and a.DATE='$date';";
    $sql="select DATE,INCOMING_TIME,STATUS,OUTGOING_TIME from teacher_attendence where UID='$uid' and DATE LIKE '$date%';";
    // $query=$_POST['source']=="all_teacher_attendence_record"?$sql1:$sql;
    switch($_POST['source']){
        case "all_teacher_attendence_record":                   
            $query=$sql1;
            break;
        case "teacher_attendence_record":
            $query=$sql;
            break;
        case "student_attendence_record":
            $query=$sql2;
            break;
        default:
            echo "<h2>error occured</h2>";
    }
    $data=sql_run($query);
    $filename = $date."_attendence.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($data)) {
        foreach ($data as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    } 
}
?>