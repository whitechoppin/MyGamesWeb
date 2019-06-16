<!DOCTYPE html>
<html lang="en">
<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        $namaError = null;
        $genreError = null;
        $negaraError = null;
        $produserError = null;
         
        $nama = $_POST['nama'];
        $genre = $_POST['genre'];
        $negara = $_POST['negara'];
        $produser = $_POST['produser'];
         
        // validasi inputan
        $valid = true;
        if (empty($nama)) {
            $namaError = 'Tolong isi nama';
            $valid = false;
        }
         
        if (empty($genre)) {
            $genreError = 'Tolong isi genre';
            $valid = false;
        }
         
        if (empty($negara)) {
            $negaraError = 'tolong isi negara';
            $valid = false;
        }

        if (empty($produser)) {
            $produserError = 'tolong isi produser';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE permainan  set nama = ?, genre = ?, negara =?, produser =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nama,$genre,$negara,$produser,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM permainan where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nama = $data['nama'];
        $genre = $data['genre'];
        $negara = $data['negara'];
        $produser = $data['produser'];
        Database::disconnect();
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
                        <h3>Update data game</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
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
                            <button type="submit" class="btn btn-success">Update</button>
                            <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>