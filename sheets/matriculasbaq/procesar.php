<?php
//Busco los ficheros en formato json.
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");

date_default_timezone_set('UTC');

foreach (glob("*.json.txt") as $nombre_fichero) {
  // echo "Tama鍗榦 de $nombre_fichero " . filesize($nombre_fichero) . "\n";
$json= file_get_contents($nombre_fichero);

$data=json_decode($json, true); // Obtengo los datos del json...
//var_dump($data);

//	if($version>=9){
										$coordenadas=$data['features'];
										foreach ($coordenadas as $datos2) {
													 $datos3=$datos2['attributes'];
									  	  				
													 	for($i=0;$i<1;$i++){
                                                         //  echo  "CODIGO: ".$ubicacion['CODIGO']."\t REFE: ".$ubicacion['REFERENCIA']."\t REFE_1:".$ubicacion['REFERENC_1']."\t DIRE:".$ubicacion['DIRECCION'];
									$insert="insert into matriculasbaq values('".$datos3['OBJECTID_1']."','".$datos3['OBJECTID']."', '".$datos3['CODIGO']."', '".$datos3['REFERENCIA']."', '".$datos3['REFERENC_1']."', '".$datos3['DIRECCION']."', '".$datos3['MATRICULA_']."', '".$datos3['DESTINO_EC']."', '".$datos3['AREA_TERRE']."', '".$datos3['AREA_CONST']."' , '".$datos3['AVALUO']."' , '".$datos3['Shape__Area']."' , '".$datos3['Shape__Length']."'  ) ";
								    $query=mysql_query($insert);
								
													 	}
												
										}
								


}

?>