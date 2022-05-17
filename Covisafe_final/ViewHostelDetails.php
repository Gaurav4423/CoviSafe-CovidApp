<!DOCTYPE html>
<html lang="en">
</html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSTEL DETAILS</title>
    <html>
        
     <style>
    table, td {
  border:2px solid black;
}

table.center {
    align-content: center;
    margin-left: auto; 
    margin-right: auto;
  }
th {
    align-items: center;
    border:2px solid black;
    background-color: #04AA6D;
    color: white;
  }
p {
display:inline;
}  
a:link, a:visited {
    border:2px solid black;
    background-color: #04AA6D;
    border-radius: 10px;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
  }
  
  .a:hover, .a:active {
    animation: pulsate 1s
    ease-in-out;
  } 
  @keyframes pulsate{
      0%{
          box-shadow: 0 0 25px #5ddcff
          0 0 50px #4e00c2;
      }
  }

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<?php
    $db = mysqli_connect('localhost','covisafeDBA','covisafe123','Covisafe');

?>
<html>
    <body align="center">
        <h2 align="center">HOSTEL COVID DETAILS</h2><br><br>
        <?php
                $query1 = "SELECT count(*) as total from Student where Health_Status='Healthy';";
                $result1 = mysqli_query($db, $query1);
                $query2 = "SELECT count(*) as total from Student where Health_Status='Positive';";
                $result2 = mysqli_query($db, $query2);
                $query3 = "SELECT count(*) as total from Student where Health_Status='Isolated';";
                $result3 = mysqli_query($db, $query3);
                $query4 = "SELECT count(*) as total from Student where Health_Status='Quarantined';";
                $result4 = mysqli_query($db, $query4);
            ?>

        <table  class="center">
            <tr>
                <th>Hostel </th>
                <th>Healthy </th>
                <th>Positive </th>
                <th>Isolated </th>
                <th>Quarantined </th>
            </tr>
            <?php
                $query = "CALL get_hostel_health_info();";
                $result = mysqli_query($db, $query);
                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td align="center"><?php echo $row['HName'];?></td>
                <td align="center"><?php echo $row['Healthy'];?></td>
                <td align="center"><?php echo $row['Positive'];?></td>
                <td align="center"><?php echo $row['Isolated'];?></td>
                <td align="center"><?php echo $row['Quarantined'];?></td>
                <?php 
                    }
                ?>
            </tr> 
            <tr>
                <td></td>
                <td align="center">
                    <?php
                        while($row1 = mysqli_fetch_assoc($result1)) {
                            echo $row1['total'];
                        }
                    ?>
                </td ><td align="center">
                    <?php
                        while($row2 = mysqli_fetch_assoc($result2)) {
                            echo $row2['total'];
                        }
                    ?>
                </td>
                <td align="center">
                    <?php
                        while($row3 = mysqli_fetch_assoc($result3)) {
                            echo $row3['total'];
                        }
                    ?>
                </td>
                <td align="center">
                    <?php
                        while($row4 = mysqli_fetch_assoc($result4)) {
                            echo $row4['total'];
                        }
                    ?>
                </td>
            </tr>   
        </table>
        <br>
        <h3 align="center">CHOOSE HOSTEL TO GET INFECTED STUDENT INFO</h3><br>
        <div align="center">
        <p><a href="HostelStatus/HostelA.php">A</a></p><p>&nbsp &nbsp</p>
        <p><a href="HostelStatus/HostelB.php">B</a></p><p>&nbsp &nbsp</p>
        <p><a href="HostelStatus/HostelC.php">C</a></p><p>&nbsp &nbsp</p>
        <p><a href="HostelStatus/HostelE.php">E</a></p><p>&nbsp &nbsp</p>
        <p><a href="HostelStatus/HostelG.php">G</a></p><p>&nbsp &nbsp</p>
        <p><a href="HostelStatus/HostelH.php">H</a></p><p>&nbsp &nbsp</p>
        <p><a href="HostelStatus/HostelI.php">I</a></p><p>
        </div>
        <br>
        <br>
        <div align="center">
            <p><a href="HostelStatus/HostelJ.php">J</a></p><p>&nbsp &nbsp</p>
            <p><a href="HostelStatus/HostelK.php">K</a></p><p>&nbsp &nbsp</p>
            <p><a href="HostelStatus/HostelL.php">L</a></p><p>&nbsp &nbsp</p>
            <p><a href="HostelStatus/HostelM.php">M</a></p><p>&nbsp &nbsp</p>
            <p><a href="HostelStatus/HostelN.php">N</a></p><p>&nbsp &nbsp</p>
            <p><a href="HostelStatus/HostelO.php">O</a></p><p>&nbsp &nbsp</p>
            <p><a href="HostelStatus/HostelPG.php">PG</a></p> 
        </div>
        
    </body>
</html>