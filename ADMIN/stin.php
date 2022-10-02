<?php
session_start();
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
            
            if(empty($_POST['stemail'])){
            $errors['stemail'] = 'Field is Required <br>';
            }
            else
            {
            $email = $_POST['stemail'];
            $sql_e = "SELECT * FROM student WHERE email='$email";
            $res_e = mysqli_query($conn, $sql_e);
            if (mysqli_num_rows($res_e) > 0)
                {
                $errors['stemail'] = 'This email  already exist <br>';
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
                $errors['msg']= "<div class='alert alert-danger' role='alert'>
                          there ere Errors
                        </div>";
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
                
                $sql= "INSERT INTO student (`s_id`, `name`, `email`, `phone`, `password`, `year`, `stream`) VALUES ('$id', '$name', '$email', '$phone', '$pass', '$year', '$stream');";
                mysqli_query($conn, $sql);
                if ($conn->query($sql) === TRUE) 
                {
                    $_SESSION['status']= "New Student Registered Successfully";
                    header("location: student.php");    
                } 
                else 
                {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
                 
               
                
            }
                  
        }
?>