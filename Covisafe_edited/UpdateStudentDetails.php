<?php
    $db = mysqli_connect('localhost','covisafeDBA','covisafe123','Covisafe');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Updation</title>
    <style>
        body{
            background-image: url("https://wallpaperaccess.com/full/831613.jpg");
            background-repeat: no-repeat;
            font-family: monospace,cursive;
            padding: 0px;
            color: black;
            text-align: center;
            

        }
        fieldset {
            margin:auto;
            width: 50%;
            background-color: #eeeeee;
          }
        input[type=text] {
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
          }
       
        
         .form{
            
             margin: 80 px 80 px;
             
             align-content: center;
            
         }
         .form h1{
             text-align: center;

             font-size: 40px;
             color: black;
             font-weight: bold;
             }
         .form_group input{
            
             font-size: monospace,cursive;
             text-align: center;
             font-weight: bold;
             font-size: 25px;
             margin: 11px auto;
            
             border-radius: 4px;
             padding: 1px;
             display: block;
             border: 2px solid black;

         }
    </style>
</head>
<body>

        <div class="form">
            <h1>UPDATE STUDENT DETAILS</h1>
            <form method="post">
                 <fieldset >
                
                 <div class="form_group">
                  <b>Roll NO </b> <input type="text" name="roll_no" >
                </div>

                 <div class="form_group">
                  <b>Health Status</b>  <input type="text" name="health_status">

                </div>
                
                <div class="form_group">
                    <b>Hostel Name</b> <input type="text" name="hostel_name">
                </div>
                
                <div class="form_group">
                 <b>Room No</b>  <input type="text" name="room_no">
                </div>
                
                <div class="form_group">
                    <input type="submit" >
                </div> 

            </fieldset>             
            </form>
                <?php
                $roll_no=$_POST['roll_no'];
                $health_status=$_POST['health_status'];
                $hostel_name=$_POST['hostel_name'];
                $room_no=$_POST['room_no'];
                
                $query1="UPDATE `Student` SET Health_Status='$health_status' where Roll_No=$roll_no;";
                $query2="UPDATE `Resides_In` SET Hostel_Name='$hostel_name', Room_No=$room_no where Roll_No=$roll_no;";
                
                $result1=mysqli_query($db, $query1);
                $result2=mysqli_query($db, $query2);
                
                $retval = $result1*$result2;
                if(! $retval )
                {
                die('Could not update data: ' . mysql_error());
                }
                echo "Updated data successfully\n";
                ?>
        </div>
    </header>
</body>
</html>