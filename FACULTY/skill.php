<?php
include 'header.php';


include '../connection.php';
if(isset($_POST['update']))
{
           $domain=$_POST['domain'];
           $research=$_POST['research']; 
           $others=$_POST['others'];
           
           if (!empty($domain)|| !empty($research)||!empty($others))
           {
              
            $sql= "UPDATE `pmas`.`faculty` SET `domain` = '$domain', `research` = '$research', `others` = '$others' WHERE `faculty`.`f_id` = '$user';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:skill.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:skill.php');
        }  
}

?>


<head>
<title>Project Management System</title>


<title>Project Management System</title>
</head>
<body>
    
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-6 mx-auto shadow rounded">
               <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-muted mt-2 text-center text-uppercase">Faculty Skills Set Form</h3>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Domain :</label>
                        </div>
                        <div class="col-md-8">
                            <input id="in" type="text" class="form-control" name="domain"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                   <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Research :</label>
                        </div>
                        <div class="col-md-8">
                            <input id="in" type="text" class="form-control" name="research"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Other Skill (s) if any  :</label>
                        </div>
                        <div class="col-md-8">
                            <input id="in" type="text" class="form-control" name="others"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <input id="bt" class="btn btn-primary w-100" type="submit" name="update" value="Update" />
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</body>
<?php include '../footer.php'?>    