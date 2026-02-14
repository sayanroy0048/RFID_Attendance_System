<?php
include "Admin_pannel.php";

// $y="insert";
?>
<html>

    <head>
       <link rel="stylesheet" href="Operation.css">
    </head>
    <body>
    <form action="#" method="POST">
        <div class="nav-bar">
            
                <button class="insert button" id="Insert" name="insert">Insert</button>
                
        </div>
    </form> 
        
<?php
if(isset($_POST["insert"])){
    redirect("http://localhost//final_project//Insert.php");
}

?>            
    </body>

</html>