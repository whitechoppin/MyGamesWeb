<!DOCTYPE html>
<html lang="en">

<?php

    $serverName = "tcp:mygamesweb.database.windows.net,1433";
    $connectionOptions = array(
        "Database" => "permainan", // update me
        "Uid" => "alexwibowo", // update me
        "PWD" => "08Maret2017" // update me
    ); 
    $conn = sqlsrv_connect($serverName, $connectionOptions);  
     
    if ($conn === false)  
    {  
        die(print_r(sqlsrv_errors() , true));  
    } 
    
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $sql = "DELETE FROM game WHERE id = ?";
            $params = array($id);  
            $stmt = sqlsrv_query($conn, $sql, $params);
            if ($stmt)  
            {  
                /*Handle the case of a duplicte e-mail address.*/  
                echo "Delete Data complete.</br>";  
                $rowsAffected = sqlsrv_rows_affected($stmt);
                echo ($rowsAffected. " row(s) Deleted " . PHP_EOL);
    
                sqlsrv_free_stmt($stmt);
            }  
        $conn = null;
        header("Location: index.php");
    }
?>

<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete a Customer</h3>
                    </div>
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="index.php">No</a>
                        </div>
                    </form>
                </div>
    </div> <!-- /container -->
</body>
</html>
