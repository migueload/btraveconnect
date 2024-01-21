
<!DOCTYPE html>
<html>
<?php
    $this->load->view('header/header');
    $this->load->view('menu/menu');
?>
  
<style type="text/css">
  .aterisco{
    color: #2f5aa6;
    font-size: 18px;
  }
</style>
  <div class="content-wrapper">
    <section class="content-header">
      <br>
      <h4>
        <i class="fa fa-building"></i>&nbsp;
        Hotel: <b><?php echo $rs->nombre;?></b>
      </h4>

      <div id="mensaje" class="alert alert-default" style="background-color: #CEECF5;margin-top: 20px">
        <div style="text-align: right;width: 100%;">
          <a href="#" onclick="cerrarAlert()">
            <i class="fa fa-times-circle" style="font-size: 16px;color: #2f5aa6;"></i>
          </a>
        </div>
        <div style="margin-top: -20px;color: #2f5aa6;">
            <strong><i class="fa fa-info" style="font-size: 18px;"></i></strong> 
            Puede realizar modificaciones en la informaci&oacute;n del hotel y al finalizar hacer click en el boton <b>Modificar</b>.
        </div>
      </div>


    </section>
    <section class="content" style="margin-top: 20px">
      <input type="hidden" id="base" value="<?php echo base_url();?>">
      <div style="margin-bottom: 10px;">
        <button class="btn btn-default btn-md" onclick="save()"><i class="fa fa-edit"></i>&nbsp;Modificar</button>
      </div>
        <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1" style="background-color: #2f5aa6;color: #fff;font-size: 16px;">
           <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist" style="background-color: #2f5aa6;">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-info" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><i class="fa fa-file-text"></i> Informacion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-facilidades" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><i class="fa fa-tag"></i> Facilidades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-tarifas" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false"><i class="fa fa-dollar"></i> Tarifas</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-documents-tab" data-toggle="pill" href="#custom-tabs-one-imagenes" role="tab" aria-controls="custom-tabs-one-documents" aria-selected="false"><i class="fa fa-image"></i> Imagenes</a>
              </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <!-- Panel Operadora-->
                <div class="tab-pane fade show active" id="custom-tabs-one-info" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <?php $this->load->view('hotel/informacion_edit');?>
                 </div> 
                <!-- fin  de tab de operadora-->

                  <!-- Panel Hotel-->
                  <div class="tab-pane fade" id="custom-tabs-one-facilidades" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <?php $this->load->view('hotel/facilidades_edit');?>
                  </div>
                   <!-- fin  de tab de Agencia-->

                  <!-- Panel Agencia-->
                  <div class="tab-pane fade" id="custom-tabs-one-tarifas" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <?php $this->load->view('hotel/tarifas_edit');?>
                 </div>
                   <!-- fin  de tab de Hotel-->

                   <!-- Panel Documentos-->
                  <div class="tab-pane fade" id="custom-tabs-one-imagenes" role="tabpanel" aria-labelledby="custom-tabs-one-documents-tab">
                    <?php $this->load->view('hotel/imagenes_edit');?>
                  </div>
                   <!-- fin  de tab de Documentos-->


            </div>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('footer/footer');?>
<script type="text/javascript">

  const facilidadesHot=[];
  const facilidadesHab=[];
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

  function save(){
    var nombre=document.getElementById('nombre').value;
    var categoria=document.getElementById('categoria').value;
    var pais=document.getElementById('pais').value;
    var ciudad=document.getElementById('ciudad').value;
    var email_reservas=document.getElementById('email_reservas').value;
    var email_publico=document.getElementById('email_publico').value;
    var codigo_postal=document.getElementById('codigo_postal').value;
    var telefono=document.getElementById('telefono').value;
    var hora_entrada=document.getElementById('hora_entrada').value;
    var hora_salida=document.getElementById('hora_salida').value;
    var habitaciones=document.getElementById('habitaciones').value;
    var restaurantes=document.getElementById('restaurantes').value;
    var descripcion=document.getElementById('descripcion').value;
    var direccion=document.getElementById('direccion').value;
    var latitud=document.getElementById('latitud').value;
    var longitud=document.getElementById('longitud').value;
    if( (nombre!="") || (pais!=0) ){
        ajax=objetoAjax(); 
        var base=document.getElementById('base').value;         
        var URL="index.php/Main/saveHotel?nombre="+nombre+"&categoria="+categoria+"&pais="+pais;
        URL=base+URL;
        ajax.open("GET", URL);  
        ajax.onreadystatechange=function() {
            if (ajax.readyState==4) {
              console.log(facilidadesHot);
              console.log(facilidadesHab);
             swal("Exito!","Se guardo la informacion","success");
            }
        }
        ajax.send(null) 
    }else{
      swal("Validacion!","Los Datos con * son obligatorios","error");
    }

  }

  function setFacilidadHot(object){
    facilidadesHot.push(object.value);
  }

   function setFacilidadHab(object){
    facilidadesHab.push(object.value);
  }

   function cerrarAlert(){
    document.getElementById('mensaje').style.display="none";
  }
</script>

</body>
