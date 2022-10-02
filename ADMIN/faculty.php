<?php
include 'header.php';
$errors = array( 'id'=>'','faname'=>'','faemail'=>'','faphone'=>'','fapass'=>'','faqulification'=>'','msg'=>'');
include 'connection.php';


        if(isset($_POST['add']))
        {
            
            
            
            if(empty($_POST['id'])){
            $errors['id'] = 'Field is Required <br>';
            }
            else
            {

            $id = $_POST['id'];
            $sql_e = "SELECT * FROM faculty WHERE f_id='$id'";
            $res_e = mysqli_query($conn, $sql_e);
            if (mysqli_num_rows($res_e) > 0)
                {
                $errors['id'] = 'This Id  already exist <br>';
                }
            }
            
            if(empty($_POST['faname'])){
            $errors['faname'] = 'Name is Required <br>';
            }
            
            if(empty($_POST['faemail'])){
            $errors['faemail'] = 'Field is Required <br>';
            }
            else
            {
            $email = $_POST['faemail'];
            $sql = "SELECT * from faculty where email='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              $errors['faemail'] = 'Email already exist <br>';
            } 
                else {
              
            }
            }
            
            if(empty($_POST['faphone'])){
            $errors['faphone'] = 'Field is Required <br>';
            }
            else
            {

            $phone = $_POST['faphone'];           
            if (!preg_match('/^(?:\d{2}([-.])\d{3}\1\d{3}\1\d{3}|\d{11})$/',$phone))
                {
                $errors['faphone'] = '11 Digits Number Only <br>';
                }
            }
            
            if(empty($_POST['fapass'])){
            $errors['fapass'] = 'Field is Required <br>';
            }
            else
            {

            $pass = $_POST['fapass'];           
            if (!preg_match('/^.{8,30}$/',$pass))
                {
                $errors['fapass'] = '8 to 30 Digits Number Only <br>';
                }
            }
            if(empty($_POST['faqulification'])){
            $errors['faqulification'] = 'Field is Required <br>';
            }
            
            
            if(array_filter($errors))
            {
                $errors['msg']= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                          <strong>Fail!</strong> Registration Failed.
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span >&times;</span>
                          </button>
                        </div>";;
            }
        else
        {
            
        
           $id=$_POST['id']; 
           $name=$_POST['faname'];
           $email=$_POST['faemail'];
           $phone=$_POST['faphone'];
           $pass=$_POST['fapass']; 
           $qualification=$_POST['faqulification'];
            
            $sql = "INSERT INTO faculty (f_id, name, email, phone, password, qualification ,domain,research,others )
                VALUES ('$id', '$name', '$email', '$phone', '$pass', '$qualification', '','','')";

                if ($conn->query($sql) === TRUE) {
                    $errors['msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                          <strong>Success!</strong> New Student added.
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span >&times;</span>
                          </button>
                        </div>";
                  
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
    }
           
          

?>

<head>

    <title>Project Management System</title>
    <link rel="stylesheet" href="../Datatables/css/jquery.dataTables.min.css">
    <script src="../Datatables/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <div class="container mt-2 mb-2">

        <h3 class="text-muted text-center">Add New Teacher</h3>
        <section class="mt-2 mb-2 border rounded p-2">
            <form method="post">
                <div class="row">
                    <div class="col">
                        <?php echo $errors['msg']?>
                    </div>
                </div>
                <div class="row mb-2 mt-1">

                    <div class="col-md-3 col-sm-6">
                        <label> ID</label>
                        <input type="text" class="form-control" placeholder="Enter faculty Id" name="id">
                        <label class="text-danger "><?php echo $errors['id'] ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label> Name</label>
                        <input type="text" class="form-control" placeholder="Enter faculty Name" name="faname">
                        <label class="text-danger "><?php echo $errors['faname'] ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label> Email</label>
                        <input type="email" class="form-control" placeholder="Enter faculty Email" name="faemail">
                        <label class="text-danger "><?php echo $errors['faemail'] ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label> Phone</label>
                        <input type="text" class="form-control" placeholder="Enter faculty Phone" name="faphone">
                        <label class="text-danger "><?php echo $errors['faphone'] ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <label> Password</label>
                        <input type="password" class="form-control" placeholder="Enter faculty Password" name="fapass">
                        <label class="text-danger "><?php echo $errors['fapass'] ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label> Qualifiction</label>
                        <input type="text" class="form-control" placeholder="Enter faculty Qualification" name="faqulification">
                        <label class="text-danger "><?php echo $errors['faqulification'] ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for=""></label>
                        <input type="submit" class="btn btn-success w-100 mt-2" name="add" value="Add" id="bt" />
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for=""></label>
                        <input type="reset" class="btn btn-danger w-100 mt-2" name="add" value="Add" id="bt" />
                    </div>
                </div>
            </form>
        </section>

        <hr>

        <h3 class="text-center bg-info border rounded text-light">All Faculty Members</h3>


        <?php
                    require '../connection.php';
                    $sql = "SELECT * FROM faculty";
                    $result = $conn->query($sql); 
                ?>
        <table border="0" class="table table-hover table-responsive" align="center" id="myTable">
            <tr>
                <th>S.No</th>
                <th>F.id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Qualification</th>
                <th>Actions</th>
            </tr>
            <tbody>
                <?php
                $i=1;
                while ($row = $result->fetch_assoc()) 
                {
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["f_id"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["phone"] ?></td>
                    <td><?php echo $row["password"] ?></td>
                    <td><?php echo $row["qualification"] ?></td>

                    <td style="text-align: center; font-size: 20px;">
                        <a href="fa_search.php?f_id=<?php echo $row["f_id"]?>">
                            <i class="fas fa-edit text-info" aria-hidden="true" id="" style="color: black"></i>
                        </a>

                </tr>
                <?php      
                  }
                ?>
            </tbody>
        </table>

    </div>
</body>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

</script>
<?php
include '../footer.php';
?>
