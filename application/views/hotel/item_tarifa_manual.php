<table class="table table-condensed" >
	<thead>
		<tr style="background-color: #2f5aa6;color: #fff">
			<th><i class="fa fa-cogs"></i></th>
			<th>TIPO</th>
			<th>TIPO HABITACI&Oacute;N</th>
			<th>DESCRIPCION</th>
			<th style="text-align: right;">MONTO TARIFA PUBLICA</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if($tarifas_manual){
		foreach ($tarifas_manual as  $row) {?>
		<tr>
			<td><a href="#" onclick="delItemTarifaManual('<?php echo $row->id?>')"><i class="fa fa-times-circle"></i></a></td>
			<td><?php echo $row->tipo?></td>
			<td><?php echo $row->tipo_habitacion?></td>
			<td><?php echo $row->descripcion?></td>
			<td style="text-align: right;"><?php echo number_format($row->monto,2)?></td>
		</tr>
		<?php }
	}?>
	</tbody>
</table>