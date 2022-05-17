<?php
    $db = mysqli_connect('localhost','covisafeDBA','covisafe123','Covisafe');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Update</title>
    <style>
        body{
            background-image: url("https://wallpaperaccess.com/full/831613.jpg");
            background-repeat: no-repeat;
            font-family: monospace,cursive;
            padding: 0px;
            color: black;
            text-align: center;
            

        }
        div {
            width: 50%;
            padding: 10px;
            border: 5px solid gray;
            margin: auto;
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
<h1> Check Health Status</h1>

<form class="form" method="post">
    <fieldset>
        <br>
        <b>Enter the Roll No</b> <br><br>
 <input type="text" name="roll_no"><br><br>
<input type="submit">
</fieldset>
</form>
<br><br>
<div align="center">
<b>
<?php 
    $roll_no=$_POST['roll_no'];
    $query = "select Health_Status from `Student` where Roll_No=$roll_no;";
    $result = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($result)) {
        echo $roll_no." is ".$row['Health_Status']."<br>";
    }
    ?></b></div>
</body>
</html>