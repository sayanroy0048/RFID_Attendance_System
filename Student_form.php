<html>
    <head>
        <style>
            .ph_no_validation{
                Display:none;
            }
            .flex{
                color:red;
                border:none;
                height:20px;
   
            }
            #ph_no_validation{
                border: none;
                height: 20px;
                width: 312px;
            }
        </style>
    </head>
    <body>
<?php
    function Student_form(){
        ?>
    <form action="form_submission.php" onsubmit = "return validation()" method="POST" enctype="multipart/form-data">
<div class="div-table">
<table class="tb"  >
            
            <tr>
                <td>
                    <label for="photo">Choose Photo :<span>*</span></label>
                </td>
                <td colspan="5">
                    <input class="file-photo"  id="photo" name="photo" type="file" required>
                </td>
            </tr>
            <tr >
                <td>
                    <label for="uid">Student uid :<span>*</span></label>
                </td>
                <td colspan="5">
                    <input class="input" name="uid" id="uid" value="<?php echo $_POST["hidden-uid"];  ?>" type="text" readonly>
                </td>  
            </tr>
            <tr>
                <td>
                    <label for="fname">First Name :<span>*</span></label>
                </td>
                <td >
                    <input class="input" name="first-name" id="fname" placeholder="First name" type="text" required>
                </td>
                <td>
                    <label for="Middle Name">Middle Name :</label>
                </td>
                <td>
                    <input class="input" name="middle-name" id="Middle Name" placeholder="Middle name(Optional)" type="text">
                </td>
                <td>
                    <label for="Last Name">Last Name :<span>*</span></label>
                </td>
                <td>
                    <input class="input" name="last-name" id="Last Name" placeholder="Last name" type="text" required>
                    
                </td>
    
            </tr>
            <tr>
                <td>
                    <label for="Section">Section :<span>*</span></label>
                </td>
                <td>
                    <input id="Section" type="text" placeholder="Enter Section" class="input" name="Section" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Religion">Religion :<span>*</span></label>
                </td>
                <td>
                    <input id="Religion" type="text" placeholder="Enter Religion" class="input" name="Religion" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="class">Class : <span>*</span></label>
                </td>
                <td colspan="5">
                   <select name="class-manue" id="class" required>
                        <option value="1">Class 1</option>
                        <option value="2">Class 2</option>
                        <option value="3">Class 3</option>
                        <option value="4">Class 4</option>
                        <option value="5">Class 5</option>
                        <option value="6">Class 6</option>
                        <option value="7">Class 7</option>
                        <option value="8">Class 8</option>
                        <option value="9">Class 9</option>
                        <option value="10">Class 10 </option>
                        <option value="11">Class 11</option>
                        <option value="12">Class 12</option>
                   </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Gender">Gender : <span>*</span></label>
                </td>
                <td>
                    <label>Male</label><input type="radio" class="gender" name="Gender" value="Male"  required>
                </td>
                <td>
                    <label>Female</label><input type="radio" class="gender" name="Gender" value="Female" required >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="year">Academic Year:<span>*</span></label>
                </td>
                <td>
                    <input id="year" type="text" placeholder="Enter year" class="input" name="year" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="contract">Contract No :<span>*</span></label>
                </td>
                <td>
                    <input onkeydown="func()" type="number" class="input" placeholder="Enter phone no" id="constract" name="contract-no" required>
                    <div id="ph_no_validation" class="ph_no_validation">Invalid phone number !</div>
                </td>
            </tr>
            <tr >
                <td colspan="6" class="td-submit-bt">
                    <button class="submit" name="submit">Submit</button>
                </td>
            </tr>


        </table>

</div>
        
    </form> 
    </body>
</html>
 
    <script>
        function func(){

       
                            var phone = document.getElementById("constract").value;
                            console.log(phone.length);
                            if(phone.length!=(10-1)){
                                document.getElementById("ph_no_validation").classList.add("flex");
                                document.getElementById("ph_no_validation").classList.remove("ph_no_validation");
                                return false;
                                
                            }else{
                                document.getElementById("ph_no_validation").classList.remove("flex");
                                document.getElementById("ph_no_validation").classList.add("ph_no_validation");
                                
                            }     
                           
        }
        function validation(){
                             var phone = document.getElementById("constract").value;
                            console.log(phone.length);
                            if(phone.length!=10 ){
                                return false;
                                
                            }
        }
                        </script>
    <?php
    }
?>