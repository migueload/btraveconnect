
<section>
<div class="row">
	<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: -350px;">
		<h4>Facilidades Hotel</h4>
		<ul style="list-style: none;">
			<?php foreach ($facilidades_hotel as $rowHot) {?>
				<li>
					<input type="checkbox" id="chk_facilidad_hotel" value="<?php echo $rowHot->id?>" onclick="setFacilidadHot(this)">
					<?php echo $rowHot->descripcion?>
						
				</li>
			<?php }?>

		</ul>
	</div>	

	<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: -350px;">
		<h4>Facilidades Habitaciones</h4>
		<ul style="list-style: none;">
			<?php foreach ($facilidades_habitacion as $rowHab) {?>
				<li>
					<input type="checkbox" id="chk_facilidad_habitacion" value="<?php echo $rowHab->id?>" onclick="setFacilidadHab(this)">
					<?php echo $rowHab->descripcion?>
						
				</li>
			<?php }?>

		</ul>
	</div>	

</div>
</section>