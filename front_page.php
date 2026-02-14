<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>front page</title>
    <link rel="stylesheet" href="front.css">
</head>
<body>
    <div class="img">
    
    </div>    
    <div class="front-content">
            <div class="heading">
                Student Management System
            </div>
            <div class="text">
                <div class="left-paragraph">
                     <p> Click Admin button for enter to the Admin pannel</p>
                </div>
                <div class="right-paragraph">
                    <p>The Parents can Click the Parent button and they are only able to see the students
                    record.</p>    
                </div>
            </div>
            <form method="POST" action="#">
                <div class="button">
                    <button class="Admin" name="Admin">Admin</button>
                    <button class="Parent" name="Parent">Parent</button>
                </div>
            </form>
     </div>
    <div class="body">
        <div class="templete">
            <img src="student1.jpg" alt="student_picture">
            <img src="student2.jpg" alt="student_picture">
            <img src="student4.jpg" alt="student_picture">
        </div>
        <div class="about">
        
            <img class="student5" src="student5.jpg" alt="student_picture">
            <p class="about-first-p">
                Our school's mission is to learn leadership, the common core,  and 
                relationships for life. Our mission is to provide a safe , diciplined
                learning environment that empowers all students to develop their full
                potential. We feel stringly about healping to build leaders that have
                the ability to suceed in whateve endeavor they undertake.</p>
                <p class="remaining-paragraph-inside-about"> Winning is not 
                always the measure of success. Our students understand the "Win , Win"
                philoshopy and use it in their daily life.Common standards keeps us 
                focused on learning appropiate content and preparing our student to graduate. 
            </p>
        </div>
    </div>

    <!-- redirected the page to the Login page -->
    <?php include "function.php" ; ?>
    <?php
        if(isset($_POST["Admin"])){
            // header("Location:page2.php");
            redirect("http://localhost//final_project//login.php");
            // <!-- <script>
            //     window.location.href="http://localhost//final_project//page2.php";
            // </script> 
            
        }
    ?>
</body>
</html>