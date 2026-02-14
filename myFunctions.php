<?php
include('connection.php');
function set_for_update($uid){
    global $conn;
    $sql=mysqli_query($conn,"select * from teacher_details where uid = '$uid'"); 
    $person_data=mysqli_fetch_assoc($sql);
    // $name=$person_data['name'];
    echo "<script> document.getElementById(\"fullname\").value=\"".$person_data['name']."\"</script>" ;
    echo "<script> document.getElementById(\"uid\").value=\"".$uid."\"</script>" ;
    // $image=$person_data['teach_img'];
    echo "<script> document.getElementById(\"PPic\").value=\"".$person_data['teach_img']."\"</script>" ;
    // $dept=$person_data['department'];
    echo "<script> document.getElementById(\"department\").value=\"".$person_data['department']."\"</script>" ;
    // $gender=$person_data['gender'];
    echo "<script> document.getElementById(\"gender\").value=\"".$person_data['gender']."\"</script>" ;
    // $email=$person_data['email'];
    echo "<script> document.getElementById(\"email\").value=\"".$person_data['email']."\"</script>" ;
    // $phone_no=$person_data['phone_no'];
    echo "<script> document.getElementById(\"P_no\").value=\"".$person_data['phone_no']."\"</script>" ;
    echo "<script> document.getElementById(\"identify_job\").value=\"update\"</script>" ;
    echo "<script> document.getElementById(\"submitbtn\").innerHTML=\"UPDATE\"</script>" ;
}
function set_for_add($uid){
    // echo "<script> document.getElementById(\"uid\").value=$uid</script>";
    echo "<script> document.getElementById(\"identify_job\").value=\"add\"</script>" ;
    echo "<script> document.getElementById(\"submitbtn\").innerHTML=\"ADD\"</script>" ;
}
?>