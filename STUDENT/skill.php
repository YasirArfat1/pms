<?php
include 'header.php';
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';

if(isset($_POST['allocate']))
        {
           $id=$_POST['facultyid'];  
            $sql= "INSERT INTO `pmas`.`request` (`request_id`, `s_id`, `f_id`) VALUES ('', '$user', '$id');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:skill.php');  
                  
        }

?>




<body>
      
    <div class="container">
       <h4 class="text-center text-muted mb-2 mt-2">Faculty Reasaerch Areas</h4>
       <form method="post" action="skill.php">
        <div class="row border rounded mb-2 mt-2 p-3">
            <div class="col-md-3">
                <label for="">Faculty Id </label>
            </div>
            <div class="col-md-6">
                <?php
                    include '../connection.php';
                    $sql="select *  from faculty";
                    $result=  mysqli_query($conn, $sql)
                    ?> <select name="faculty" class="form-control">
                    <option selected="selected" ><h3>Supervisors</h3></option>
                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                    $category= $row['f_id'];
                    $name= $row['name'];
                    ?>
                    <option selected="selected" value="<?php echo $category; ?>"><?php echo $category." , ".$name;?></option>
                    <?php
                    }
                ?>
                    </select>
            </div>
            <div class="col-md-3">
                <input type="submit" class="btn btn-dark w-100" name="asses" value="View Skill Matrix"/>
            </div>
        </div>
        </form>
    </div>
    
    

    <div class="container">
        <form method="post" action="skill.php">
            <div class="col-md-6 shadow mx-auto">
    <?php
            if (isset($_POST['asses']))
            {   
                $fid=$_POST['faculty'];          
                ?>
                <div class="form-group">
                    <label for="">Faculty ID</label>
                    <input type="text" name="facultyid" class="form-control"  readonly value="<?php echo $fid;?>" readonly>
                </div>
                
                
                <?php
                
                
                $sql1="select * from faculty where f_id ='$fid' ";
                $rec=mysqli_query($conn, $sql1);
                while ($std= mysqli_fetch_assoc($rec))
                {   
                        echo "<div class='form-gorup'>";
                        echo "<label>"."Name"."</label>";
                        echo "<div>"?> <input type="text" class="form-control" name="stid" readonly value="<?php echo $std['name'];?>"/> <?php "</div>";
                        echo "</div>";
                       
                        echo "<div class='form-gorup'>";
                        echo "<label>"."Qualification"."</label>";
                        echo "<div>"?> <input type="text" class="form-control" name="faqu" readonly value="<?php echo $std['qualification'];?>"/> <?php "</div>";
                        echo "</div>";

                        echo "<div class='form-gorup'>";
                        echo "<label>"."Domain"."</label>";
                        echo "<div>"?> <input type="text" name="fad" class="form-control" readonly value="<?php echo $std['domain'];?>"/> <?php "</div>";
                        echo "</div>";

                        echo "<div class='form-gorup'>";
                        echo "<label>"."Research"."</label>";
                        echo "<div>"?> <input type="text" name="far" class="form-control" readonly value="<?php echo $std['research'];?>"/> <?php "</div>";
                        echo "</div>";

                        echo "<div class='form-gorup'>";
                        echo "<label>"."Others"."</label>";
                        echo "<div>"?> <input type="text" name="fao" class="form-control" readonly value="<?php echo $std['others'];?>"/> <?php "</div>";
                        echo "</div>";
                        
                        echo "<div class='form-gorup mt-2'>";
                        echo "<div>"?> <input type="submit" class="btn btn-success" name="allocate" readonly value="Request For Allocate"/> <?php "</div> ";
                        echo "</div>";

                }
                
               
            }
    ?>
                
  

            </div>
        </form>
    
    </div>
    <hr>
    </body>
    <?php include '../footer.php'?>