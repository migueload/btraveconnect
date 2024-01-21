
<section>
	<input type="hidden" id="id_hotel" value="<?php echo $id_hotel;?>">
		<div class="row">
		<div class="col-sm-12 col-md-8 col-lg-8" style="margin-top: -350px;">
			<div class="well">
				<h4>Tarifas</h4>
				
				<div class="row">
					<div class="col-sm-12 col-md-3 col-lg-3">
						<label><span class="aterisco">*</span> Tipo</label>
						<select id="tipo_tarifa_edit" class="form-control">
							<option value="Adulto">Adulto</option>
							<option value="Ni&ntilde;o">Ni&ntilde;o</option>
							<option value="Infante">Infante</option>
						</select>
					</div>

					<div class="col-sm-12 col-md-3 col-lg-3">
						<label><span class="aterisco">*</span> Tipo de Habitacion</label>
						<select id="tipo_habitacion_edit" class="form-control">
							<option value="Individual">Individual</option>
							<option value="Doble">Doble</option>
							<option value="Triple">Triple</option>
							<option value="Cuadruple">Cuadruple</option>
						</select>
					</div>
					<?php if ( ($sw_dinamicas==0) && ($sw_manuales==0) ){?>
						<div class="col-sm-12 col-md-6 col-lg-6">
								<label><span class="aterisco">*</span> Monto de la Tarifa Publica($USD)</label>
								<input type="number" id="monto_tarifa_edit" class="form-control" style="text-align: right;">
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6">
								<label><span class="aterisco">*</span> Descripcion</label>
								<input type="text" id="descripcion_tarifa_edit" class="form-control">
						</div>
					<?php }


					if( $sw_dinamicas==1 ){?>
						<div class="col-sm-12 col-md-6 col-lg-6"></div>
						<div class="col-sm-12 col-md-6 col-lg-6"></div>
					<?php }
					if( $sw_manuales==1 ){?>
						<div class="col-sm-12 col-md-6 col-lg-6">
								<label><span class="aterisco">*</span> Monto de la Tarifa Publica($USD)</label>
								<input type="number" id="monto_tarifa_edit" class="form-control" style="text-align: right;">
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6">
								<label><span class="aterisco">*</span> Descripcion</label>
								<input type="text" id="descripcion_tarifa_edit" class="form-control">
						</div>
					<?php }?>

					

					<?php if ( ($sw_dinamicas==0) && ($sw_manuales==0) ){?>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<br><br>
						<input type="radio" name="optarifa_edit" id="optarifa_manual_edit" onclick="hidden_tarifa_dinamica_edit()" checked>&nbsp;<b>Tarifas Manuales</b>
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<br><br>
						<input type="radio" name="optarifa_edit" id="optarifa_dinamica_edit" onclick="show_tarifa_dinamica_edit()">&nbsp;<b>Tarifas Dinamicas</b>
					</div>
					<?php }

					if( $sw_dinamicas==1 ){?>
						<div class="col-sm-12 col-md-3 col-lg-3">
							<br><br>
							<input type="radio" name="optarifa_edit" id="optarifa_dinamica_edit" checked>&nbsp;<b>Tarifas Dinamicas</b>
						</div>
						<div class="col-sm-12 col-md-3 col-lg-3"></div>
					<?php }
					if( $sw_manuales==1 ){?>
						<div class="col-sm-12 col-md-3 col-lg-3"></div>
						<div class="col-sm-12 col-md-3 col-lg-3">
							<br><br>
							<input type="radio" name="optarifa_edit" id="optarifa_manual_edit" checked>&nbsp;<b>Tarifas Manuales</b>
						</div>
					<?php }?>
				</div>
	<hr>
				
	<?php if($tarifas_dinamica){?>
		<div id="config_tarifa_dinamica_edit" style="margin: 20px;">
				<h4><i class="fa fa-cog"></i>&nbsp;Configuracion de Tarifas Dinamicas</h4>
				<div class="row" >
					<div class="col-sm-12 col-md-3 col-lg-3">
						<label>Fecha de Inicio</label>
						<input type="date" id="fecha_inicio_dinamica_edit" class="form-control">
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<label>Fecha Fin</label>
						<input type="date" id="fecha_fin_dinamica_edit" class="form-control">
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<label>Monto Tarifa Publica</label>
						<input type="number" id="monto_tarifa_dinamica_edit" class="form-control" style="text-align: right;">
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<br>
						<button class="btn btn-default btn-md" onclick="addTarifaDinamica_edit()"><i class="fa fa-plus-circle"></i>&nbsp;Agregar Tarifa</button>
					</div>
				</div>
				<hr>
				<div class="row" >
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div id="divTarifaDinamica_edit">
							<?php $this->load->view('hotel/item_tarifa_dinamica_edit')?>
						</div>

					</div>
				</div>
		</div>
	<?php }else{?>

		<div id="config_tarifa_dinamica_edit" style="display: none;">
				<h4><i class="fa fa-cog"></i>&nbsp;Configuracion de Tarifas Dinamicas</h4>
				<div class="row" >
					<div class="col-sm-12 col-md-3 col-lg-3">
						<label>Fecha de Inicio</label>
						<input type="date" id="fecha_inicio_dinamica_edit" class="form-control">
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<label>Fecha Fin</label>
						<input type="date" id="fecha_fin_dinamica_edit" class="form-control">
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<label>Monto Tarifa Publica</label>
						<input type="number" id="monto_tarifa_dinamica_edit" class="form-control" style="text-align: right;">
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<br>
						<button class="btn btn-default btn-md" onclick="addTarifaDinamica_edit()"><i class="fa fa-plus-circle"></i>&nbsp;Agregar Tarifa</button>
					</div>
				</div>
				<hr>
				<div class="row" >
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div id="divTarifaDinamica_edit">
							<?php $this->load->view('hotel/item_tarifa_dinamica_edit')?>
						</div>

					</div>
				</div>
		</div>
	<?php }?>

	<?php if($tarifas_manual){?>
		<div id="config_tarifa_edit">
				<h4><i class="fa fa-cog"></i>&nbsp;Configuracion de Tarifas Manuales</h4>
				<div class="row" >
					<div class="col-sm-12 col-md-3 col-lg-3">
						<br>
						<button class="btn btn-default btn-md" onclick="addTarifaManual_edit()"><i class="fa fa-plus-circle"></i>&nbsp;Agregar Tarifa</button>
					</div>
				</div>
				<hr>
				<div class="row" >
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div id="divTarifa_edit">
							<?php $this->load->view('hotel/item_tarifa_manual_edit')?>
						</div>

					</div>
				</div>
		</div>

	<?php }else{?>
		<div id="config_tarifa_edit" style="display: none">
				<h4><i class="fa fa-cog"></i>&nbsp;Configuracion de Tarifas Manuales</h4>
				<div class="row" >
					<div class="col-sm-12 col-md-3 col-lg-3">
						<br>
						<button class="btn btn-default btn-md" onclick="addTarifaManual_edit()"><i class="fa fa-plus-circle"></i>&nbsp;Agregar Tarifa</button>
					</div>
				</div>
				<hr>
				<div class="row" >
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div id="divTarifa_edit">
							<?php $this->load->view('hotel/item_tarifa_manual_edit')?>
						</div>

					</div>
				</div>
		</div>
	<?php }?>

		</div>
	</div>
</div>	

</section>

<script type="text/javascript">

	function objetoAjax(){
    var oHttp=false;
            var asParsers=["Msxml2.XMLHTTP.5.0", "Msxml2.XMLHTTP.4.0",
            "Msxml2.XMLHTTP.3.0", "Msxml2.XMLHTTP", "Microsoft.XMLHTTP"];
            for (var iCont=0; ((!oHttp) && (iCont<asParsers.length)); iCont++){
                try{
                    oHttp=new ActiveXObject(asParsers[iCont]);
                }
                catch(e){
                    oHttp=false;
                }
            }
            if ((!oHttp) && (typeof XMLHttpRequest!='undefined')){
            oHttp=new XMLHttpRequest();
        }
    return oHttp;
  }
	function show_tarifa_dinamica_edit(){
		document.getElementById('config_tarifa_dinamica_edit').style.display="block";
		document.getElementById('config_tarifa_edit').style.display="none";
		document.getElementById('monto_tarifa_edit').disabled=true;
		document.getElementById('descripcion_tarifa_edit').disabled=true;
	}
	function hidden_tarifa_dinamica_edit(){
		document.getElementById('config_tarifa_dinamica_edit').style.display="none";
		document.getElementById('config_tarifa_edit').style.display="block";
		document.getElementById('monto_tarifa_edit').disabled=false;
		document.getElementById('descripcion_tarifa_edit').disabled=false;
	}

	function addTarifaDinamica_edit(){
		var id_hotel=document.getElementById('id_hotel').value;
		var tipo_tarifa=document.getElementById('tipo_tarifa_edit').value;
		var tipo_habitacion=document.getElementById('tipo_habitacion_edit').value;
		var fecha_inicio=document.getElementById("fecha_inicio_dinamica_edit").value;
		var fecha_fin=document.getElementById("fecha_fin_dinamica_edit").value;
		var monto=document.getElementById("monto_tarifa_dinamica_edit").value;
		if(  (fecha_inicio!="") || (fecha_fin!="") || (monto!="")){
			var base=document.getElementById('base').value;
			divResultado = document.getElementById('divTarifaDinamica_edit');  
		    ajax=objetoAjax(); 
		    var url="index.php/Main/addTarifaDinamica_edit?tipo_tarifa="+tipo_tarifa+"&tipo_habitacion="+tipo_habitacion+"&fecha_inicio="+fecha_inicio+"&fecha_fin="+fecha_fin+"&monto="+monto+"&id_hotel="+id_hotel;         
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


	function delItemTarifaDinamicaEdit(id){
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
	             var id_hotel=document.getElementById('id_hotel').value;
	            var url="index.php/Main/delItemTarifaDinamica_edit?id="+id+"&id_hotel="+id_hotel;  
	            var URL=base+url;
	            ajax.open("GET", URL);
	            divResultado = document.getElementById('divTarifaDinamica_edit');
	            ajax.onreadystatechange=function() {
	                if (ajax.readyState==4) {
	                  divResultado.innerHTML = ajax.responseText
	                }
	            }
	            ajax.send(null)
	      } 
	    });
	}


	function addTarifaManual_edit(){
		var id_hotel=document.getElementById('id_hotel').value;
		var tipo_tarifa=document.getElementById('tipo_tarifa_edit').value;
		var tipo_habitacion=document.getElementById('tipo_habitacion_edit').value;
		var descripcion=document.getElementById("descripcion_tarifa_edit").value;
		var monto=document.getElementById("monto_tarifa_edit").value;
		if( descripcion!="" ){
			var base=document.getElementById('base').value;
			divResultado = document.getElementById('divTarifa_edit');  
		    ajax=objetoAjax(); 
		    var url="index.php/Main/addTarifaManual_edit?tipo_tarifa="+tipo_tarifa+"&tipo_habitacion="+tipo_habitacion+"&monto="+monto+"&descripcion="+descripcion+"&id_hotel="+id_hotel;         
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


	function delItemTarifaManualEdit(id){
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
	            var id_hotel=document.getElementById('id_hotel').value;
	            var url="index.php/Main/delItemTarifaManual_edit?id="+id+"&id_hotel="+id_hotel;  
	            var URL=base+url;
	            ajax.open("GET", URL);
	            divResultado = document.getElementById('divTarifa_edit');
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