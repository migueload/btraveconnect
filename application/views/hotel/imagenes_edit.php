<style type="text/css">
	#imagePreview{
		width: 50%;
	}
</style>
<section>
	
	
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-6" style="margin-top: -350px">
			<form id="form_imagen" method="post" action="<?php echo base_url()?>index.php/Main/uploadImage" enctype="multipart/form-data">
			<input type="hidden" name="id_hotel" id="id_hotel" value="<?php echo $id_hotel?>">
			<table class="table table-condensed">
				<tr>
					<td colspan="3"><h4>Imagenes del Hotel</h4></td>
				</tr>
				<tr>
					<td><input type="file" id="imagen" name="userfile" class="form-control"></td>
					<td>
						 <div id="ImagePreview">
			                <img id="imagePreview">
			            </div>
					</td>
					<td>
						<input type="submit" class="form-control btn-primary" name="submit" value="Agregar Imagen" onclick="test()">
					</td>
				</tr>
			</table>
			</form>
		</div>
	</div>
	<hr>

	<div class="well" style="margin-top: -100px" id="showImagenes">
		<?php $this->load->view('hotel/show_imagenes');?>
	</div>

</section>

<script type="text/javascript">
	document.getElementById('imagen').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (!file) return;
    const validExtensions = ['image/png', 'image/jpeg'];
    if (!validExtensions.includes(file.type)) {
        swal("Validacion!","Por favor, seleccione una imagen en formato .png o .jpg","error");
        return;
    }
    const reader = new FileReader();
    reader.onload = function (e) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = e.target.result;
    };

    reader.readAsDataURL(file); 
});




</script>