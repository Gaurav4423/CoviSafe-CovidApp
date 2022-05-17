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
        <h1 align="center">ORDER DETAILS</h1><br><br>    
        <?php 
        $query = "SELECT Roll_No, S_Name, count(*) from `Student`NATURAL JOIN`Orders_From`NATURAL JOIN`Market` group by Roll_No;";
        $result = mysqli_query($db, $query);
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td align="center"><?php  echo $row['Roll_No']." "; ?></td>
            <td align="center"><?php echo $row['S_Name']." ";  ?></td>
            <td align="center"><?php echo $row['count(*)']." ";  ?></td> 
        </tr>           
    <?php   
     }
    ?>

    </table>
    
</body>
</html>