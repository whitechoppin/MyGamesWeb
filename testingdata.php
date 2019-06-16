<?php
//     $serverName = "mygamesweb.database.windows.net";
    $serverName = "tcp:mygamesweb.database.windows.net,1433";
    $connectionOptions = array(
        "Database" => "permainan", // update me
        "Uid" => "alexwibowo", // update me
        "PWD" => "08Maret2017" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn){
        echo "Connected!"
    } else {
     echo "Fail!"
    }
    //Insert Query
//     echo ("Inserting a new row into table" . PHP_EOL);
//     $tsql= "INSERT INTO permainan.game (nama, genre, negara, produser) VALUES (?,?,?,?);";
//     $params = array('Dynasti Warrior','Beat em all','china','koei');
//     $getResults= sqlsrv_query($conn, $tsql, $params);
//     $rowsAffected = sqlsrv_rows_affected($getResults);
//     if ($getResults == FALSE or $rowsAffected == FALSE)
//         die(FormatErrors(sqlsrv_errors()));
//     echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);

//     sqlsrv_free_stmt($getResults);

//     function FormatErrors( $errors )
//     {
//         /* Display errors. */
//         echo "Error information: ";

//         foreach ( $errors as $error )
//         {
//             echo "SQLSTATE: ".$error['SQLSTATE']."";
//             echo "Code: ".$error['code']."";
//             echo "Message: ".$error['message']."";
//         }
//     }

?>
