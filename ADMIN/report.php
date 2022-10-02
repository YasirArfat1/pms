<?php
include 'header.php';
?>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Project Management System</title>
</head>

<body>
    <div class="container mb-2 mt-2">
        <table  class="table w-100 table-hover table-responsive">
            <?php
                echo "<tr>";
                echo "<th>"."Meeting ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Faculty ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Student ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Date"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Time"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Description"."</th>";
                echo "</tr>";
                include './connection.php';
                        $sql1="select * from meeting ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['meeting_id']."<td/>";
                            echo "<td>".$std['f_id']."<td/>"; 
                            echo "<td>".$std['s_id']."<td/>"; 
                            echo "<td>".$std['date']."<td/>"; 
                            echo "<td>".$std['time']."<td/>"; 
                            echo "<td>".$std['desc']."<td/>"; 
                            ?>  </tr> <?php 
                        }
            ?>
        </table>
    </div>
</body>
