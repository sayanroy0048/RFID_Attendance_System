<?php
include "attendance2.php";
if(isset($_POST['st-attendece-dt'])){
    $uid=$_POST['uid'];
    $date=$_POST['date'];
    $sql="DELETE FROM student_attendence WHERE UID = '$uid' and DATE ='$date'";               
    $data=mysqli_query($conn,$sql);
}
$uid=null;
$date=null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="export">
            <form action="excelExport.php" method="post">
            <input type="hidden" name="source" value="student_attendence_record">
            <input type="hidden" name="uid" id="uid" value="<?=$uid?>">
            <input type="hidden" name="date" id="sp_date" value="<?=$date?>">
            <button class="Export-button" name="export">Export</button></form>
        </div>
    <div class="box-st-attendence-st" >
            <?php
                $query="SELECT * FROM STUDENT_ATTENDENCE ORDER BY DATE DESC;";
                $sql=sql_run($query);
                ?>
        <table class="attendence-td-st" border="1">
            <tr>
                <th>Photo</th>
                <th>Uid</th>
                <th>Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Date</th>
                <th>Incoming_time</th>
                <th>Outgoing_time</th>
                <th>Status</th>
                <th>Intime</th>
                <th>Action</th>
            </tr>
                <?php
                $i=0;
                while($array=mysqli_fetch_assoc($sql)){
                    $color=$i%2==0 ? "white":"gray";
                    $i++;
                    ?>
                    <tr class="<?php echo $color ; ?>">
                        <?php
                        foreach($array as $x=>$y){
                            if($x=="PHOTO"){
                                ?>
                                <td class="st-at-td <?php echo $x; ?>"><img src="<?php echo $y;?>" alt="NO_photo" width="68px" height="73px"></td>
                                <?php
                            }else{
                            ?>
                                <td class="st-at-td <?php echo $x; ?>"><?php echo $y ;?></td>
                            <?php
                            }
                        }
                        ?>
                        <td class="st-at-td">11:00:00</td>
                        
                        <td class="st-at-td">
                            <form action="#" method="post">
                                <input style="display:none ;" name="uid" type="text" value="<?php echo $array["UID"]; ?>">
                                <input style="display:none ;" name="date" type="text" value="<?php echo $array["DATE"]; ?>">
                                <button name="st-attendece-dt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg></button>
                            </form>
                        </td>     
                    </tr>
                    <?php
                }
                ?>
        </table> 
    </div>    
</body>
</html>