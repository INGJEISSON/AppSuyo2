 <?php
//Busco los ficheros en formato json.
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
      
      if(isset($_GET['id_fasfield'])){ // Buscamos las encuestas

      $sql="select  enc_procesadas.cod_enc_proc, enc_procesadas.asesor, enc_procesadas.cliente, enc_procesadas.fecha_recepcion, enc_procesadas.fecha_revision, enc_procesadas.archivos, estado.descripcion as estado, enc_procesadas.id_fasfield, enc_procesadas.ciudad, enc_procesadas.arch_pdf, tipo_encuesta.nombre as tipo_encuesta from enc_procesadas, estado, tipo_encuesta where enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.tipo_encuesta=tipo_encuesta.tipo_encuesta  and enc_procesadas.id_fasfield='".$_GET['id_fasfield']."' ";
          $query=mysql_query($sql);
          $rows=mysql_num_rows($query);
          $datos=mysql_fetch_assoc($query);
        $archivo_pdf=$datos['arch_pdf'];    
    
      
        }
?>


 <header class="page-header">
           <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Información de Diagnóstico de:  <?php echo utf8_encode($datos['cliente']);  ?> - Ciudad: <?php echo utf8_encode($datos['ciudad']);  ?> </h3>
                    </div>
                    <div class="card-body">

                         <p>
                           <?php
                         // Buscamos los archivos....


      if(isset($_GET['id_fasfield'])){ // Buscamos los archivos de la encuesta..

               
        }
?>
                         </p>
                         <table width="870" border="0" id="pan_add_revision" class="table responsive" cellpadding="1" cellspacing="4">
                           <tr>
                             <td width="189"><strong>Estado Actual:</strong></td>
                             <td width="26">&nbsp;</td>
                             <td width="227"><strong>Observación:</strong></td>
                             <td width="11">&nbsp;</td>
                             <td width="242" id="archrev"><strong>Adjuntar archivo a revisar</strong></td>
                             <td width="16" >&nbsp;</td>
                             <td width="113"><strong>Acción</strong></td>
                           </tr>
                           <tr>
                             <td height="46"><select name="select" id="cod_estado" class="form-control">
                               <option value="1" selected="selected">Sin revisar</option>
                               <option value="9">Solicitud de Aprobación</option>
                               <option value="5">Solicitud de Corrección</option>
                               <option value="6">Aprobado</option>
                               <option value="8">Corregido</option>
                               <option value="7">No Aprobado</option>
                             </select></td>
                             <td><label for="textfield"></label></td>
                             <td><input type="text" class="form-control" name="textfield2" id="observacion"></td>
                             <td>&nbsp;</td>
                             <td id="archrev2"><iframe src="includes/php/subir_archivo.php" scrolling="no" height="100" width="300" /></td>
                             <td>&nbsp;</td>
                             <td><input type="button" class="btn btn-primary" name="button" id="g_revision" value="Registrar"></td>
                           </tr>
                         </table>
                         <div id='historial_revi' align="center">
                           <hr>&nbsp;</hr>
                           <table width="155" border="0" cellpadding="0" cellspacing="0">
                             <tr align="center">
                               <td width="106"><strong>Agregar revisión</strong></td>
                             </tr>
                             <tr align="center">
                               <td><img src="img/if_Plus_206460.png" id="add_revision" style="cursor:pointer" title="Agregar revisión" width="38" height="38"></td>
                             </tr>
                           </table>
                           <strong>Revisiones del diagnóstico - Total:</strong>
                           <table width="945" border="0" class="table responsive">
                             <tr>
                               <td width="23"><strong>#</strong></td>
                               <td width="176"><strong>Fecha y hora de revisión:</strong></td>
                               <td width="264"><strong>Observación:</strong></td>
                               <td width="143"><strong>Realizado:</strong></td>
                               <td width="110"><strong>Estado:</strong></td>
                               <td width="90"><strong>Documento</strong></td>
                             </tr>
                             <tr>
                               <td>&nbsp;</td>
                               <td>&nbsp;</td>
                               <td>&nbsp;</td>
                               <td>&nbsp;</td>
                               <td>&nbsp;</td>
                               <td><a href="f" target="_blank">Ver</a></td>
                             </tr>
                           </table>
                      </div>
                      <p>
                      <div id='cargar2' align="center"> 
                            <img src="img/loading_azul.gif" id="cargar2">
                        <p>Por favor espere  mientras se crea el carpeta del cliente en el drive.</p>
                          </div>
                         </p>
                      <p>&nbsp;</p>
                    </div>
                  </div>
                </div>
               
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>
         
  <script>

$(document).ready(function(){
$("#cargar2").hide();
$("#archrev").hide();
$("#archrev2").hide();
$("#pan_add_revision").hide();

$("#add_revision").click(function(){
$("#pan_add_revision").show();

});

$("#cod_estado").change(function(){
        var cod_estado=$("#cod_estado").val();

           if(cod_estado==8 || cod_estado==9 || cod_estado==5){
            $("#archrev").show();
$("#archrev2").show();
		   }
            else{
             $("#archrev").hide();
$("#archrev2").hide();
			}

  });




$("#g_revision").click(function(){  // Abregamos revisión .....

var cod_estado=$("#cod_estado").val();
var observacion=$("#observacion").val();
var id_fasfield="<?php echo "$_GET[id_fasfield]" ?>";
var datos='id_fasfield='+id_fasfield+'&cod_estado='+cod_estado+'&observacion='+observacion+'&add_revision='+1;
    
    if(cod_estado!=1){

            $("#cargar2").show();
              $.ajax({

                        type: "POST",
                        data: datos,
                        url: 'includes/php/g_procesos.php?'+datos,
                        success: function(valor){
                           
                               if(valor==1){
                                $("#cargar2").hide();
                                  alert("Se ha agregado su comentario(revisión) al diagnóstico");                               

                               }else{
                                      $("#cargar2").hide();
                                alert("Ocurrió un error al crear el registro de la revisión, por favor comuníquese con el administrador.");

                               }


                        }
                  });

    }
    else
      alert("Por favor selecione un estado a la (Revisión) ");


});



});

    </script>