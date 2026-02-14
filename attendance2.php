<?php
include "Admin_pannel.php";
if(isset($_POST['st-attendence']))
redirect("http://localhost//final_project//student_attnd.php");
else if(isset($_POST['tr-attendence']))
redirect("http://localhost//final_project//teacher_attnd.php");
?>
<html>
<head>
    <head>
        <link rel="stylesheet" href="Attendance.css">
    </head>
    <body>
        <div class="nav-attendence">
            <form action="#" method="post">
                <button name="st-attendence">Student</button>
                <button name="tr-attendence">Teacher</button>
            </form>
        </div>
    </body>
</head>
</html>