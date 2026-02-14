<?php
    include('Admin_pannel.php');
    include('myFunctions.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
    <link rel="stylesheet" href="teacher2.css">
</head>
<body>
<div class="teacher_add_update">
    <div class="container">
        <form action="add_update_delete.php" method="post" onsubmit="return validate()" enctype="multipart/form-data">
        <input type="hidden" name="source" id="source">
            <div class="name">
                <label for="fullname">Teacher Name</label>
                <input type="text" name="name" id="fullname">
                <span id="invalid_name" style="visibility: hidden;">Invalid Name</span>              
            </div>
            <div class="teacherId">
                <label for="tid">Teacher ID</label>
                <input type="text" name="uid" id="uid" value="<?= str_replace(' ','',$_POST['uid']);  ?>">
                <span id="invalid_id" style="visibility: hidden;">Invalid ID</span>   
            </div>
            <div class="department">
                <label for="department">Department</label>
                <input list="Dept" name="department" id="department" >
                <datalist id="Dept">
                    <option value="Chem">Chemistry</option>
                    <option value="PHSc">Physics</option>
                    <option value="Beng">Bengali</option>
                    <option value="Eng">English</option>
                    <option value="Math">Mathematics</option>
                    <option value="Hist">History</option>
                    <option value="Bio">Biology</option>
                    <option value="Geo">Geography</option>
                    <option value="CS">Computer Science</option>
                </datalist>
            </div>
            <div class="gender">
                <label for="gender">Gender</label>
                <input list="gen" name="gender" id="gender" >
                    <!-- <option>click for option</option> -->
                    <datalist id="gen">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">others</option>
                    </datalist>                   
            </div>
            <div class="image">
                <label for="PPic">Profile Picture</label>
                <input type="file" name="PPic" id="PPic" accept="image/*">
            </div>
            <div class="contact">
                <label for="P_no">Phone no.</label>
                <input type="text" name="p_no" id="P_no"  >
                <span id="invalid_Pno" style="visibility: hidden;">Invalid Phone no.</span>   
                <label for="email">Email</label>
                <input type="email" name="email" id="email"  >
                <span id="invalid_email" style="visibility: hidden;">Invalid Email</span>   
            </div>
            <input type="hidden" name="job" id="identify_job">
            <div class="submit">
                <button type="buttun" name="submit-btn" id="submitbtn">ADD</button>
            </div>
        </form>
    </div>
    <?php
          if($_SERVER["REQUEST_METHOD"]=="POST" and $_POST['source']!=null){
            // var_dump($_POST)  ;
            $uid=str_replace(' ','',$_POST['uid']);
            switch($_POST['source']){
                case "display":                   
                    set_for_update($uid);
                    break;
                case "add":
                    set_for_add($uid);
                    break;
                default:
                    echo "<h2>error occured</h2>";
            }
        }
        else{
            echo "<h3 id=\"no_result_case\">Bad Request</h3> ";
            echo "<a href=\"search1.php\">Go to Main Page</a>";
        }          
    ?>
    
    <script>
        function validate(){
            let fname=document.getElementById("fullname").value;
            let tid=document.getElementById("uid").value;
            // let img=document.getElementById("PPic").value;
            let phno=document.getElementById("P_no").value;
            let email=document.getElementById("email").value;
            let nameRegex=/^[a-zA-Z\s'-]+$/;
            let idRegex=/^[a-zA-Z0-9]{8}$/;
            let phnoRegex=/^[6-9][0-9]{9}$/;
            let emailRegex=/^([a-zA-Z0-9\.-]+)@([a-zA-Z0-9]+).([a-z]{2,10})(.[a-z]{2,10})?$/;
            let valid=true;
            console.log("hello");
            if(!nameRegex.test(fname)){
                document.getElementById("invalid_name").style.visibility="visible";
                valid=false;
            }
            else
            document.getElementById("invalid_name").style.visibility="hidden";
            if(!idRegex.test(tid)){
                document.getElementById("invalid_id").style.visibility="visible";
                valid=false;
            }
            else
            document.getElementById("invalid_id").style.visibility="hidden";
            if(!phnoRegex.test(phno)){
                document.getElementById("invalid_Pno").style.visibility="visible";
                valid=false;
            }
            else
            document.getElementById("invalid_Pno").style.visibility="hidden";
            if(!emailRegex.test(email)){
                document.getElementById("invalid_email").style.visibility="visible";
                valid=false;
            }
            else
            document.getElementById("invalid_email").style.visibility="hidden";         
            return valid;
        }
    </script>
</div>
</body>
</html>
