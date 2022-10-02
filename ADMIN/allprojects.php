<?php
include 'header.php';
include '../connection.php';

?>



<body>

    <div class="container mt-2 mb-2">
       
        <hr>

        <h3 class="text-center bg-info border rounded text-light">All Projects</h3>


        <?php
                    require '../connection.php';
                    $sql = "SELECT project.*,student.name as sname,student.year as syear,faculty.name as fname FROM project inner join student on project.s_id=student.s_id  inner join faculty on  project.f_id=faculty.f_id ";
                    $result = $conn->query($sql); 
                ?>
        <table border="0" class="table table-hover table-responsive" align="center" id="myTable">
            <tr>
                <th>S.no</th>
                <th>Project_id</th>
                <th>Project Name</th>
                <th>Student_Name</th>
                <th>Year of Project</th>
                <th>faculty name</th>
            </tr>
            <tbody>
                <?php
                $i=1;
                while ($row = $result->fetch_assoc()) 
                {
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["p_id"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["sname"] ?></td>
                    <td><?php echo $row["syear"] ?></td>
                    <td><?php echo $row["fname"] ?></td>
                  

                    
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
