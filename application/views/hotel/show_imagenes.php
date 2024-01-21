<div class="row">

	<?php 
	foreach ($imagenes as $row) {
		$tipo=$row->tipo;
		$nombre=$row->nombre;
		$contenido=$row->contenido;
		$foto="data:".$tipo.";base64,".$contenido;
	?>
		<div class="col-sm-3 col-md-3 col-lg-3">
			<div style="text-align: right;">
				<a href="#" onclick="delImagen('<?php echo $row->id?>')">
					<i class="fa fa-times-circle" style="font-size: 18px;"></i>
				</a>
			</div>
			<img src=<?php echo $foto;?> alt="<?php echo $nombre?>" style="width: 100%;">
		</div>
	<?php }?>
	</div>
</div>