
<!DOCTYPE html>
<html>
<?php
    $this->load->view('header/header');
    $this->load->view('menu/menu');

    function estrellas($cat){
      if($cat==1){ return  "<i class='fa fa-star'></i>";}
      if($cat==2){ return  "<i class='fa fa-star'></i><i class='fa fa-star'></i>";}
      if($cat==3){ return  "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";}
      if($cat==4){ return  "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";}
      if($cat==5){ return  "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";}
    }


?>
  
<style type="text/css">
  .aterisco{
    color: #2f5aa6;
    font-size: 18px;
  }
  .fa-star{
    color: #2f5aa6;
  }
</style>
  <input type="hidden" id="base" value="<?php echo base_url()?>">
  <div class="content-wrapper">
    <section class="content-header">
    <h4><i class="fa fa-list"></i>&nbsp;Lista de Hoteles</h4>
    <div style="margin-bottom: 20px">
      <a href="<?php echo base_url()?>index.php/Main/new_hotel">
      <button class="btn btn-md btn-default" style="margin-bottom: 10px;margin-top: 20px"><i class="fa fa-plus-circle"></i>&nbsp;Agregar Hotel</button>
    </a>
      <div class="well" id="show_list">
        <table id="myTable" width="100%" class="table table-condensed table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Categoria</th>
              <th>Pais</th>
              <th>E-Mail</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($rs as $row) { ?>
              <tr>
                <td><?php echo strtoupper($row->nombre)?></td>
                <td><?php echo estrellas($row->categoria);?></td>
                <td><?php echo strtoupper($row->pais)?></td>
                <td><?php echo strtoupper($row->emailreservas)?></td>
                <td>
                  <button class="btn btn-sm" style="background-color: #2f5aa6;color: #fff" data-toggle="modal" data-target="#show_hotel" onclick="show_hotel('<?php echo $row->id?>')"><i class="fa fa-list"></i></button>
                </td>
                <td>
                  <a href="<?php echo base_url()."index.php/Main/edit_hotel?id=".$row->id;?>">
                  <button class="btn btn-sm" style="background-color: #2f5aa6;color: #fff" data-toggle="modal" data-target="#"><i class="fa fa-edit"></i></button>
                </a>
                </td>
                <td>
                  <button class="btn btn-sm" style="background-color: #2f5aa6;color: #fff" onclick="delHotel('<?php echo $row->id?>')"><i class="fa fa-times-circle"></i></button>
                </td>
              </tr>
            <?php }
          ?>
          </tbody>
        </table>
    </div>
</div>


<!--MODAL VER DE AGENCIA-->
<div id="show_hotel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-list"></i>&nbsp;Ver Hotel</h5>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <span style="font-weight: bold;"> NOMBRE: &nbsp;&nbsp;</span>
            <span id="show_nombre_hotel"></span>
          </div>
          <div class="row">
            <span style="font-weight: bold;">CATEGORIA:&nbsp;&nbsp;</span>
            <span id='show_categoria_hotel'></span>
          </div>
          <div class="row">
            <span style="font-weight: bold;"> PA&Iacute;S:&nbsp;&nbsp;</span>
            <span id="show_pais_hotel"></span>
          </div>
          <div class="row">
            <span style="font-weight: bold;"> CIUDAD:&nbsp;&nbsp;</span>
            <span id="show_ciudad_hotel"></span>
          </div>

          <div class="row">
            <span style="font-weight: bold;"> HORA DE ENTRADA:&nbsp;&nbsp;</span>
            <span id="show_hora_entrada_hotel"></span>
         </div>

        <div class="row">
            <span style="font-weight: bold;"> HORA DE SALIDA:&nbsp;&nbsp;</span>
            <span id="show_hora_salida_hotel"></span>
        </div>

          <div class="row">
            <span style="font-weight: bold;"> DIRECCI&Oacute;N:&nbsp;&nbsp;</span>
            <span id="show_direccion_hotel"></span>
          </div>

          <div class="row">
            <span style="font-weight: bold;"> CODIGO POSTAL:&nbsp;&nbsp;</span>
            <span id="show_cp_hotel"></span>
          </div>

          <div class="row">
            <span style="font-weight: bold;"> TELEFONO:&nbsp;&nbsp;</span>
            <span id="show_telefono_hotel"></span>
          </div>
     
        <div class="row">
            <span style="font-weight: bold;"> FAX:&nbsp;&nbsp;</span>
            <span id="show_fax_hotel"></span>
        </div>

        <div class="row">
            <span style="font-weight: bold;"> E-MAIL RESERVAS:&nbsp;&nbsp;</span>
            <span id="show_email_reservas_hotel"></span>
        </div>

        <div class="row">
            <span style="font-weight: bold;"> E-MAIL PUBLICO:&nbsp;&nbsp;</span>
            <span id="show_email_publico_hotel"></span>
        </div>

        <div class="row">
            <span style="font-weight: bold;"> DESCRIPCI&Oacute;N:&nbsp;&nbsp;</span>
            <span id="show_descripcion_hotel"></span>
        </div>

        <div class="row">
            <span style="font-weight: bold;"> NUMERO DE RESTAURANTES:&nbsp;&nbsp;</span>
            <span id="show_restaurant_hotel"></span>
        </div>

      </div>
      <hr>

       <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
              <table class="table table-condensed">
                <tr style="background-color: #2f5aa6;color: #fff;">
                  <td><span style="font-weight: bold;">FACILIDADES DEL HOTEL</span></td>
                  <td><span style="font-weight: bold;"> FACILIDADES DE LAS HABITACIONES</span></td>
                </tr>
                <tr>
                  <td><div id="list_facilidades_hotel"></div></td>
                  <td><div id="list_facilidades_habitaciones"></div></td>
                </tr>
              </table>
            </div>
        </div>


      <div class="modal-footer">
          <button type="button" class="btn btn-sm" data-dismiss="modal" style="background-color: #707070;color: #fff;">Cerrar&nbsp;<i class="fa fa-times-circle"></i></button>
      </div>
    </div>
  </div>
</div>

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

  function show_facilidades_habitacion(id){
    var base=document.getElementById('base').value;
    var url="index.php/Main/getFacilidadesHab?id="+id;
    var URL=base+url;
    fetch(URL)
      .then(response => response.text())
      .then(data => {
        let facilidades=JSON.parse(data);
        var fac_hab=document.getElementById('list_facilidades_habitaciones');
        fac_hab.innerHTML="<ul>";
        for (i of facilidades) {
          fac_hab.innerHTML+="<li>"+i.descripcion+"</li>";
        }
        fac_hab.innerHTML+="</ul>";

    });
  }

   function show_facilidades_hotel(id){
    var base=document.getElementById('base').value;
    var url="index.php/Main/getFacilidadesHot?id="+id;
    var URL=base+url;
    fetch(URL)
      .then(response => response.text())
      .then(data => {
        let facilidades=JSON.parse(data);
        var fac_hot=document.getElementById('list_facilidades_hotel');
        fac_hot.innerHTML="<ul>";
        for (i of facilidades) {
          fac_hot.innerHTML+="<li>"+i.descripcion+"</li>";
        }
        fac_hot.innerHTML+="</ul>";
    });
  }


  function show_hotel(id){
    var base=document.getElementById('base').value;
    var url="index.php/Main/getHotelByIdNOAUTH?id="+id;
    var URL=base+url;
    fetch(URL)
      .then(response => response.text())
      .then(data => {
        let hotel=JSON.parse(data);
        document.getElementById('show_nombre_hotel').innerHTML=hotel.nombre;
        document.getElementById('show_categoria_hotel').innerHTML=hotel.categoria+" Estrellas";
        document.getElementById('show_pais_hotel').innerHTML=hotel.pais;
        document.getElementById('show_ciudad_hotel').innerHTML=hotel.ciudad;
        document.getElementById('show_hora_entrada_hotel').innerHTML=hotel.hentrada;
        document.getElementById('show_hora_salida_hotel').innerHTML=hotel.hsalida;
        document.getElementById('show_direccion_hotel').innerHTML=hotel.direccion;
        document.getElementById('show_cp_hotel').innerHTML=hotel.codigopostal;
        document.getElementById('show_telefono_hotel').innerHTML=hotel.telefono;
        document.getElementById('show_fax_hotel').innerHTML=hotel.fax;
        document.getElementById('show_email_reservas_hotel').innerHTML=hotel.emailreservas;
        document.getElementById('show_email_publico_hotel').innerHTML=hotel.emailpublico;
        document.getElementById('show_descripcion_hotel').innerHTML=hotel.descripcion_hotel;
        document.getElementById('show_restaurant_hotel').innerHTML=hotel.restaurante;
        show_facilidades_hotel(id);
        show_facilidades_habitacion(id);
    });

  }

  function delHotel(id){
    swal({
      title: "¿Estas Seguro?",
      text: "de eliminar este hotel!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
            ajax=objetoAjax(); 
            var base=document.getElementById('base').value;
            var url="index.php/Main/deleteHotel?id="+id;  
            var URL=base+url;
            ajax.open("GET", URL);
            ajax.onreadystatechange=function() {
                if (ajax.readyState==4) {
                  document.location.reload();
                }
            }
            ajax.send(null)
      } 
    });
}

</script>

<?php $this->load->view('footer/footer');?>
