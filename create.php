
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
             
                    <form class="form-horizontal" method="post" action="?action=add" enctype="multipart/form-data" >  
                        <div class="control-group <?php echo !empty($namaError)?'error':'';?>">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                                <input name="nama" type="text"  placeholder="Nama" value="<?php echo !empty($nama)?$nama:'';?>">
                                <?php if (!empty($namaError)): ?>
                                    <span class="help-inline"><?php echo $namaError;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="control-group <?php echo !empty($genreError)?'error':'';?>">
                            <label class="control-label">Genre</label>
                            <div class="controls">
                                <input name="genre" type="text" placeholder="Genre" value="<?php echo !empty($genre)?$genre:'';?>">
                                <?php if (!empty($genreError)): ?>
                                    <span class="help-inline"><?php echo $genreError;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="control-group <?php echo !empty($negaraError)?'error':'';?>">
                            <label class="control-label">Negara</label>
                            <div class="controls">
                                <input name="negara" type="text"  placeholder="Negara" value="<?php echo !empty($negara)?$negara:'';?>">
                                <?php if (!empty($negaraError)): ?>
                                    <span class="help-inline"><?php echo $negaraError;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="control-group <?php echo !empty($produserError)?'error':'';?>">
                            <label class="control-label">Produser</label>
                            <div class="controls">
                                <input name="produser" type="text"  placeholder="produser" value="<?php echo !empty($produser)?$produser:'';?>">
                                <?php if (!empty($produserError)): ?>
                                    <span class="help-inline"><?php echo $produserError;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Create</button>
                            <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
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
                // isi data
            
            $sql = "INSERT INTO game (nama,genre,negara,produser) VALUES (?, ?, ? ,?)";  
            $params = array($nama,$genre,$negara,$produser));  
            $stmt = sqlsrv_query($conn, $sql, $params);  
            if ($stmt)  
            {  
                /*Handle the case of a duplicte e-mail address.*/  
                echo "Registration complete.</br>";  
                $rowsAffected = sqlsrv_rows_affected($stmt);
                echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);
    
                sqlsrv_free_stmt($stmt);
            }  
            header("Location: index.php");
                
            
        }
    }
?>
  </body>
</html>
