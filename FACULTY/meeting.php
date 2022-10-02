<?php
include 'header.php';
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';
        if(isset($_POST['submit']))
        {
           $sid=$_POST['sid']; 
           $fid=$_POST['fid'];
           $date=$_POST['dat'];
           $time=$_POST['tem'];
           $dec=$_POST['des']; 
           
           
          if (!empty($date)||!empty($time)||!empty($dec))
           {
              
            $sql= "INSERT INTO `pmas`.`meeting` (`meeting_id`, `f_id`, `s_id`, `date`, `time`, `desc`) VALUES ('', '$fid', '$sid', '$date', '$time', '$dec');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:meeting.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:meeting.php');
        }       
                  
        }


?>

<head>
  
<title>Project Management System</title>
</head>

<body>
   
   <div class="container">
       <div class="h1 text-center mt-1 mb-2 text-muted">Schedule Meeting</div>
       <hr>
       
       <div class="row">
          
           <div class="col-md-6 mx-auto shadow mt-4 mb-4">
              <form method="post" action="meeting.php">
               <div class="form-group">
                   <div class="row">
                   <div class="col">
                       <h3 class="text-center text-uppercase">Meeting Details</h3>
                   </div>
                   </div>
               </div>
               <div class="form-group">
                   <div class="row">
                       <div class="col-md-4">
                           <label for="">Faculty ID :</label>
                       </div>
                       <div class="col-md-8">
                           <input id="in" type="text" class="form-control" name="fid" value="<?php echo $user;?>" readonly/>
                       </div>
                   </div>
               </div>
               <div class="form-group">
                   <div class="row">
                       <div class="col-md-4">
                           <label for="">Student ID :</label>
                       </div>
                       <div class="col-md-8">
                            <?php
                            include '../connection.php';
                            $sql="select s_id from project where f_id='$user';";
                            $result=  mysqli_query($conn, $sql)
                            ?> <select name="sid"  class="form-control">
                            <option selected>Supervisory</option>
                            <?php
                            while($row = mysqli_fetch_assoc($result))
                            {
                            $category= $row['s_id'];
                            ?>
                            <option selected="selected" value="<?php echo $category; ?>"><?php echo $category;?></option>
                            <?php
                            }
                            ?>
                            </select>
                       </div>
                   </div>
               </div>
               <div class="form-group">
                   <div class="row">
                       <div class="col-md-4">
                           <label for="">Date :</label>
                       </div>
                       <div class="col-md-8">
                           <input id="in" type="date"  name="dat"/>
                       </div>
                   </div>
               </div>
               <div class="form-group">
                   <div class="row">
                       <div class="col-md-4">
                           <label for="">Time :</label>
                       </div>
                       <div class="col-md-8">
                           <input id="in" type="time"  name="tem" />
                       </div>
                   </div>
               </div>
               <div class="form-group">
                   <div class="row">
                       <div class="col-md-4">
                           <label for="">Description  :</label>
                       </div>
                       <div class="col-md-8">
                           <textarea id="in" name="des" class="form-control" cols="22" rows="5"></textarea>
                       </div>
                   </div>
               </div>
               
               <div class="form-group">
                   <div class="row">
                       <div class="col-md-12">
                           <input class="btn btn-primary w-100" type="submit" name="submit" value="Submit" />
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