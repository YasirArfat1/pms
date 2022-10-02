<?php
include 'header.php';

$errors = array( 'id'=>'','stname'=>'','stemail'=>'','stphone'=>'','stpass'=>'','styear'=>'','stream'=>'','msg'=>'');
include 'connection.php';
        if(isset($_POST['add']))
        {
            
            if(empty($_POST['id'])){
            $errors['id'] = 'Field is Required <br>';
            }
            else
            {

            $id = $_POST['id'];
            $sql_e = "SELECT * FROM student WHERE s_id='$id'";
            $res_e = mysqli_query($conn, $sql_e);
            if (mysqli_num_rows($res_e) > 0)
                {
                $errors['id'] = 'This Id  already exist <br>';
                }
            }
            
            if(empty($_POST['stname'])){
            $errors['stname'] = 'Name is Required <br>';
            }
            else
            {
                
                $name = $_POST['stname'];           
                if (!preg_match('/^[a-zA-Z ]*$/',$name))
                {
                $errors['stname'] = 'Only Characters Allowd <br>';
                }
            }
            
            if(empty($_POST['stemail'])){
            $errors['stemail'] = 'Field is Required <br>';
            }
            else
            {
            $email = $_POST['stemail'];
            $sql = "SELECT * from student where email='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              $errors['stemail'] = 'Email already exist <br>';
            } 
                else {
              
            }
                
            }
            
            if(empty($_POST['stphone'])){
            $errors['stphone'] = 'Field is Required <br>';
            }
            else
            {

            $phone = $_POST['stphone'];           
            if (!preg_match('/^(?:\d{2}([-.])\d{3}\1\d{3}\1\d{3}|\d{11})$/',$phone))
                {
                $errors['stphone'] = '11 Digits Number Only <br>';
                }
            }
            
            if(empty($_POST['stpass'])){
            $errors['stpass'] = 'Field is Required <br>';
            }
            else
            {

            $pass = $_POST['stpass'];           
            if (!preg_match('/^.{8,30}$/',$pass))
                {
                $errors['stpass'] = '8 to 30 Digits Number Only <br>';
                }
            }
            if(empty($_POST['styear'])){
            $errors['styear'] = 'Field is Required <br>';
            }
            
            
            if(array_filter($errors))
            {
                $errors['msg']= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                          <strong>Fail!</strong> Registration Failed.
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span >&times;</span>
                          </button>
                        </div>";;
            }
            else
            {
                $id=$_POST['id']; 
                $name=$_POST['stname'];
                $email=$_POST['stemail'];
                $phone=$_POST['stphone'];
                $pass=$_POST['stpass']; 
                $year=$_POST['styear'];
                $stream=$_POST['stream'];
                
                
                $sql = "INSERT INTO student (s_id, name, email, phone, password, year , stream)
                VALUES ('$id', '$name', '$email', '$phone', '$pass', '$year', '$stream')";

                if ($conn->query($sql) === TRUE) {
                    $errors['msg']= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
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
    
</head>




<body>
    <div class="container mt-2 mb-2">

        <h3 class="text-muted text-center">Add New Studet</h3>
        <section class="mt-2 mb-2 border rounded p-2">

            <form method="post">
                <div class="row">
                    <div class="col">
                        <?php echo $errors['msg']?>
                    </div>
                </div>
                <div class="row mb-2 mt-1">

                    <div class="col-md-3 col-sm-6">
                        <label for="Studet_Id"> ID</label>
                        <input type="text" class="form-control" id="Studet_Id" placeholder="Enter Studet Id" name="id">
                        <label class="text-danger "><?php echo $errors['id'] ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="Studet_name">Name </label>
                        <input type="text" class="form-control" id="Studet_name" placeholder="Enter Studet Name" name="stname">
                        <label class="text-danger "><?php echo $errors['stname'] ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="Studet_email">Email </label>
                        <input type="email" class="form-control" id="Studet_email" placeholder="Enter Studet Email" name="stemail">
                        <label class="text-danger "><?php echo $errors['stemail'] ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="Studet_phone">Phone </label>
                        <input type="text" class="form-control" id="Studet_phone" placeholder="Enter Studet Phone" name="stphone">
                        <label class="text-danger "><?php echo $errors['stphone'] ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <label for="Studet_pass">Password </label>
                        <input type="password" class="form-control" id="Studet_pass" placeholder="Enter Studet Password" name="stpass">
                        <label class="text-danger "><?php echo $errors['stpass'] ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="Studet_year">Year </label>
                        <input type="text" class="form-control" id="Studet_year" placeholder="Enter Studet Year" name="styear">
                        <label class="text-danger "><?php echo $errors['styear'] ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label for="Studet_stream">Stream </label>
                        <select name="stream" id="Studet_stream" class="form-control">
                            <option value="Selcet">Select</option>
                            <option value="CSE">BSCS</option>
                            <option value="COM">BSIT</option>
                            <option value="EE">MCS</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <label for=""></label>

                        <input type="submit" name="add" class="btn mt-2 btn-primary w-100"  value="Add" id="bt" />
                    </div>
                    <div class="col-md-1 col-sm-6">
                        <label for=""></label>

                        <input type="reset"  class="btn btn-danger mt-2 w-100"   id="bt" value="reset" />
                    </div>
                </div>
            </form>
        </section>


        <hr>

        <h3 class="text-center bg-dark border rounded text-info">All Students</h3>


        <?php
                    require '../connection.php';
                    $sql = "SELECT * FROM Student";
                    $result = $conn->query($sql); 
                ?>
        <table border="0" class="table table-hover table-responsive" align="center" id="myTable">
            <tr>
                <th>S.No</th>
                <th>S.id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Year</th>
                <th>Stream</th>
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
                    <td><?php echo $row["s_id"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["phone"] ?></td>
                    <td><?php echo $row["password"] ?></td>
                    <td><?php echo $row["year"] ?></td>
                    <td><?php echo $row["stream"] ?></td>
                    <td style="text-align: center; font-size: 20px;">
                        <a href="stsearch.php?s_id=<?php echo $row["s_id"]?>">
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
<?php
include '../footer.php';
?>
