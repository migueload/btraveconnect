
<label><span class="aterisco">*</span> Ciudad</label>
<select id="ciudad_edit" class="form-control">
	<option value="<?php echo $rs->id_ciudad; ?>"><?php echo $rs->ciudad; ?></option>
	<?php 
		foreach ($ciudades as $ciudad) {?>
			<option value="<?php echo $ciudad->id?>"><?php echo $ciudad->nombre?></option>
	<?php }?>
</select>