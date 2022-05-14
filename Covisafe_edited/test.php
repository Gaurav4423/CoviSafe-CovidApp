<?php
    $db = mysqli_connect('localhost','covisafeDBA','covisafe123','Covisafe');
?>

<html lang="en">
    <style>
        table, td {
      border:2px solid black;
    
    }
    h1 {
        margin: auto;
        width: 40%;
        border:2px solid black;
        background-color: #04AA6D;
        color: white;
      }
    tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
<body>
    <h1 align="center">Student Details</h1><br><br>
    <table align="center">
        
        <?php 
        $query = "SELECT * from `Student`NATURAL JOIN`Resides_In`;";
        $result = mysqli_query($db, $query);
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>    
            <td align="center"><?php  echo $row['Roll_No']." "; ?></td>
            <td align="center"><?php echo $row['S_Name']." ";  ?></td>
            <td align="center"><?php echo $row['S_Contact_No']." ";  ?></td> 
            <td align="center"><?php echo $row['S_Email']." ";  ?></td>
            <td align="center"><?php echo $row['Address']." ";  ?></td>
            <td align="center"><?php echo $row['Subgroup']." ";  ?></td>
            <td align="center"><?php echo $row['Guardian_Contact_No']." ";  ?></td>
            <td align="center"><?php echo $row['Health_Status']." "; ?></td>
            <td align="center"><?php echo $row['Hostel_Name']." "; ?></td>
            <td align="center"><?php echo $row['Room_No']." ";  ?></td>
        </tr>           
    <?php   
     }
    ?>

    </table>
    
</body>
</html>