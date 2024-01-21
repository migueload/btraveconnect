<section style="margin-top: 50px;">
	<h4>Informacion</h4>
	<div class="row">
		<div class="col-sm-6 col-md-3 col-lg-3">
			<label><span class="aterisco">*</span> Nombre del Hotel</label>
			<input id="nombre" type="text" class="form-control">
		</div>

		<div class="col-sm-6 col-md-3 col-lg-3">
			<label><span class="aterisco">*</span> Seleccione Categoria</label>
			<select id="categoria" class="form-control">
				<option value="1">Una Estrella</option>
				<option value="2">Dos Estrellas</option>
				<option value="3">Tres Estrellas</option>
				<option value="4">Cuatro Estrellas</option>
				<option value="5">Cinco Estrellas</option>
			</select>
		</div>

		<div class="col-sm-6 col-md-3 col-lg-3">
			<label><span class="aterisco">*</span> Pais</label>
			<select id="pais" class="form-control" onchange="loadCity(this)">
				<option value="0">Ninguno</option>
				<?php foreach ($paises as $pais) {?>
					<option value="<?php echo $pais->id?>"><?php echo $pais->nombre?></option>
				<?php }?>
			</select>
		</div>

		<div class="col-sm-6 col-md-3 col-lg-3" id="divCity">
			<?php $this->load->view('hotel/ciudad')?>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-6 col-md-3 col-lg-3">
			<label><span class="aterisco">*</span> E-mail Reservas</label>
			<input type="email" id="email_reservas" class="form-control">
		</div>
		<div class="col-sm-6 col-md-3 col-lg-3">
			<label>E-mail Publico</label>
			<input type="email" id="email_publico" class="form-control">
		</div>
		<div class="col-sm-6 col-md-2 col-lg-3">
			<label>Codigo Postal</label>
			<input type="text" id="codigo_postal" class="form-control">
		</div>
		<div class="col-sm-6 col-md-3 col-lg-3">
			<label>Telefono</label>
			<input type="text" id="telefono" class="form-control">
		</div>
	</div>



	<div class="row">
		<div class="col-sm-6 col-md-3 col-lg-3">
			<label><span class="aterisco">*</span> Hora de Entrada</label>
			<input type="time" id="hora_entrada" class="form-control">
		</div>
		<div class="col-sm-6 col-md-3 col-lg-3">
			<label><span class="aterisco">*</span> Hora de Salida</label>
			<input type="time" id="hora_salida" class="form-control">
		</div>
		<div class="col-sm-6 col-md-2 col-lg-3">
			<label><span class="aterisco">*</span> Cantidad de Habitaciones</label>
			<input type="number" id="habitaciones" class="form-control">
		</div>
		<div class="col-sm-6 col-md-3 col-lg-3">
			<label>Nro. Restaurantes</label>
			<input type="number" id="restaurantes" class="form-control">
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<label><span class="aterisco">*</span> Descripcion del Hotel</label>
			<textarea id="descripcion" class="form-control"></textarea>
		</div>
	</div>


		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6">
				<label>Direccion en el mapa</label>
				<input type="text" id="direccion" class="form-control">
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3">
				<label>Latitud</label>
				<input type="text" id="latitud" class="form-control">
			</div>
			<div class="col-sm-3 col-md-2 col-lg-3">
				<label>Longitud</label>
				<input type="text" id="longitud" class="form-control">
			</div>
		
		</div>

</section>

<script type="text/javascript">



function loadCity(id_pais){
    var base=document.getElementById('base').value;
    divResultado = document.getElementById('divCity');  
    ajax=objetoAjax(); 
    var url="index.php/Main/loadCity?id="+id_pais.value;         
    var URL=base+url;
    ajax.open("GET", URL);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divResultado.innerHTML = ajax.responseText
        }
    }
    ajax.send(null)
}
</script>