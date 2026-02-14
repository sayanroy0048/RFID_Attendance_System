<?php
$conn=mysqli_connect('localhost','root','','projectsem');
if(!$conn){
    error_log("connection failed".mysqli_connect_error());
    die ("we are exrerience connection error");
}
if($_SERVER['REQUEST_METHOD']=="POST" and $_POST['source']=="teacher_attendence_record"){
$date=date("Y");
$uid=$_POST['uid'];
$sql="select t.name,a.uid,a.date,a.intime,a.status,a.outtime from attendenc_rec a,teacher_details t where t.uid=a.uid and a.uid='$uid' and a.date LIKE '$date%';";
$data=mysqli_query($conn,$sql);
$fname=$uid."attendence.xls";
header('Content-Type:application/vnd.ms-excel');
header('Content-Disposition:attachment;filename='.$fname);
echo "<table>
        <tr>
        <th>Full Name</th>
        <th>Teacher ID</th>
        <th>Date</th>
        <th>Arrival Time</th>
        <th>Status</th>
        <th>Exit Time</th></tr>";
while($attendence_data=mysqli_fetch_assoc($data)){
    echo "<tr><td>".$attendence_data['name']."</td>                    
    <td>".$attendence_data['uid']."</td>
    <td>".$attendence_data['date']."</td>
    <td>".$attendence_data['intime']."</td>
    <td>".$attendence_data['status']."</td>
    <td>".$attendence_data['outtime']."</td>
    </tr>" ;
}
echo "</table>";
}
$conn->close();
?>  