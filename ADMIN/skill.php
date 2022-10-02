<?php
include 'header.php';
include '../connection.php';
 
   if (isset($_POST['view']))
       {
                    $username=$_POST['id'];
                    $sql1="select * from faculty where f_id ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    $row=mysqli_fetch_assoc($rec);
       }


?>

<head>

    <title>Project Management System</title>
</head>

<body>
    <div class="container mb-2 mt-2">
        <div class="row">
            <div class="col-md-6 shadow mx-auto">
                <form method="post" action="skill.php">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Faculty ID
                            </div>
                            <div class="col-md-6">
                                <?php
                                    include '../connection.php';
                                    $sql="select f_id from faculty";
                                    $result=  mysqli_query($conn, $sql)
                                    ?> <select name="id" class="form-control" >
                                    <option selected="selected">Faculty</option>
                                    <?php
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                    $category= $row['f_id'];
                                    ?>
                                    <option value="<?php echo $category; ?>"><?php echo $category;?></option>
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
                                <input type="submit"  class="btn btn-info " id="bt" name="view" value="View" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Faculty ID
                            </div>
                            <div class="col-md-8">
                                <?php
                                    if (isset($_POST['view']))
                                    {
                                            $username=$_POST['id'];
                                            $sql1="select * from faculty where f_id ='$username'; ";
                                            $rec=mysqli_query($conn, $sql1);
                                            $row=mysqli_fetch_assoc($rec);
                                    }
                                    ?>
                                <input id="in" type="text" class="form-control" readonly name="faid" value="<?php echo $row['f_id'];?>" />

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Name
                            </div>
                            <div class="col-md-8">
                                <input id="in" type="text" class="form-control" readonly name="faname" value="<?php echo $row['name'];?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Qualification
                            </div>
                            <div class="col-md-8">

                                <input id="in" type="text" class="form-control" readonly name="faqualification" value="<?php echo $row['qualification'];?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Domain
                            </div>
                            <div class="col-md-8">

                                <input id="in" type="text" class="form-control" readonly name="fadomain" value="<?php echo $row['domain'];?>" />

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Research
                            </div>
                            <div class="col-md-8">

                                <input id="in" type="text" class="form-control" readonly name="faresearch" value="<?php echo $row['research'];?>" />

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                Others
                            </div>
                            <div class="col-md-8">
                                <input id="in" type="text" class="form-control" readonly name="faothers" value="<?php echo $row['others'];?>" />
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>
<?php
include '../footer.php'
?>
