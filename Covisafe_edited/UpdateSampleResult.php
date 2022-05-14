<?php
    $db = mysqli_connect('localhost','covisafeDBA','covisafe123','Covisafe');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Sample</title>
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
                  <b>Sample NO </b> <input type="text" name="sample_no" >
                </div>

                 <div class="form_group">
                  <b>Sample Result</b>  <input type="text" name="sample_result">

                </div>
                
                <div class="form_group">
                    <input type="submit" >
                </div> 

            </fieldset>             
            </form>
                <?php
                $sample_no=$_POST['sample_no'];
                $sample_result=$_POST['sample_result'];
                
                $query="UPDATE `Covid_Test` SET Sample_Result='$sample_result' where Sample_No=$sample_no;";
                $result=mysqli_query($db, $query);
                
                $retval = $result;
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