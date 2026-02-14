<?php
    include('attendance2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teacher_attnd.css">
    <title>Document</title>
</head>
<body>
<div class="box-st-attendence-st" >
    <div class="attendence_date_input_field">
        <form action="#" method="post">
            <input type="date" name="attendence_date" id="attendence_date">
            <button name="search" id="search">search</button>
        </form>
        <div class="export">
            <form action="excelExport.php" method="post">
            <input type="hidden" name="source" value="all_teacher_attendence_record">
            <input type="hidden" name="uid" id="uid">
            <input type="hidden" name="date" id="sp_date" >
            <button class="Export-button" name="export">Export</button></form>
        </div>        
    </div>
    <div class="search_result" >
    <?php
    $date=$_SERVER['REQUEST_METHOD']=="POST"?$_POST['attendence_date']:date("y-m-d");
    echo "<script>document.getElementById(\"sp_date\").value=\"".$date."\"</script>" ;
    echo "<script>document.getElementById(\"attendence_date\").value=\"".$date."\"</script>" ;  
    $sql="select t.teach_img,t.name,a.UID,t.department,a.INCOMING_TIME,a.STATUS,a.OUTGOING_TIME from teacher_attendence a,teacher_details t where t.uid=a.UID and a.DATE='$date';";
    $data=sql_run($sql); 
    
    if(mysqli_num_rows($data)==0){
        echo "<h3 id=\"no_result_case\">No Such Result Found</h3> ";
    }
    else{
    ?>
    <table>
            <thead>
                <tr>
                <th>profile pic</th>
                <th>Full Name</th>
                <th>Teacher ID</th>
                <th>Department</th>
                <th>Arrival Time</th>
                <th>Status</th>
                <th>Exit Time</th>
                <th colspan="2">Action</th></tr>
            </thead>
            <tbody id="teacher_record">
            <?php
                while($attendence_data=mysqli_fetch_assoc($data)){
                    echo "<tr><td><img src=\"".$attendence_data['teach_img']."\" width=\"80px\" height=\"80px\"></td>
                    <td>".$attendence_data['name']."</td>
                    <td>".$attendence_data['UID']."</td>
                    <td>".$attendence_data['department']."</td>
                    <td>".$attendence_data['INCOMING_TIME']."</td>
                    <td>".$attendence_data['STATUS']."</td>
                    <td>".$attendence_data['OUTGOING_TIME']."</td>
                    <form action=\"profile.php\" method=\"post\">
                    <input type=\"hidden\" name=\"source\" value=\"teacher_attnd.php\">
                    <input type=\"hidden\" name=\"uid\" value=\"".$attendence_data['UID']."\"> 
                    <td><button  class=\"details-button\">View details</button></td></form>
                    <form  action=\"add_update_delete.php\" method=\"post\">
                    <input type=\"hidden\" name=\"job\" value=\"delete_attendence\">
                    <input type=\"hidden\" name=\"date\" value=\"".$date."\">
                    <input type=\"hidden\" name=\"uid\" value=\"".$attendence_data['UID']."\">
                    <td><button  class=\"delete-button\">Delete</button></td></form>
                    </tr>" ;
                } ?>
            </tbody>
        </table>
    </div>
    <?php }
     ?>
</div>
</body>
</html>