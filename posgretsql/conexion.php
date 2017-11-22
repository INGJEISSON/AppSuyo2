<?php
      //  $connect = pg_connect ("host=".$host." dbname=".$dbname." user=".$user." pass=".$pass."");
 $connect = pg_connect ("host=localhost dbname=kendraco_appsuyo user=kendraco_usrsuyo password=HQ;MtlVEQ3.T");
    if(empty($connect))
        echo "<p><i>No me conecte</i></p>";
    else
        echo "<p><i>Me conecte</i></p>";


        // Consultamos usuarios
        
        
    $sql=pg_query($connect, "INSERT INTO tipo_encuesta (nombre) VALUES ('diagnosticos_2017')") or die(pg_last_error());
    echo "cantidad de filas: ".$rows=pg_num_rows($sql);
    
   // pg_query($sentencia) or die(pg_last_error());
    
   // echo pg_last_error($sql);
    
/*    $result = pg_query($conn, "SELECT 1");

$rows = pg_num_rows($result);

echo $rows . " row(s) returned.\n";*/
    

while ($row = pg_fetch_assoc($sql)) {
  echo "Email: ".$row['email'];
  echo "<br />\n";
}
   // pg_close($connect);
    
   
?>
