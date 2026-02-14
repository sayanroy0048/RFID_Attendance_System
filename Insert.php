<?php
    include "Operation.php";
    include "Accept1.php";
    include "Student_form.php";
    include "display.php";
    // include "form_submission.php";
?>
<html>
    <head>
        <link rel="stylesheet" href="Insert.css">
        
    </head>
    <body>
             

<form action="#" method="POST">
                       <div class="div-reload">
                               <button name ="Display" class="reload"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                   <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                   <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                                   </svg>Display
                               </button>
                       </div>
</form>
            
            <?php

               if(isset($_POST["Display"])){
                   display();     
                }elseif(isset($_POST["Accept"]) ){
                    pop_up_teacher_student();   
                }elseif(isset($_POST["Add_Student"])){
                    Student_form();
                }elseif(isset($_POST["cross"])){   
                    display();
                }
                elseif(isset($_POST["Discart"])){
                    $uid=$_POST["hidden-input-box-for-uid"];
                    $table_name="TEMP";
                    delete_query($table_name,$uid);
                 }
                 elseif(isset($_POST["Add_Teacher"])){
                    
                 }
               
                ?>

        
    </body>
</html>