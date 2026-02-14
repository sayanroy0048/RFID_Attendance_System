<?php
include('admin_pannel.php');
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>
    <div class="search">
        <form method="post" class="teacher-form">
            <div class="search_by">
                <!-- <label for="search_by_name">Enter Name:</label> -->
                <input type="search" name="search_by_name" id="search_by_name" placeholder="Enter Name:">
                <!-- <label for="search_by_id">Enter ID:</label> -->
                <input type="search" name="search_by_id" id="search_by_id" placeholder="Enter ID:">
                <!-- <label for="search_by_dept">Enter Department:</label> -->
                <input type="search" list="Dept" name="search_by_dept" id="search_by_dept"placeholder="Enter Department">
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
            <button type="submit" name="start_search" id="start_search">Search</button>
        </form>
    </div>
    <?php
        if(isset($_POST['start_search'])){
            $name=$_POST['search_by_name'];
            $id=$_POST['search_by_id'];
            $dept=$_POST['search_by_dept'];
            if(strlen($name)>0)
                $name="LIKE '%$name%'";
            else
                $name="IS NOT NULL";
            if(strlen($id)>0)
                $id="LIKE '%$id%'";
            else
                $id="IS NOT NULL";
            if(strlen($dept)>0)
                $dept="LIKE '%$dept%'";
            else
                $dept="IS NOT NULL";
            // echo $q_statement;
            $sql="select uid,teach_img,name,department from teacher_details where uid $id and name $name and department $dept;";
            // echo $sql;

            $data=mysqli_query($conn,$sql);
            // var_dump(mysqli_fetch_assoc($data));
            if(mysqli_num_rows($data)==0){
                echo "<h3 id=\"no_result_case\">No Such Result Found</h3> ";
            }
            else{
                ?><div class="search_reasult">
                    <table>
                        <thead>
                            <tr><th>Profile Picture</th>
                            <th>Full Name</th>
                            <th>Teacher ID</th>
                            <th>Department</th>
                            <th colspan="3">Action</th></tr>
                        </thead>
                        <tbody> <?php
                            while($tech_data=mysqli_fetch_assoc($data)){
                                echo "<tr><td><img src=\"".$tech_data['teach_img']."\"></td>
                                <td>".$tech_data['name']."</td>
                                <td>".$tech_data['uid']."</td>
                                <td>".$tech_data['department']."</td>
                                <form action=\"profile.php\" method=\"post\">
                                <input type=\"hidden\" name=\"source\" value=\"display\">
                                <input type=\"hidden\" name=\"uid\" value=\"".$tech_data['uid']."\">
                                <td><button  class=\"details-button\">View details</button></td></form>
                                <form action=\"teacher.php\" method=\"post\">
                                <input type=\"hidden\" name=\"source\" value=\"display\">
                                <input type=\"hidden\" name=\"uid\" value=\"".$tech_data['uid']."\">
                                <td><button  class=\"edit-button\">Edit details</button></td></form>
                                <form action=\"add_update_delete.php\" method=\"post\">
                                <input type=\"hidden\" name=\"job\" value=\"delete\">
                                <input type=\"hidden\" name=\"table\" value=\"teacher_details\">
                                <input type=\"hidden\" name=\"uid\" value=\"".$tech_data['uid']."\">
                                <td><button  class=\"delete-button\">Delete details</button></td></form>
                                </tr>" ;
                            } ?>
                       </tbody>
                    </table>
                </div>  <?php   
           }
        }
        $conn->close();
    ?>      
</body>
</html>