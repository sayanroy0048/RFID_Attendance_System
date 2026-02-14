<html>

<head>
    <link rel="stylesheet" href="form_submission.css">
</head>
<body>
    

<?php
include "function.php";

// function Student_form_submission(){
        if(isset($_POST["submit"])){
            $filename=$_FILES["photo"]["name"];
            $tempname=$_FILES["photo"]["tmp_name"];
            $folder="img/".$filename;
            move_uploaded_file($tempname,$folder);
            $first_name=ucwords(strtolower($_POST["first-name"]));
            $middle_name=$_POST["middle-name"] =="" ? "NULL" : ucwords(strtolower($_POST["middle-name"]));
            $last_name=ucwords(strtolower($_POST["last-name"]));
            $class=(int)$_POST["class-manue"];
            $gender=ucwords(strtolower($_POST["Gender"]));
            $phone=ucwords(strtolower($_POST["contract-no"]));
            $uid=strtoupper($_POST["uid"]);
            $Religion=ucwords(strtolower($_POST["Religion"]));
            $Section=ucwords(strtolower($_POST["Section"]));
            $year=$_POST["year"];
            $array=array(
                "photo"=>$folder,
                "uid"=>$uid,
                "first_name"=>$first_name,
                "middle_name"=>$middle_name,
                "last_name"=>$last_name,
                "class"=>$class,
                "gender"=>$gender, 
                "phone"=>$phone,
                "Religion"=>$Religion,
                "Section"=>$Section,
                "year"=>$year
            );
            Student_insertion_query("STUDENT",$array);
            // redirect("http://localhost//final_project//Insert.php");
            
            ?>
            <form action="#" method="POST">
                <input Style="display:none;" name="form_submission_uid" type="text " value="<?php echo $uid ;?>" readonly>
                <table  class="pop_up_st_table" celspacing="5">


                <?php
                foreach($array as $x => $y){ 
                    if($x=="photo"){
                ?>
                    <tr>
                        <td colspan="3" >
                            <img class="<?php echo $x; ?> pop_up_message_for_add_student" src="<?php echo $y ; ?>" alt="No_photo" height="130px" width="130px">
                        </td>
                    </tr>
                <?php
                    }elseif($x=="middle_name"){
                        if($y==""){
                            ?>
                            <tr>
                                <td  class="<?php echo $x ; ?> pop_up_message_for_add_student st_pop_td_lable"><?php echo strtoupper($x) ; ?></td>
                                <td class="colon">:</td>
                                <td class="<?php  echo $x;?> pop_up_message_for_add_student">NULL</td>
                            </tr>
                            <?php

                        }else{
                            ?>
                            <tr>
                                <td  class="<?php echo $x ; ?> pop_up_message_for_add_student st_pop_td_lable"><?php echo strtoupper($x) ; ?></td>
                                <td class="colon">:</td>
                                <td class="<?php  echo $x;?> pop_up_message_for_add_student"><?php echo strtoupper($y) ; ?></td>
                            </tr>
                            <?php

                        }
                    }
                    else{
                        ?>
                    <tr>
                        <td  class="<?php echo $x ; ?> pop_up_message_for_add_student st_pop_td_lable"><?php echo strtoupper($x) ; ?></td>
                        <td class="colon">:</td>
                        <td class="<?php  echo $x;?> pop_up_message_for_add_student"><?php echo strtoupper($y) ; ?></td>
                    </tr>
                        <?php

                    }
                }
                ?>
                    <tr>
                        <td class="td-button"><button class="green-bt" name="st_confirm_add">Add</button></td>
                        <td></td>
                        <td class="td-button" ><button name="cancel_from_add" class="red-bt">Cancel</button></td>
                    </tr>

                </table>
            </form>
            <?php

            
        }elseif(isset($_POST["cancel_from_add"])){
            $table_name="STUDENT";
            $uid=$_POST["form_submission_uid"];
            delete_query($table_name,$uid);
            redirect("http://localhost//final_project//Insert.php");

        }elseif(isset($_POST["st_confirm_add"])){
            ?>
 <div class="successful-massage">
                        <div class="icon">
                            <img src="Right_icon.png" alt="Right_icon">
                        </div>
                        <div class="Thank-you">Thank you !</div>
                        <div class="successfuly-login">Data Successfuly Save.</div>
                        <form method="post" action="#">
                            <div class="div-button">
                                <button name="successful-button" class="successful-button">
                                    Ok
                                </button>
                            </div>
                        </form>
                    
                    </div>
            <?php
        }elseif(isset($_POST["successful-button"])){
            redirect("http://localhost//final_project//Insert.php"); 
        }
// }
?>
</body>
</html>