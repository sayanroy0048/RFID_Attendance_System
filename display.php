<?php
function  display(){
                ?>
                <script>
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    </script>
                
                    <div class="temp-heading">Temporary Table</div>
                <?php
                $query="SELECT * FROM TEMP;";
                $sql=sql_run($query);
                $row=mysqli_num_rows($sql);
                $i=0;
                global $y;
                $y="bt-white";
                if($row<=0){
                    ?>
                        <div class="no-data">No records are present inside the database</div>
                    <?php
                }else{
                    ?>
                    <table  cellspacing="0" class="table" >
                        <tr>
                            <th>#No.</th>
                            <th>Uid</th>
                            <th>Action</th>
                        </tr>
                    <?php
                            while($array=mysqli_fetch_assoc($sql)){
                                        ++$i;
                                        if($i%2==0){
                                        $style="gray";
                                        }
                                        else{
                                        $style="white";
                                        }
                                    ?>
                                <form action="#" method="POST">   
                                    <tr class="<?php echo $style ;?>">
                                        <td><?php echo $i; ?></td>
                                        <td><input type="text" class="hidden-input-box" name="hidden-input-box-for-uid" value="<?php echo $array["UID"]; ?> " readonly><?php echo $array["UID"]; ?></td>
                                        <td class="td-button">
                                            <button name="Accept" class="accept">Accept</button>
                                            <button name="Discart" class="discart">Discart</button>    
                                        </td>
                                    </tr>
                                </form>
                     <?php
                            }
                    ?>
                    </table>
        <?php
            }
        }
 ?>