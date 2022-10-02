<?php
include 'header.php';
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';


if (isset($_POST['submit']))
{
            $to=$_POST['student']; 
           $msg=$_POST['msg'];
           
           
          if (!empty($to))
           {
              
            $sql= "INSERT INTO `pmas`.`mail` (`mail_id`, `s_id`, `f_id`, `msg`) VALUES ('', '$to', '$user', '$msg');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:mail.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:mail.php');
        }       
}



?>




<html xmlns="http://www.w3.org/1999/xhtml">

<div>

    <body>


        <div class="container mv-2 mt-2">
            <form method="post" action="mail.php">
                <div class="row">
                    <div class="col-md-4">
                        <input class="btn btn-primary w-100" type="submit" value="Compose" name="compose" />
                    </div>
                    <div class="col-md-4">
                        <input class="btn btn-success w-100" type="submit" value="Inbox" name="inbox" />
                    </div>
                    <div class="col-md-4">
                        <input class="btn btn-dark w-100" type="submit" value="Sent Mail" name="sent" />
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mx-auto shadow rounded mt-2 mb-2">
                        <?php

                        if (isset($_POST['compose']))
                        {
                        $sql1="select * from project where s_id ='$user' ";
                        $rec=mysqli_query($conn, $sql1);
                        $std=mysqli_fetch_assoc($rec);
                    ?>
                        <div class="form-group">
                            <label for="">Mail To : </label>
                            <?php
                            include '../connection.php';
                            $sql="select s_id from project where f_id='$user';";
                            $result=  mysqli_query($conn, $sql)
                            ?>
                            <select name="student" class="form-control">
                                <option>Choose From Supervisory</option>
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
                        <div class="form-group">
                            <label for="">From : </label>
                            <input class="form-control" type="text" value="<?php echo $user;?>">
                        </div>
                        <div class="form-group">
                            <label for="">Message : </label>
                            <textarea name="msg" cols="35" rows="5" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input id="bt" class="btn btn-success w-100" type="submit" value="Send" name="submit" />
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="">
                        <?php
                }
                elseif (isset($_POST['inbox'])) 
                    {
                        ?>

                        <table class="table table-hover w-100">

                            <?php
                                            echo "<br/>";
                                            echo "<br/>";
                                            echo "<br/>";
                       echo "<tr>";
                    echo "<th>"."FROM"."</th>";
                    echo "<th>" ?> &nbsp; <?php "</th>";
                    echo "<th>"."MESSAGE"."</th>";
                    echo "</tr>";
                        $sql1="select * from st_mail where f_id ='$user'";
                        $rec=mysqli_query($conn, $sql1);
                        
                        echo "<tr>";
                        while ($std= mysqli_fetch_assoc($rec))
                        {
                           if ($std['from']="supervisor")
                            {
                               ?> <tr bgcolor="beige" align="center"><?php
                            //echo "<tr>";
                            echo "<td>".$std['s_id']."<td/>";
                            echo "<td>".$std['mag']."<td/>"; 
                            ?> </tr> <?php 
                            //echo "<tr/>";
                            }
                        }
                        
                        ?> </table>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-md-12">
                        <?php
                         
                    }
                    
                    elseif (isset($_POST['sent'])) 
                    {
                        ?> <table class="table table-hover w-100">

                            <?php
                    
                                            echo "<br/>";
                                            echo "<br/>";
                                            echo "<br/>";
                                            echo "<tr>";
                    echo "<th>"."TO"."</th>";
                    echo "<th>" ?> &nbsp; <?php "</th>";
                    echo "<th>"."MESSAGE"."</th>";
                    echo "</>";
                        $sql1="select * from mail where f_id ='$user' ";
                        $rec=mysqli_query($conn, $sql1);
                        
                        echo "<tr>";
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['s_id']."<td/>";
                            echo "<td>".$std['msg']."<td/>"; 
                            ?> </tr> <?php 
                        }
                        ?> </table> <?php
                         
                    }
        
                
                ?>
                    </div>
                </div>
            </form>
        </div>
    </body>
    <?php
    include '../footer.php';
    ?>
