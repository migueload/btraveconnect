
<section>
<div class="row">
	<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: -350px;">
		<h4>Facilidades Hotel</h4>
		<ul style="list-style: none;">
			<?php 
				foreach ($facilidades_hotel as $rowHot) {
					$sw=0;
					foreach ($rs_facilidades_hot as $rowHot_Edit){
						if($rowHot_Edit->id==$rowHot->id){ $sw=1;?>
							<li>
								<input type="checkbox" id="chk_facilidad_hotel_edit" value="<?php echo $rowHot->id?>" onclick="setFacilidadHot(this)" checked>
								<?php echo $rowHot->descripcion?>
							</li>
						<?php }
					}
					if($sw==0){?>
							<li>
								<input type="checkbox" id="chk_facilidad_hotel_edit" value="<?php echo $rowHot->id?>" onclick="setFacilidadHot(this)">
								<?php echo $rowHot->descripcion?>
							</li>
					<?php }
				}
			?>

		</ul>
	</div>	

	<div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: -350px;">
		<h4>Facilidades Habitaciones</h4>
		<ul style="list-style: none;">
			<?php 

			foreach ($facilidades_habitacion as $rowHab) {	
				$sw=0;
				foreach ($rs_facilidades_hab as $rowHab_Edit){
					
					if($rowHab_Edit->id==$rowHab->id){ $sw=1;?>
						<li>
							<input type="checkbox" id="chk_facilidad_habitacion_edit" value="<?php echo $rowHab->id?>" onclick="setFacilidadHab(this)" checked>
							<?php echo $rowHab->descripcion?>
								
						</li>
				<?php }
				}

				if($sw==0){?>
							<li>
								<input type="checkbox" id="chk_facilidad_hotel_edit" value="<?php echo $rowHot->id?>" onclick="setFacilidadHot(this)">
								<?php echo $rowHab->descripcion?>
							</li>
					<?php }
				}
			?>

		</ul>
	</div>	

</div>
</section>