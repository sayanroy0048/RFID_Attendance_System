<?php
include "Admin_pannel.php";
include "update.php";
// include "function.php";
?>
<html>
    <head>
        <link rel="stylesheet" href="Student.css">
    </head>
    <body>
        
            <form action="#" method="post">
                <div class="search-bar">
                    <input placeholder="Search" type="text" class="Search_student_input_box" name="Search_student_input_box">
                    <button name="Search" class="Search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg></button>
                </div>
            </form>
        
        
        <?php
            $sql=Student_details_display();
            while($array=mysqli_fetch_assoc($sql)){
                ?>
                <div class="student_details" id="hide">
                    <table border="1" id="Student_table" class="box-shadow" >
                        <tr>
                            <td colspan="3" class="st_photo_td">
                                <img src="<?php echo $array["PHOTO"]; ?>" alt="No_photo" >
                            </td>
                        </tr>

                        <?php
                        if($array["MIDDLE_NAME"]==="NULL"){
                            ?>
                            <tr>
                                <td colspan="3" class="st_name_td">
                                    <label><?php echo $array["FIRST_NAME"]." ".$array["LAST_NAME"]; ?></label>
                                </td>
                            </tr>           
                            <?php

                        }else{
                            ?>
                            <tr>
                                <td colspan="3" class="st_name_td">
                                    <label ><?php echo $array["FIRST_NAME"]."  ".$array["MIDDLE_NAME"]." ".$array["LAST_NAME"]; ?></label>
                                </td>
                            </tr>
                            <?php

                        }
                        ?>
                        
                        <tr>
                            <td class="st_uid label">
                                <label >Student uid</label>
                            </td>
                            <td><label>:</label></td>
                            <td>
                                <label  ><?php echo $array["UID"];?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="st_section label">
                                <label >Section </label>
                            </td>
                            <td>
                                <label >:</label>
                            </td>
                            <td>
                                <label ><?php echo $array["SECTION"]; ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="st_class label">
                                <label  >Class </label>
                            </td>
                            <td>
                                <label >:</label>
                            </td>
                            <td>
                                <label ><?php echo $array["CLASS"]; ?></label>
                            </td>
                        </tr>
                    </table>
                    <div>
                    <table border="1" class="right-lable box-shadow">
                        <tr>
                            <td colspan="3" class="right-table-lable">
                            <label><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                            </svg>Genarel Information</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="right-table-lable">
                                <label>Gender</label>
                            </td>
                            <td>:</td>
                            <td>
                               <label > <?php echo $array["GENDER"];  ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="right-table-lable">
                                <label>Academic Year</label>
                            </td>
                            <td>:</td>
                            <td>
                                <label ><?php echo $array["ACADEMIC_YEAR"]; ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="right-table-lable">
                                <label>Religion</label>
                            </td>
                            <td>:</td>
                            <td>
                                <label><?php echo $array["RELIGION"]; ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="right-table-lable">
                                <label>Phone</label>
                            </td>
                            <td>:</td>
                            <td>
                                <label><?php echo $array["PHONE"]; ?></label>
                            </td>
                        </tr>
                    </table>
                    <div class="st-button-form box-shadow">
                        <form action="#" method="post">
                            <input name="st_details_hidden_input_box" type="text" value="<?php echo $array["UID"];  ?>">
                            <button class="St_update" name="St_update">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                    </svg>Update</button>
                            <button class="St_delete" name="St_delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg><label for="">Delete</label></button>
                        </form>
                    </div>
                </div>
                </div>
                <?php
            }
            if(isset($_POST["St_delete"])){
                $uid=$_POST["st_details_hidden_input_box"];
                delete_query("STUDENT",$uid);
                redirect("http://localhost//final_project//Student.php");
            }elseif(isset($_POST["St_update"])){
                $uid=$_POST["st_details_hidden_input_box"];
                $query="SELECT * FROM STUDENT WHERE UID = '$uid' ; ";
                $sql=sql_run($query);
                $array=mysqli_fetch_assoc($sql);
                update_student($array);

            }elseif(isset($_POST["Search"])){
                $uid=$_POST["Search_student_input_box"];
                $query="SELECT * FROM STUDENT WHERE UID = '$uid' ; ";
                $sql=sql_run($query);
                $row=mysqli_num_rows($sql);
                if($row==1){
                   
                    $array=mysqli_fetch_assoc($sql);
                    update_student($array);
                }
            }
        ?>

<?php

?>
    </body>
</html>