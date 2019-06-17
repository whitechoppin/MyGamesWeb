<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Daftar Permainan Video Game</h3>
            </div>
            <div class="row table-responsive">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM game ORDER BY id ASC';
                    $getResults= sqlsrv_query($pdo, $tsql);
                    if ($getResults == FALSE)
                        die(FormatErrors(sqlsrv_errors()));
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
                    Database::disconnect();
                    ?>
                    </tbody>
            </table>
        </div>
    </div>
  </body>
</html>
