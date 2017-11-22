<?php
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");

//foreach (glob("*.json") as $nombre_fichero) {
  // echo "Tama単o de $nombre_fichero " . filesize($nombre_fichero) . "\n";
//$json= file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=u1uCIRNYTp_H1vpxpHIPHW84dmD3HfNtr8dwzQJNCWID6dl3OY8wBxTqOxgi3JTlFZeTW_uiFzvaCd8NgIn5rDo0l54ZnH0gm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_dLYMt4gBBc-7g_z0IJaH1kXsCA-3He-6X35TagmcSz0MAHZzHB8xVj-q5aQnlI0li-ZvAnRfSZAKsFxHGJ_iAo5mMyTeN1cbcyXpDZxZjtM&lib=M0M_ETTOFX_nT359h5mbst6wVLJsp4bmx");
//$data=json_decode($json,true); // Obtengo los datos del json...
echo $sql="select matricula from matriculas limit 0,30";
$query=mysql_query($sql);
$rows=mysql_num_rows($query);
                    
                    $i=1;
                    while($datos=mysql_fetch_assoc($query)){
                         $matricula=$datos['matricula'];
                        $url="http://ssiglwps.igac.gov.co/ssigl_ccatastral/consulta_predios?cod%5Fdepartamento=08&matricula=$matricula&cod%5Fmunicipio=758";
                        $json= file_get_contents($url);
                        $data2=json_decode($json,true); // Obtengo los datos del json...
                        
                      //  echo "<br> <br> <br>";
                     //   echo "direccion: ".$i." ".$data2[0]['direccion']." - ".$data2[0]['matricula'];
                     
                     //$separar
                        
                        $update2="update matriculas set direccion='".$data2[0]['direccion']."' where matricula='".$matricula."' ";
                        $query2=mysql_query($update2);
                                if($query2)
                                echo "Listo";
                                else 
                                echo "No listo"; 
                        
                    $i++;
                        
                    }


/*
//var_dump($data2);
echo "<br> <br> <br>";
echo "direccion: ".$data2[0]['direccion'];
$json= file_get_contents("http://ssiglwps.igac.gov.co/ssigl_ccatastral/consulta_predios?cod%5Fdepartamento=08&matricula=84067&cod%5Fmunicipio=758");
$data2=json_decode($json,true); // Obtengo los datos del json...

echo "<br> <br> <br>";
//var_dump($data2);
echo "direccion2: ".$data2[0]['direccion'];
$json= file_get_contents("http://ssiglwps.igac.gov.co/ssigl_ccatastral/consulta_predios?cod%5Fdepartamento=08&matricula=84064&cod%5Fmunicipio=758");
$data2=json_decode($json,true); // Obtengo los datos del json...

echo "<br> <br> <br>";
echo "direccion3: ".$data2[0]['direccion'];
//var_dump($data2);


$json= file_get_contents("http://ssiglwps.igac.gov.co/ssigl_ccatastral/consulta_predios?cod%5Fdepartamento=08&matricula=84061&cod%5Fmunicipio=758");
$data2=json_decode($json,true); // Obtengo los datos del json...

echo "<br> <br> <br>";
//var_dump($data2);
echo "direccion4: ".$data2[0]['direccion'];

$json= file_get_contents("http://ssiglwps.igac.gov.co/ssigl_ccatastral/consulta_predios?cod%5Fdepartamento=08&matricula=84058&cod%5Fmunicipio=758");
$data2=json_decode($json,true); // Obtengo los datos del json...

echo "<br> <br> <br>";
//var_dump($data2);
echo "direccion5: ".$data2[0]['direccion'];*/

//http://ssiglwps.igac.gov.co/ssigl_ccatastral/consulta_predios?cod%5Fdepartamento=08&matricula=84072&cod%5Fmunicipio=758
/* $coordenadas=$data['diagnostico'];
										foreach ($coordenadas as $datos2) {

											//	echo "aqui 2".$ubicacion=$datos2['Cedula'];

														for($i=0;$i<count($datos2);$i++){

														echo	 $datos2[$i];
															echo "<br>";
													 	}
													//echo  "AQUI: ".$ubicacion=$datos2['Cedula'];
													
													        
									  	  					//var_dump($ubicacion);
													// echo $rows=count($ubicacion);
													// if($rows==){	
													 	
												
										}*/


?>