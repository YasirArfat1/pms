<?php

include 'header.php';


include '../connection.php';

if(isset($_POST['update']))
{
           $id=$_POST['fid']; 
           $name=$_POST['faname'];
           $email=$_POST['faemail'];
           $phone=$_POST['faphone'];
           $pass=$_POST['fapass']; 
           $qualification=$_POST['faqualification'];
           
           if (!empty($id)|| !empty($name)||!empty($email)||!empty($phone)||!empty($pass)||!empty($qualification))
           {
              
            $sql= "UPDATE `pmas`.`faculty` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$pass', `qualification` = '$qualification' WHERE `faculty`.`f_id` = '$id';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:faculty.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:fa_search.php');
        }  
}
?>




<head>

    <title>Project Management System</title>
</head>

<body>

    <div class="container">
        <div class="row mt-2 mb-2">
            <div class="col-md-6 mx-auto shadow">
                <form method="post" action="fa_search.php">
                    

                    

                
                    

                <?php
               
                            require '../connection.php';
                            $ID = $_GET["f_id"];
                            $sql1="select * from faculty where f_id ='$ID '; ";
                            $rec=mysqli_query($conn, $sql1);
                            $row=mysqli_fetch_assoc($rec);
               
               ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Faculty ID</label>
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="text" name="fid" value="<?php echo $row['f_id'];?>" /> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Faculty Name</label>
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="text" name="faname" value="<?php echo $row['name'];?>" />
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Faculty Email</label>
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="email" name="faemail" value="<?php echo $row['email'];?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for=""> Phone </label>
                            </div>
                            <div class="col-md-8">
                                 <input id="in" class="form-control" type="text" name="faphone" value="<?php echo $row['phone'];?>" />

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for=""> Password </label>
                            </div>
                            <div class="col-md-8">
                                 <input id="in" class="form-control" type="password" name="fapass" value="<?php echo $row['password'];?>" />

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for=""> Qualification </label>
                            </div>
                            <div class="col-md-8">
                                 <input id="in" type="text" class="form-control" name="faqualification" value="<?php echo $row['qualification'];?>" />

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                 <input type="submit" class="btn btn-info w-100" name="update" value="Update" id="bt" />
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
