
<label><span class="aterisco">*</span> Ciudad</label>
<select id="ciudad" class="form-control">
	<option value="0">Ninguno</option>
	<?php 
	if(isset($ciudades)){
		foreach ($ciudades as $ciudad) {?>
			<option value="<?php echo $ciudad->id?>"><?php echo $ciudad->nombre?></option>
		<?php }
	}?>
</select>