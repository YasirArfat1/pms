<?php
include 'header.php';
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

if(isset($_POST['bppf'])){
if (isset($_FILES['ppf']))
{
    $file= $_FILES['ppf'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='../ppf/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include '../connection.php';
                    $sql = "UPDATE project SET ppf='$file_name' WHERE s_id='$user'";
                    mysqli_query($conn, $sql);
                    $conn->close();
                    header('Location:project.php'); 
                }
            }
        }
    }
}
}


    elseif(isset($_POST['bpsf']))
 {
if (isset($_FILES['psf']))
{
    $file= $_FILES['psf'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='../psf/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include '../connection.php';
                    $sql = "UPDATE project SET psf='$file_name' WHERE s_id='$user'";
                    mysqli_query($conn, $sql);
                    $conn->close();
                    header('Location:project.php'); 
                }
            }
        }
    }
}
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <title>Project Management System</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mb-3 mt-4">
                <form method="post" action="project.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <h5 class="card-header">Project Proposal</h5>
                                <div class="card-body">
                                    <p class="card-text">Upload Your Projec Proposal Here.</p>
                                    <input type="file" class="btn btn-link" value="click to Uplaod File" name="ppf" /><br /><br />
                                    <input type="submit" class="btn btn-dark" name="bppf" value="upload" />

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <h5 class="card-header">Project Specification</h5>
                                <div class="card-body">
                                   <p class="card-text">Upload Your Projec Specification Here.</p>
                                    <input type="file" name="psf" class="btn btn link" value="clcik to uplaod file" /><br /><br /><input type="submit" name="bpsf" value="upload" class="btn btn-info" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        
        <hr>
        
        <div class="row">
            <form method="post" action="project.php">
               <div class="form-group">
                    <input type="submit" name="feedback" value="Get Feedback" class="btn btn-success" />
                </div>
                <div class="form-group">
                    <?php
                    if(isset ($_POST['feedback']))
                    {
                    include '../connection.php';
                    $sql1="select * from project where s_id ='$user' ";
                    $rec=mysqli_query($conn, $sql1);

                    while($std=mysqli_fetch_assoc($rec))
                    {
                    ?>

                    <textarea class="form-control" name="feedback" rows="" cols="150" readonly="readonly" placeholder="FEEDBACK"><?php echo $std['remark'];?> </textarea>
                    <?php 
                    }
                }?>
                </div>
                
            </form>
        </div>
    </div>
    

</body>
</html>
<?php
include '../footer.php';
?>

