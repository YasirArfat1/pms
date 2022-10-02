 <?php
session_start();


$errors = array('id'=>'', 'pass'=>'', 'role'=>'','msg'=>'');

if (isset($_POST['add'])) 
{

    if(empty($_POST['id'])){
        $errors['id'] = 'Id is Required <br>';
    }
    
    if(empty($_POST['pass'])){
        $errors['pass'] = 'Password is Required <br>';
    }
    
    
    if(array_filter($errors))
    {
        
    }
    else
    {
        $user = $_POST['id'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];

        include 'connection.php';

        if($role == "Admin")
        {   
            
            $sql = "SELECT * FROM admin WHERE ID='$user' AND password='$pass'";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);

            if($count == 0)
            {
               $errors['msg']="<div class='alert alert-danger'>wrong Email or Password </div>";
            }
            else
            {
                $_SESSION['Email'] = $user;
                $_SESSION['Role'] = $role;
                
                header("location:Admin/index.php");
            }

            
        }
        else if($role == "Faculty")
        {

                $sql = "SELECT * FROM faculty WHERE f_id='$user' AND password='$pass'";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                $row = $res->fetch_assoc();

                    if($count == 0)
                    {
                        $errors['msg']="<div class='alert alert-danger'>wrong Email or Password </div>";
                    }
                    else
                    {
                        $_SESSION['Email'] = $user;
                        $_SESSION['Role'] = $role;
                        $_SESSION["name"] = $row["name"];
                        header("location: FACULTY/index.php");
                    }
        }
        else
        {

                $sql = "SELECT * FROM student WHERE s_id='$user' AND password='$pass'";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                $row = $res->fetch_assoc();

                if($count == 0)
                {
                $errors['msg']="<div class='alert alert-danger'>wrong Email or Password </div>";
                }
                else
                {
                    $_SESSION['Email'] = $user;
                    $_SESSION['Role'] = $role;
                    $_SESSION["name"] = $row["name"];
                    header("location: STUDENT/index.php");
                }        
        }
    }

}
?>
 <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">

 <link rel="stylesheet" href="fontawesome/css/all.css">

 <script type="text/javascript" src="Bootstrap/js/jquery-3.3.1.slim.min.js"></script>
 <script type="text/javascript" src="Bootstrap/js/popper.min.js"></script>
 <script type="text/javascript" src="Bootstrap/js/bootstrap.min.js"></script>


 <head>

     <title>Project Management System</title>
     <style>
         .login-block {
             background: #DE6262;
             background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);
             background: linear-gradient(to bottom, #FFB88C, #DE6262);
             float: left;
             width: 100%;
             padding: 10px 0px 50px 0px ;
         }

         .banner-sec {
             min-height: 500px;
             border-radius: 0 10px 10px 0;
             padding: 0;
         }

         .container {
             background: #fff;
             border-radius: 10px;
             box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
         }

         .carousel-inner {
             border-radius: 0 10px 10px 0;
         }

         .carousel-caption {
             text-align: left;
             left: 5%;
         }

         .login-sec {
             padding: 50px 30px;
             position: relative;
         }

         .login-sec .copy-text {
             position: absolute;
             width: 80%;
             bottom: 20px;
             font-size: 13px;
             text-align: center;
         }

         .login-sec .copy-text i {
             color: #FEB58A;
         }

         .login-sec .copy-text a {
             color: #E36262;
         }

         .login-sec h2 {
             margin-bottom: 30px;
             font-weight: 800;
             font-size: 30px;
             color: #DE6262;
         }

         .login-sec h2:after {
             content: " ";
             width: 100px;
             height: 5px;
             background: #FEB58A;
             display: block;
             margin-top: 20px;
             border-radius: 3px;
             margin-left: auto;
             margin-right: auto
         }

         .btn-login {
             background: #DE6262;
             color: #fff;
             font-weight: 600;
         }

         .banner-text {
             width: 70%;
             position: absolute;
             bottom: 40px;
             padding-left: 20px;
         }

         .banner-text h2 {
             color: #fff;
             font-weight: 600;
         }

         .banner-text h2:after {
             content: " ";
             width: 100px;
             height: 5px;
             background: #FFF;
             display: block;
             margin-top: 20px;
             border-radius: 3px;
         }

         .banner-text p {
             color: #fff;
         }

     </style>
 </head>

 <body>
     <section class="login-block">
            <h3 class="text-muted text-center text-uppercase font-weight-bold">Welcome to Final Year Projects Management System</h3>
       
        <hr>
         <div class="container">
             <div class="row">
                 <div class="col-md-4 login-sec">
                     <h2 class="text-center">Login Now</h2>
                     <form class="login-form" method="post">
                         <div class="form-group">
                             <?php echo $errors['msg']?>
                         </div>
                         <div class="form-group">
                             <label for="exampleInputEmail1" class="text-uppercase">Login id</label>
                             <input type="text" class="form-control" name="id" placeholder="Enter Login Id ">
                             <span class="Text-danger"><?php echo $errors['id']?></span>

                         </div>
                         <div class="form-group">
                             <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                             <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                             <span class="Text-danger"><?php echo $errors['pass']?></span>
                         </div>

                         <div class="form-group">
                             <label for="inputEmail4" class="text-uppercase">login As</label>
                             <select name="role" class="form-control">
                                 <option value="Student">Student</option>
                                 <option value="Faculty">Faculty</option>
                                 <option value="Admin">Admin</option>

                             </select>
                         </div>


                         <div class="form-check">
                             <label class="form-check-label">
                                 <input type="checkbox" class="form-check-input">
                                 <small>Remember Me</small>
                             </label>
                             <button type="submit" name="add" class="btn btn-login float-right">Submit</button>
                         </div>

                     </form>
                     <div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="#">MCS 4 Group</a></div>
                 </div>
                 <div class="col-md-8 banner-sec">
                     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                         <ol class="carousel-indicators">
                             <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                             <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                             <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                         </ol>
                         <div class="carousel-inner" role="listbox">
                             <div class="carousel-item active">
                                 <img class="d-block img-fluid" src="images/Slider%201.jpg">
                                 <div class="carousel-caption d-none d-md-block">
                                     <div class="banner-text">
                                         <h2>Final Year Projecs</h2>
                                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                     </div>
                                 </div>
                             </div>
                             <div class="carousel-item">
                                 <img class="d-block img-fluid" src="images/Slider2.jpg">
                                 <div class="carousel-caption d-none d-md-block">
                                     <div class="banner-text">
                                         <h2>We Manage Efficiently</h2>
                                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                     </div>
                                 </div>
                             </div>
                             <div class="carousel-item">
                                 <img class="d-block img-fluid" src="images/Slider3.jpg">
                                 <div class="carousel-caption d-none d-md-block">
                                     <div class="banner-text">
                                         <h2>Try Something New</h2>
                                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </body>
