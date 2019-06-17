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
                        <h3>Lihat Data Permainan</h3>
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
                    
                    $sql = "SELECT * FROM permainan where id = ?";
                    $params = array($nama,$genre,$negara,$produser));  
                    $getResults= sqlsrv_query($conn, $sql, $params); 
                    if ($getResults)
                    {
                        while ($row = sqlsrv_fetch_array($getResults)) {
                            echo '<tr>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td><a class="" href="show.php?id='.$row['id'].'">'. $row['nama'] . '</a></td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                    $conn = null;  
                    ?>
                    <!-- <div class="form-horizontal" >
                        <div class="control-group">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['nama'];?>
                                </label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Genre</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['genre'];?>
                                </label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Negara</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['negara'];?>
                                </label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Produser</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['produser'];?>
                                </label>
                            </div>
                        </div> -->
                        <div class="form-actions">
                            <a class="btn" href="index.php">Back</a>
                        </div>
                     
                      
                    </div>
                </div>
                 
    </div>
  </body>
</html>
