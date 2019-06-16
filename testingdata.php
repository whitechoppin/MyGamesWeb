<?php
    $serverName = "mygamesweb.database.windows.net"; // update me
    // $serverName = "tcp:ttyir96emw.database.windows.net,1433";
    $connectionOptions = array(
        "Database" => "permainan", // update me
        "Uid" => "alexwibowo", // update me
        "PWD" => "08Maret2017" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn)
        echo "Connected!"
?>
