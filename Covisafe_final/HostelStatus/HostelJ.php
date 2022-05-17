<?php
    $db = mysqli_connect('localhost','covisafeDBA','covisafe123','Covisafe');
?>
<html>
    <body>
        <?php
            $query = "SELECT S_Name, Subgroup, Room_No, Health_Status from `Student`NATURAL JOIN`Resides_In` where Hostel_Name='J' and Health_Status='Positive';";
            $result = mysqli_query($db, $query);
            while($row = mysqli_fetch_assoc($result)) {
                echo $row['S_Name']." | ";
                echo $row['Room_No']." | ";
                echo $row['Subgroup']." | ";
                echo $row['Health_Status']."<br>";
            }
            $query = "SELECT S_Name, Subgroup, Room_No, Health_Status from `Student`NATURAL JOIN`Resides_In` where Hostel_Name='J' and Health_Status='Isolated';";
            $result = mysqli_query($db, $query);
            while($row = mysqli_fetch_assoc($result)) {
                echo $row['S_Name']." | ";
                echo $row['Room_No']." | ";
                echo $row['Subgroup']." | ";
                echo $row['Health_Status']."<br>";
            }
            $query = "SELECT S_Name, Subgroup, Room_No, Health_Status from `Student`NATURAL JOIN`Resides_In` where Hostel_Name='J' and Health_Status='Quarantined';";
            $result = mysqli_query($db, $query);
            while($row = mysqli_fetch_assoc($result)) {
                echo $row['S_Name']." | ";
                echo $row['Room_No']." | ";
                echo $row['Subgroup']." | ";
                echo $row['Health_Status']."<br>";
            }
        ?>
    </body>
</html>