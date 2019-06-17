<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
  
<body>  
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Customer</h3>
        </div>
    </div>
    <form class="form-horizontal"method="post" action="?action=add" enctype="multipart/form-data" >  
        <div class="control-group">
            <label class="control-label">Nama</label>
            <div class="controls">
                <input type="text" name="nama" id="nama"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Genre</label>
            <div class="controls">
                <input type="text" name="genre" id="genre"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Negara</label>
            <div class="controls">
                <input type="text" name="negara" id="negara"/>      
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Produser</label>
            <div class="controls">
                <input type="text" name="produser" id="produser"/>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success">Create</button>
            <a class="btn" href="index.php">Back</a>
        </div>
    </form> 
</div>
 
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
  
    if (isset($_GET['action']))  
    {  
        if ($_GET['action'] == 'add')  
        {  
            /*Insert data.*/  
            $insertSql = "INSERT INTO game (nama,genre,negara,produser) VALUES (?,?,?,?)";  
            $params = array(&$_POST['nama'], &$_POST['genre'], &$_POST['negara'], &$_POST['produser']  
            );  
            $stmt = sqlsrv_query($conn, $insertSql, $params);  
            if ($stmt === false)  
                {  
                $errors = sqlsrv_errors();  
                if ($errors[0]['code'] == 2601)  
                {  
                    echo "The data you entered is fail.</br>";  
                }  
                /*Die if other errors occurred.*/  
                else  
                    {  
                    die(print_r($errors, true));  
                    }  
                }  
            else  
            {  
                echo "Registration complete.</br>";  
                $rowsAffected = sqlsrv_rows_affected($stmt);
                if ($stmt == FALSE or $rowsAffected == FALSE)
                    die(FormatErrors(sqlsrv_errors()));
                echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);

                sqlsrv_free_stmt($stmt);
            }  
        } 
        header("Location: index.php"); 
    }  
?>  
</body>  
</html>  
