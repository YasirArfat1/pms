<?php
include 'header.php';


include '../connection.php';

$errors = array('sid'=>'', 'fid'=>'', 'proid'=>'','proname'=>'','message'=>'');
if(isset($_POST['allocate']))
{
           $sid=$_POST['sid']; 
           $fid=$_POST['faid'];
           $proname=$_POST['projetcname'];
           $proid=$_POST['projectid'];

        
                      
            if(empty($_POST['sid']))
            {
                $errors['sid'] = 'Student id is required is Required <br>';
            }
            else if(!empty($_POST['sid']))
            {
                $sid = $_POST['sid'];
                $sql_e = "SELECT * FROM project WHERE s_id='$sid'";
                $res_e = mysqli_query($conn, $sql_e);
                if (mysqli_num_rows($res_e) > 0)
                {
                    $errors['sid'] = 'The student is already aassined with a supervsior <br>';
                }
            }
            if(empty($_POST['faid']))
            {
                $errors['fid'] = 'Filed is required <br>';
            }
            if(empty($_POST['projetcname']))
            {
                $errors['proname'] = 'Project name is Required <br>';
            }
            else if(!empty($_POST['projetcname']))
            {
                $proname = $_POST['projetcname'];
                $sql_e = "SELECT * FROM project WHERE name='$proname'";
                $res_e = mysqli_query($conn, $sql_e);
                if (mysqli_num_rows($res_e) > 0)
                {
                    $errors['proname'] = 'This Project is already Assigned <br>';
                }
            }
            if(empty($_POST['projectid']))
            {
                $errors['proid'] = 'Project id is Required <br>';
            }
            else if(!empty($_POST['projectid']))
            {
                $proid = $_POST['projectid'];
                $sql_e = "SELECT * FROM project WHERE p_id='$proid'";
                $res_e = mysqli_query($conn, $sql_e);
                if (mysqli_num_rows($res_e) > 0)
                {
                    $errors['proid'] = 'Please select different project id <br>';
                }
            }

            if(array_filter($errors))
            {
                $errors['message'] = "<div class='alert alert-danger'>Failed</div>";

            }
              
            else
            {
                $sql= "INSERT INTO `pmas`.`project` (`p_id`, `name`, `domain`, `s_id`, `f_id`, `ppf`, `psf`, `remark`) VALUES ('$proid', '$proname', '', '$sid', '$fid', '', '', '');";
                mysqli_query($conn, $sql);
                $conn->close();
                $errors['message'] = "<div class='alert alert-success'>Project is Assigned Succesfuly</div>";
            }
           
         
}


?>

<head>
 
<title>Project Management System</title>
</head>

<body>

    <div class="container mb-2 mt-2">
        <div class="row">
            <div class="col-md-6 mx-auto shadow">
                <form method="post" action="allocate.php">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Student Details
                            </div>
                            <div class="col-md-8">
                                <?php
                                include '../connection.php';
                                $sql="select * from student";
                                $result=  mysqli_query($conn, $sql)
                                ?> <select name="id" class="form-control">
                                <option >Student</option>
                                <?php
                                while($row = mysqli_fetch_assoc($result))
                                {
                                $category= $row['s_id'];
                                $name= $row['name'];
                                $pro= $row['stream'];
                                
                                ?>
                                <option selected="selected" value="<?php echo $category; ?>"><?php echo $category." , ".$name." , ".$pro;?></option>
                                <?php
                                }
                                ?>
                                </select> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                   if (isset($_POST['chk']))
                                   {
                                                $sid=$_POST['id'];
                                                $sql1="select * from request where s_id ='$sid'; ";
                                                $rec=mysqli_query($conn, $sql1);
                                                $row=mysqli_fetch_assoc($rec);
                                   }
                                   ?>

                                <input type="submit" class="btn btn-dark" name="chk" value="Check For Request" /> 
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                            <span class="text-danger"><?php echo $errors['message']?></span>
                    </div>
                    <div class="form-group">
                        
                        <div class="row">
                            <div class="col-md-4">
                                Student ID
                            </div>
                            <div class="col-md-8">
                                <input  id="in" class="form-control" type="text" name="sid" value="<?php echo $row['s_id'];?>">
                                <span class="text-danger"><?php echo $errors['sid']?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Faculty ID
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="text" name="faid" value="<?php echo $row['f_id'];?>">
                                <span class="text-danger"><?php echo $errors['fid']?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Project Name
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="text" name="projetcname" value=""/>
                                <span class="text-danger"><?php echo $errors['proname']?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Project ID
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="text" name="projectid" value=""/>
                                <span class="text-danger"><?php echo $errors['proid']?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input id="bt" class="btn btn-primary w-100" type="submit" name="allocate" value="Allocate" />   
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="allprojects.php">Click here to see All projects</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
include '../footer.php';
?>