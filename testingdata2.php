<html>  
<head>  
<Title>Azure SQL Database - PHP Website</Title>  
</head>  
<body>  
<form method="post" action="?action=add" enctype="multipart/form-data" >  
    nama
    <input type="text" name="t_emp_id" id="t_emp_id"/></br>  
    genre 
    <input type="text" name="t_name" id="t_name"/></br>  
    negara
    <input type="text" name="t_education" id="t_education"/></br>  
    produser
    <input type="text" name="t_email" id="t_email"/></br>  
    <input type="submit" name="submit" value="Submit" />  
</form>  
<?php  
/*Connect using SQL Server authentication.*/  
    // $serverName = "mygamesweb.database.windows.net";
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
        $params = array(&$_POST['t_emp_id'], &$_POST['t_name'], &$_POST['t_education'], &$_POST['t_email']  
        );  
        $stmt = sqlsrv_query($conn, $insertSql, $params);  
        if ($stmt === false)  
            {  
            /*Handle the case of a duplicte e-mail address.*/  
            $errors = sqlsrv_errors();  
            if ($errors[0]['code'] == 2601)  
                {  
                echo "The e-mail address you entered has already been used.</br>";  
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
            
            //Read Query
            $tsql= "SELECT * FROM permainan.game;";
            $getResults= sqlsrv_query($conn, $tsql);
            echo ("Reading data from table" . PHP_EOL);
            if ($getResults == FALSE)
                die(FormatErrors(sqlsrv_errors()));
            while ($row = sqlsrv_fetch_array($getResults)) {
                echo ($row['id'] . " " . $row['nama'] . " " . $row['genre'] . PHP_EOL);

            }
            sqlsrv_free_stmt($getResults);
      
            }  
        }  
    }  
  
/*Display registered people.*/  
/*$sql = "SELECT * FROM empTable ORDER BY name"; 
$stmt = sqlsrv_query($conn, $sql); 
if($stmt === false) 
{ 
die(print_r(sqlsrv_errors(), true)); 
} 
 
if(sqlsrv_has_rows($stmt)) 
{ 
print("<table border='1px'>"); 
print("<tr><td>Emp Id</td>"); 
print("<td>Name</td>"); 
print("<td>education</td>"); 
print("<td>Email</td></tr>"); 
 
while($row = sqlsrv_fetch_array($stmt)) 
{ 
 
print("<tr><td>".$row['emp_id']."</td>"); 
print("<td>".$row['name']."</td>"); 
print("<td>".$row['education']."</td>"); 
print("<td>".$row['email']."</td></tr>"); 
} 
 
print("</table>"); 
}*/  
?>  
</body>  
</html>  
