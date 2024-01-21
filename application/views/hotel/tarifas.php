<section>
	<div class="row">
		<div class="col-sm-12 col-md-8 col-lg-8" style="margin-top: -350px;">
			<div class="well">
				<h4>Tarifas</h4>

				<div class="row">


					<div class="col-sm-12 col-md-3 col-lg-3">
						<label><span class="aterisco">*</span> Tipo</label>
						<select id="tipo_tarifa" class="form-control">
							<option value="Adulto">Adulto</option>
							<option value="Ni&ntilde;o">Ni&ntilde;o</option>
							<option value="Infante">Infante</option>
						</select>
					</div>


					<div class="col-sm-12 col-md-3 col-lg-3">
						<label><span class="aterisco">*</span> Tipo de Habitacion</label>
						<select id="tipo_habitacion" class="form-control">
							<option value="Individual">Individual</option>
							<option value="Doble">Doble</option>
							<option value="Triple">Triple</option>
							<option value="Cuadruple">Cuadruple</option>
						</select>
					</div>

					<div class="col-sm-12 col-md-6 col-lg-6">
						<label><span class="aterisco">*</span> Monto de la Tarifa Publica($USD)</label>
						<input type="number" id="monto_tarifa" class="form-control" style="text-align: right;">
					</div>

					<div class="col-sm-12 col-md-6 col-lg-6">
						<label><span class="aterisco">*</span> Descripcion</label>
						<input type="text" id="descripcion_tarifa" class="form-control">
					</div>

					<div class="col-sm-12 col-md-3 col-lg-3">
						<br><br>
						<input type="radio" name="optarifa" checked onclick="hidden_tarifa_dinamica()" id="optarifa_manual">&nbsp;<b>Tarifas Manuales</b>
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<br><br>
						<input type="radio" name="optarifa" onclick="show_tarifa_dinamica()" id="optarifa_dinamica">&nbsp;<b>Tarifas Dinamicas</b>
					</div>

				</div>

				<hr>

				<div id="config_tarifa">
						<h4><i class="fa fa-cog"></i>&nbsp;Configuracion de Tarifas Manuales</h4>
						<div class="row" >
							<div class="col-sm-12 col-md-3 col-lg-3">
								<br>
								<button class="btn btn-default btn-md" onclick="addTarifaManual()"><i class="fa fa-plus-circle"></i>&nbsp;Agregar Tarifa</button>
							</div>
						</div>
						<hr>
						<div class="row" >
							<div class="col-sm-12 col-md-12 col-lg-12">
								<div id="divTarifa">
									<?php $this->load->view('hotel/item_tarifa_manual')?>
								</div>

							</div>
						</div>
				</div>


				<div id="config_tarifa_dinamica" style="display: none;">
						<h4><i class="fa fa-cog"></i>&nbsp;Configuracion de Tarifas Dinamicas</h4>
						<div class="row" >
							<div class="col-sm-12 col-md-3 col-lg-3">
								<label>Fecha de Inicio</label>
								<input type="date" id="fecha_inicio_dinamica" class="form-control">
							</div>
							<div class="col-sm-12 col-md-3 col-lg-3">
								<label>Fecha Fin</label>
								<input type="date" id="fecha_fin_dinamica" class="form-control">
							</div>
							<div class="col-sm-12 col-md-3 col-lg-3">
								<label>Monto Tarifa Publica</label>
								<input type="number" id="monto_tarifa_dinamica" class="form-control" style="text-align: right;">
							</div>
							<div class="col-sm-12 col-md-3 col-lg-3">
								<br>
								<button class="btn btn-default btn-md" onclick="addTarifaDinamica()"><i class="fa fa-plus-circle"></i>&nbsp;Agregar Tarifa</button>
							</div>
						</div>
						<hr>
						<div class="row" >
							<div class="col-sm-12 col-md-12 col-lg-12">
								<div id="divTarifaDinamica">
									<?php $this->load->view('hotel/item_tarifa_dinamica')?>
								</div>

							</div>
						</div>
				</div>

				
			</div>
		</div>
	</div>

</section>
<script type="text/javascript">

	function show_tarifa_dinamica(){
		document.getElementById('config_tarifa_dinamica').style.display="block";
		document.getElementById('config_tarifa').style.display="none";
		document.getElementById('monto_tarifa').disabled=true;
		document.getElementById('descripcion_tarifa').disabled=true;
	}
	function hidden_tarifa_dinamica(){
		document.getElementById('config_tarifa_dinamica').style.display="none";
		document.getElementById('config_tarifa').style.display="block";
		document.getElementById('monto_tarifa').disabled=false;
		document.getElementById('descripcion_tarifa').disabled=false;
	}

	function addTarifaDinamica(){
		var tipo_tarifa=document.getElementById('tipo_tarifa').value;
		var tipo_habitacion=document.getElementById('tipo_habitacion').value;
		var fecha_inicio=document.getElementById("fecha_inicio_dinamica").value;
		var fecha_fin=document.getElementById("fecha_fin_dinamica").value;
		var monto=document.getElementById("monto_tarifa_dinamica").value;
		if(  (fecha_inicio!="") || (fecha_fin!="") || (monto!="")){
			var base=document.getElementById('base').value;
			divResultado = document.getElementById('divTarifaDinamica');  
		    ajax=objetoAjax(); 
		    var url="index.php/Main/addTarifaDinamica?tipo_tarifa="+tipo_tarifa+"&tipo_habitacion="+tipo_habitacion+"&fecha_inicio="+fecha_inicio+"&fecha_fin="+fecha_fin+"&monto="+monto;         
		    var URL=base+url;
		    ajax.open("GET", URL);
		    ajax.onreadystatechange=function() {
		        if (ajax.readyState==4) {
		            divResultado.innerHTML = ajax.responseText
		        }
		    }
		    ajax.send(null)
		 }else{
		 	swal("Validacion!","Los datos de: Fecha de Incio, Fecha Fin y Monto de Tarifa Publica son Obligatorios!","error");
		 }
	}


	function delItemTarifaDinamica(id){
	    swal({
	      title: "¿Estas Seguro?",
	      text: "de eliminar esta tarifa dinamica!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	            ajax=objetoAjax(); 
	            var base=document.getElementById('base').value;
	            var url="index.php/Main/delItemTarifaDinamica?id="+id;  
	            var URL=base+url;
	            ajax.open("GET", URL);
	            divResultado = document.getElementById('divTarifaDinamica');
	            ajax.onreadystatechange=function() {
	                if (ajax.readyState==4) {
	                  divResultado.innerHTML = ajax.responseText
	                }
	            }
	            ajax.send(null)
	      } 
	    });
	}


	function addTarifaManual(){
		var tipo_tarifa=document.getElementById('tipo_tarifa').value;
		var tipo_habitacion=document.getElementById('tipo_habitacion').value;
		var monto=document.getElementById("monto_tarifa").value;
		var descripcion=document.getElementById("descripcion_tarifa").value;
		if( (monto!="") || (descripcion!="")  ){
			var base=document.getElementById('base').value;
			divResultado = document.getElementById('divTarifa');  
		    ajax=objetoAjax(); 
		    var url="index.php/Main/addTarifaManual?tipo_tarifa="+tipo_tarifa+"&tipo_habitacion="+tipo_habitacion+"&descripcion="+descripcion+"&monto="+monto;         
		    var URL=base+url;
		    ajax.open("GET", URL);
		    ajax.onreadystatechange=function() {
		        if (ajax.readyState==4) {
		            divResultado.innerHTML = ajax.responseText
		        }
		    }
		    ajax.send(null)
		 }else{
		 	swal("Validacion!","Los datos de: Descripcion y Monto de Tarifa Publica son Obligatorios!","error");
		 }
	}


	function delItemTarifaManual(id){
	    swal({
	      title: "¿Estas Seguro?",
	      text: "de eliminar esta tarifa manual!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	            ajax=objetoAjax(); 
	            var base=document.getElementById('base').value;
	            var url="index.php/Main/delItemTarifaManual?id="+id;  
	            var URL=base+url;
	            ajax.open("GET", URL);
	            divResultado = document.getElementById('divTarifa');
	            ajax.onreadystatechange=function() {
	                if (ajax.readyState==4) {
	                  divResultado.innerHTML = ajax.responseText
	                }
	            }
	            ajax.send(null)
	      } 
	    });
	}
</script>