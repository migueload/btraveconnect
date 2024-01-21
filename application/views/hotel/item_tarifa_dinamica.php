<table class="table table-condensed" >
	<thead>
		<tr style="background-color: #2f5aa6;color: #fff">
			<th><i class="fa fa-cogs"></i></th>
			<th>TIPO</th>
			<th>TIPO HABITACI&Oacute;N</th>
			<th>FECHA INICIO</th>
			<th>FECHA FIN</th>
			<th style="text-align: right;">MONTO TARIFA PUBLICA</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if($tarifas_dinamica){
		foreach ($tarifas_dinamica as  $row) {?>
		<tr>
			<td><a href="#" onclick="delItemTarifaDinamica('<?php echo $row->id?>')"><i class="fa fa-times-circle"></i></a></td>
			<td><?php echo $row->tipo?></td>
			<td><?php echo $row->tipo_habitacion?></td>
			<td><?php echo $row->fecha_inicio?></td>
			<td><?php echo $row->fecha_fin?></td>
			<td style="text-align: right;"><?php echo number_format($row->monto,2)?></td>
		</tr>
		<?php }
		}?>
	</tbody>
</table>