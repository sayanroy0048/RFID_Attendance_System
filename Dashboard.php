<?php
include "Admin_pannel.php";
?>
<html>
    <head>
        <link rel="stylesheet" href="dashboard.css">
    </head>
    <body>
        <div class="heading-dashboard-administrator">
            Dashboard Administrator
        </div>
        <div class="box">
            <div class="Total-teacher box-shawod">
                <div class="dashboard-content">
                    <p>Teacher</p>
                    <h1 id="total_teacher_count">0</h1>
                </div>
            </div>
            <div class="Total-student box-shawod">
                <div class="dashboard-content">
                    <p>Student</p>
                    <h1 id="total_student">0</h1>
                </div>
            </div>
            <div class="Total-Attend box-shawod">
                <div class="dashboard-content">
                    <p>Student Attendance</p>
                    <h1 id="total_std_attendence_count">0</h1>
                </div>
            </div>
            <div class="Notice box-shawod">
                <div class="dashboard-content">
                    <p>Teacher Attendance</p>
                    <h1 id="total_tch_attendence_count">0</h1>
                </div>
            </div>
        </div>
        <div class="icons">
            <div class="svg Teacher">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
            </div>
            <div class="svg Student">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                            </svg>
            </div>
            <div class="svg Attendance">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                            </svg>
            </div>
            <div class="svg Notification">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                            </svg>
            </div>
        </div>
        <?php 
            $query="SELECT COUNT(*) AS 'STUDENT_COUNT' FROM student ;";
            $sql=sql_run($query);
            $array=mysqli_fetch_assoc($sql);
            $query="SELECT COUNT(*) AS 'TEACHER_COUNT' FROM teacher_details ;";
            $sql=sql_run($query);
            $array1=mysqli_fetch_assoc($sql);
            $query="SELECT COUNT(*) AS 'std_Attendence_COUNT' FROM student_attendence where date=CURRENT_DATE()  ;";
            $sql=sql_run($query);
            $array2=mysqli_fetch_assoc($sql);
            $query="SELECT COUNT(*) AS 'tch_Attendence_COUNT' FROM teacher_attendence where date=CURRENT_DATE()  ;";
            $sql=sql_run($query);
            $array3=mysqli_fetch_assoc($sql);
        ?>
        <script>
            let x = document.getElementById("total_student");
            console.log(x);
            x.innerHTML="<?php echo $array["STUDENT_COUNT"]; ?>";
            let y = document.getElementById("total_teacher_count");
            y.innerHTML="<?php echo $array1["TEACHER_COUNT"]; ?>";
            let z = document.getElementById("total_std_attendence_count");
            z.innerHTML="<?php echo $array2["std_Attendence_COUNT"]; ?>";
            let v = document.getElementById("total_tch_attendence_count");
            v.innerHTML="<?php echo $array3["tch_Attendence_COUNT"]; ?>";
            
        </script>
    </body>
</html>