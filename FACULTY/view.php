<?php

include 'header.php';
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';


if (isset($_POST['ppf']))
{
    $file=$_POST['file_name'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('ppf/'.$file);
    exit();}
 else {
    echo 'no file';
    }
}
elseif (isset($_POST['psf']))
{
    $file=$_POST['file_name1'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('psf/'.$file);
    exit();}
 else {
    
}
}
                    elseif (isset($_POST['assess']))
                {
                $feed=$_POST['assessmen'];
                $prid=$_POST['pid'];
                if(!empty($feed))
                {
                $sql2= "UPDATE `pmas`.`project` SET `remark` = '$feed' WHERE `project`.`p_id` = '$prid';";
                mysqli_query($conn, $sql2);
                $conn->close();
                header('Location:view.php');
                }
                else 
                {
                      header('Location:view.php');
                      
                }
                }
                elseif (isset($_POST['rem']))
                {
                $re=$_POST['remainder'];
                $stuid=$_POST['stid'];
                //$stuid;
                $sql3= "INSERT INTO `pmas`.`mail` (`mail_id`, `s_id`, `f_id`, `msg`) VALUES ('', '$stuid', '$user', '$re');";
                mysqli_query($conn, $sql3);
                $conn->close();
                header('Location:view.php');
                } 
                

 
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>


</head>

<body>


    <div class="container mb-2 mt-2 ">
        <div class="row">
            <div class="col-md-6 shadow mx-auto">
                <form method="post" action="view.php">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center text-success font-weight-bold">Select Supervsiory
                                </h1>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                include '../connection.php';
                                $sql="select project.s_id, student.* from project inner join student on student.s_id=project.s_id where project.f_id='$user'  ;";
                                $result=  mysqli_query($conn, $sql)
                                ?> <select name="student" class="form-control">
                                    <option selected="selected">Supervisory</option>
                                    <?php
                                while($row = mysqli_fetch_assoc($result))
                                {
                                $category= $row['s_id'];
                                $name = $row['name'];
                                $stream = $row['stream'];
                                ?>
                                    <option value="<?php echo $category; ?>"><?php echo $category." ,".$name." , ".$stream;?></option>
                                    <?php
                                }
                            ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input class="btn btn-info w-100" type="submit" name="asses" value="Feedback" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="row">
            <form method="post" action="view.php">
                <table class="table table-responsive ">
                    <?php
            if (isset($_POST['asses']))
            {   
                $stuid=$_POST['student'];          
                echo "<t>";?>

                    <th>Student ID</th>
                    <th>Project Proposal</th>
                    <th>Project Specification</th>
                    <th>Assessment</th>
                    <th>Quick Mail</th>

                    <?php
                echo "</tr>";
                echo "<tr>";
                
                echo "<td>"?> <p class="font-weight-bold"><?php echo $stuid;?></p> <?php "</td>";
                
                $sql1="select * from project where s_id ='$stuid' ";
                $rec=mysqli_query($conn, $sql1);
                
                while ($std=mysqli_fetch_assoc($rec))
                {
                    echo "<td>"?> <input name="file_name" class="btn btn-link" value="<?php echo $std["ppf"]?>" type="text" readonly /><br/><br/>
                    <input type="submit" value="Download" class="btn btn-dark" name="ppf"/> <input type="hidden" name="pid" value="<?php echo $std['p_id']?>"/> <?php "</td>";
                    
                echo "<td>"?><input name="file_name1" class="btn btn-link" value="<?php echo $std["psf"]?>" type="text" readonly /><br/><br/>
                    <input type="submit" value="Download" class="btn btn-dark" name="psf"/> <?php "</td>";
                    
                    echo "<td>"?><textarea class="form-control"  name="assessmen" cols="30" rows="5" ></textarea><br/><br/>
                    <input type="submit" value="Submit" class="btn btn-info" name="assess"/> <?php "</td>";
                  
                    echo "<td>"?><textarea class="form-control" name="remainder"  cols="30" rows="5" ></textarea><br/><br/>
                    <input type="submit" value="Submit" class="btn btn-info" name="rem"/> <?php "</td>";
                    
                    echo "</tr>";
                
                   
            }
            }
    ?>
                </table>

            </form>
        </div>
    </div>
</body>

</html>
<?php
include '../footer.php'
?>
