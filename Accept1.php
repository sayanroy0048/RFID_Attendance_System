<?php
    function pop_up_teacher_student(){
        ?>
<html>
    <head>
        <link rel="stylesheet" href="Accept.css">
    </head>
    <body>
        <div class="TechStd">
            <form action="#" method="post">
            <button class="cross" name="cross">X</button></form>
                <table class="td-pop-up-tech-std" cellspacing="45">
                      
                    <tr>
                        <td colspan="2"><div>Click the button !</div></td>
                    </tr>
                    <tr>
                        
            <form action="teacher.php" method="POST"> 
                        <input type="hidden" name="source" value="add">
                        <td><button name="Add_Teacher" class="Add_Teacher ">Add Teacher</button></td>
                        <input  name="uid" class="hidden-uid" value="<?php echo $_POST["hidden-input-box-for-uid"]; ?>"></input>
            </form> 
            <form action="#" method="POST"> 
                        <td><button name="Add_Student" class="Add_Student">Add Student</button></td>
                        <input  name="hidden-uid" class="hidden-uid" value="<?php echo $_POST["hidden-input-box-for-uid"]; ?>"></input>
            </form>
                    </tr>
                </table> 
                                                                 
        </div>
    </body>
</html>
        <?php
    }
?>