<?php
 include('Admin_pannel.php');
    if($_SERVER["REQUEST_METHOD"]=="POST" and $_POST['uid']!= null){       
        $uid=$_POST['uid'];
        $sql=mysqli_query($conn,"select * from teacher_details where uid = '$uid';");
        if(mysqli_num_rows($sql)>1){
            die("wrong request");
        }
        $person_data=mysqli_fetch_assoc($sql);
        $name=$person_data['name'];
        $image=$person_data['teach_img'];
        $dept=$person_data['department'];
        $gender=$person_data['gender'];
        $email=$person_data['email'];
        $phone_no=$person_data['phone_no'];
        $date=date("Y");
        $sql="select round((count(DATE)/(select COUNT(DISTINCT DATE) from teacher_attendence)*100),2) as 'my_presence_percent' from teacher_attendence where uid ='$uid' and DATE LIKE '$date%';";
        $data=sql_run( $sql);
        $myPercentage=mysqli_fetch_assoc($data);
        $myPercentage=$myPercentage["my_presence_percent"];
        $sql="select DATE,INCOMING_TIME,STATUS,OUTGOING_TIME from teacher_attendence where UID='$uid' and DATE LIKE '$date%';";
        $data1=sql_run($sql);
    }
    else{
        echo "<h3 id=\"no_result_case\">Bad Request</h3> ";
        echo "<a href=\"search1.php\">Go to Main Page</a>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile_teach.css">
    <title>Document</title>
</head>
<body>
<div class="profile_th">
    <div class="personal_details">
        <h2>Personal Details</h2>
        <div class="teacher_details">
            <div class="profile_pic">
                <img src="<?php echo $image; ?>" id="img">
                <label for="img" id="uid"><?php echo $uid; ?></label>
            </div>
            <div class="biodata">
                <div class="name"><h4>Full Name:</h4><span><?php echo $name; ?></span></div><hr>
                <div class="dept"><h4>Department:</h4><span><?php echo $dept; ?></span></div><hr>
                <div class="gender"><h4>Gender:</h4><span><?php echo $gender; ?></span></div><hr>
                <div class="email"><h4>Email:</h4><span><?php echo $email; ?></span></div><hr>
                <div class="phone"><h4>Phone No.:</h4><span><?php echo $phone_no; ?></span></div><hr>
            </div>
        </div>
    </div>
    <div class="attendence_details">
        <h2>Attendence Details</h2>
        <p><i><b>Total Attendence:</i><i><?= $myPercentage."%" ?></i></b>
        <div class="export">
            <form action="excelExport.php" method="post">
            <input type="hidden" name="source" value="teacher_attendence_record">
            <input type="hidden" name="uid" id="uid" value="<?=$uid?>">
            <input type="hidden" name="date" id="sp_date" value="<?=$date?>">
            <button class="Export-button" name="export">Export</button></form>
        </div></p>
    <table>
        <thead>
            <tr>
            <th>Date</th>
            <th>Arrival Time</th>
            <th>Status</th>
            <th>Exit Time</th></tr>
        </thead>
        <tbody> <?php
    while($attendence_data=mysqli_fetch_assoc($data1)){
        echo "<tr><td>".$attendence_data['DATE']."</td>                    
        <td>".$attendence_data['INCOMING_TIME']."</td>
        <td>".$attendence_data['STATUS']."</td>
        <td>".$attendence_data['OUTGOING_TIME']."</td>
        </tr>" ;
    } ?>
    </tbody></table>
    </div>
</div>
</body>
</html>