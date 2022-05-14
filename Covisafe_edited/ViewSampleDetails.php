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
    <table align="center">
        <h1 align="center">SAMPLE DETAILS</h1><br><br>    
        <?php 
        $query = "SELECT * from `Covid_Test`NATURAL JOIN`Sends_Sample`;";
        $result = mysqli_query($db, $query);
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td align="center"><?php  echo $row['Sample_No']." "; ?></td>
            <td align="center"><?php echo $row['Sample_Date']." ";  ?></td>
            <td align="center"><?php echo $row['Sample_Result']." ";  ?></td> 
            <td align="center"><?php echo $row['Roll_No']." ";  ?></td>
        </tr>           
    <?php   
     }
    ?>

    </table>
    
</body>
</html>