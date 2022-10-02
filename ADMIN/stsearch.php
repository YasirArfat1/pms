<?php
include 'header.php';
include '../connection.php';
if(isset($_POST['update']))
{
    
    
           $id=$_POST['sid']; 
           $name=$_POST['stname'];
           $email=$_POST['stemail'];
           $phone=$_POST['stphone'];
           $pass=$_POST['stpass']; 
           $year=$_POST['styear'];
           $stream=$_POST['stream'];
           
           if (!empty($id)|| !empty($name)||!empty($email)||!empty($phone)||!empty($pass)||!empty($year)||$stream!="Select")
           {
              
            $sql= "UPDATE `pmas`.`student` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$pass', `year` = '$year', `stream` = '$stream' WHERE `student`.`s_id` = '$id';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:student.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:stsearch.php');
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

                <form method="post" action="stsearch.php">

                    <h3 class="text-center text-primary font-weight-bold mt-1 text-uppercase">Update Student</h3>
                    <hr>
                    <?php
                            require '../connection.php';
                            $ID = $_GET["s_id"];
                            
                            $sql1="select * from student where s_id ='$ID'; ";
                            $rec=mysqli_query($conn, $sql1);
                            $row=mysqli_fetch_assoc($rec);
                        
                    ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Student ID</label>
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="text" name="sid" value="<?php echo $row['s_id'];?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Student Name</label>
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="text" name="stname" value="<?php echo $row['name'];?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Student Email</label>
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="text" name="stemail" value="<?php echo $row['email'];?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Student Phone</label>
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="text" name="stphone" value="<?php echo $row['phone'];?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Student Password</label>
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="password" name="stpass" value="<?php echo $row['password'];?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Student Year</label>
                            </div>
                            <div class="col-md-8">
                                <input id="in" class="form-control" type="text" name="styear" value="<?php echo $row['year'];?>" />

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Student stream</label>
                            </div>
                            <div class="col-md-8">
                                <select name="stream" class="form-control">
                                    <option value="Selcet">Select</option>
                                    <option value="BSCS" <?php if($row['stream']=='BSCS') echo 'selected="selected"'; ?>>BSCS</option>
                                    <option value="BSIT" <?php if($row['stream']=='BSIT') echo 'selected="selected"'; ?>>BSIT</option>
                                    <option value="MCS" <?php if($row['stream']=='MCS') echo 'selected="selected"'; ?>>MCS</option>
                                </select>

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
