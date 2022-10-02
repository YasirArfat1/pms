<?php
session_start();

if($_SESSION['Role'] != "Faculty")
{
header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    

    <link rel="stylesheet" href="../fontawesome/css/all.css">
     <link rel="stylesheet" href="../Datatables/css/jquery.dataTables.min.css">
    <script src="../Datatables/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript" src="../Bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="../Bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../Bootstrap/js/bootstrap.min.js"></script>
    
    

</head>

<body>
    <div class="container-fluid bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#">Fyp Management System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="skill.php">Skills</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view.php">View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mail.php">Mail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="meeting.php">Metting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Hi, <strong class="text-light"><?php echo $_SESSION['name']?></strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger" href="../logout.php" >logout</a>
                        </li>
                        

                    </ul>
                </div>
            </nav>
        </div>
    </div>
