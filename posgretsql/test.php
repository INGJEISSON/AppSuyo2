<?php
    $connection = pg_connect ("host=localhost dbname=kendraco_appsuyo user=kendraco_usrsuyo password=HQ;MtlVEQ3.T");
    if($connection) {
       echo 'connected';
    } else {
        echo 'there has been an error connecting';
    } 
?>
