<table width="738" border="0" class="table responsive">
                             <tr>
                               <td width="23"><strong>#</strong></td>
                               <td width="176"><strong>Fecha y hora de revisión:</strong></td>
                               <td width="264"><strong>Observación:</strong></td>
                               <td width="143"><strong>Realizado:</strong></td>
                               <td width="110"><strong>Estado:</strong></td>
                               <td width="110"><strong>Archivo:</strong></td>
                             </tr>
                             <?php
                             $i=1;
                             while($datos2=mysql_fetch_assoc($query2)){
                             ?>
                             <tr>
                               <td><?php echo $i; ?></td>
                               <td><?php echo $datos2['fecha_registro'] ?></td>
                               <td><?php echo $datos2['observacion'] ?></td>
                               <td><?php echo $datos2['usuario'] ?></td>
                               <td><?php echo $datos2['estado'] ?></td>
                               <td><?php if($datos2['archivo']!=""){ ?><a href="../files/<?php echo $datos2['archivo'] ?>" target="_blank"><img src="../../img/icono_pdf.png" width="31" height="31"></a><?php } ?></td>
                             </tr>
                              <?
                                $i++;
                              }
                             ?>
                           </table>