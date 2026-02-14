<html>
    <head>
        <link rel="stylesheet" href="update.css">
    </head>
<body>
    

<?php
function update_student($array){
    // echo "hello";
    ?>
        <form action="update_query.php" method="post" enctype="multipart/form-data">
            <table  class="update-tb-st">
                <?php
                foreach($array as $x=>$y){
                    ?>
                <tr>
                    <?php
                    if($x=="CLASS"){
                        ?>
                        <td class="st-td">Class</td>
                        <td>:</td>
                        <td>
                        <select name="menu-st-class" class="class-st-manue">
                            <?php
                            for($i=1;$i<=12;$i++){
                                if($i==intval($y)){
                                    ?>
                                    <option value="<?php echo $y ;?>" selected>class <?php echo $y ; ?></option>
                                    <?php
                                }else{
                                        ?>
                                    <option value="<?php echo $i; ?>">class <?php echo $i ; ?></option>
                                        <?php
                                }
                            }
                            ?>
                        </select>
                        </td>
                        <?php
                    }elseif($x=="PHOTO"){
                        ?>
                        <td class="st-td">Photo</td>
                        <td>:</td>
                        <td>
                            <input type="file"  name="update-pt">
                            <input type="text" style="display:none;" name="hidden-photo-input-box" value="<?php echo $y ;?>">
                        </td>
                        <?php
                    }elseif($x=="GENDER"){
                        ?>
                        <td class="st-td">Gender</td>
                        <td>:</td>
                        <td>
                        <?php
                            $flag=0;
                            if(strtoupper($y)=="MALE"){
                                $flag=1;
                                ?>
                            <label for="Male">Male</label><input name="gender" id="Male" value="Male" type="radio" checked required>
                                <?php
                                
                            }else{
                                $flag=2;
                                ?>
                            <label for="Female">Female</label><input name="gender" id="Female" value="Female" type="radio" checked required>
                                <?php
                            }
                            if($flag==1){
                                ?>
                            <label for="female">Female</label><input name="gender" value="female" type="radio" required>
                                <?php
                            }elseif($flag==2){
                                ?>
                            <label for="female">Female</label><input name="gender" value="male" type="radio" required>
                                <?php
                                
                            }
                            
                        ?>
                        </td>
                        <?php
                    }elseif($x=="UID"){
                        ?>
                        <td class="st-td">Student uid</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="uid" value="<?php echo $y; ?>" readonly>
                        </td>
                        <?php
                    }elseif($x=="MIDDLE_NAME"){
                        ?>
                        <td class="st-td">Middle_name</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="middle-name" value="<?php echo $y;  ?>">
                        </td>

                        <?php
                    }else{
                        ?>
                        <td class="st-td <?php echo $x ?>"><?php echo ucwords(strtolower($x)); ?></td>
                        <td>:</td>
                        <td>
                            <input type="text" name="<?php echo $x ;?>" value="<?php echo $y;  ?>" required>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
                }

                ?>
                <tr>
                    <td colspan="3">
                        <button class="update-bt" name="update-bt">update</button>
                        <button name="update-cancel-bt" class="update-Cancel-bt">Cancel</button>
                    </td>
                </tr>
            </table>
        </form>
    <?php
}

?>
</body>
</html>