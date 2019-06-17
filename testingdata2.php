<html>  
<head>  
<Title>Azure SQL Database - PHP Website</Title>  
</head>  
<body>  
<form method="post" action="?action=add" enctype="multipart/form-data" >  
    nama
    <input type="text" name="nama" id="nama"/></br>  
    genre 
    <input type="text" name="genre" id="genre"/></br>  
    negara
    <input type="text" name="negara" id="negara"/></br>  
    produser
    <input type="text" name="produser" id="produser"/></br>  
    <input type="submit" name="submit" value="Submit" />  
</form>  
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
