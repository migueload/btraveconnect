
<style type="text/css">
  .aterisco{
    color: #2f5aa6;
    font-size: 18px;
  }
</style>
<input type="hidden" id="base" value="<?php echo base_url()?>">
<section class="content-header">
    <h4><i class="fa fa-list"></i>&nbsp;Lista de Usuarios</h4>
    <div style="margin-bottom: 20px">
      <a href="#" data-toggle="modal" data-target="#new_usuario">
      <button class="btn btn-md btn-default" style="margin-bottom: 10px;margin-top: 20px"><i class="fa fa-plus-circle"></i>&nbsp;Agregar Usuario</button>
    </a>
      <div class="well" id="show_list">
        <?php $this->load->view('configuracion/item')?>
    </div>
  </div>
</section>


<!--NUEVO USUARIO-->
<div id="new_usuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><i class="fa fa-plus-circle"></i>&nbsp;Nuevo Usuario </h3>
      </div>
      
      <div class="modal-body">
          
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <span style="font-weight: bold;"> USERNAME &nbsp;&nbsp;</span>
              <input type="text" id="login" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <span style="font-weight: bold;"> E-MAIL: &nbsp;&nbsp;</span>
              <input type="text" id="email" class="form-control">
            </div>
          </div>
          <div class="row">
             <div class="col-sm-12 col-md-12 col-lg-12">
              <span style="font-weight: bold;">PASSWORD&nbsp;&nbsp;</span>
              <input type="password" id="password" class="form-control">
              </div>
          </div>
          <div class="row">
             <div class="col-sm-12 col-md-12 col-lg-12">
              <span style="font-weight: bold;">CONFIRMAR PASSWORD&nbsp;&nbsp;</span>
              <input type="password" id="re_password" class="form-control">
              </div>
          </div>
    </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-sm" data-dismiss="modal" style="background-color: #2f5aa6;color: #fff;" onclick="saveUser()">Guardar&nbsp;<i class="fa fa-plus-circle"></i></button>
          <button type="button" class="btn btn-sm" data-dismiss="modal" style="background-color: #707070;color: #fff;">Cerrar&nbsp;<i class="fa fa-times-circle"></i></button>
      </div>
    </div>
  </div>
</div>



<!--EDITAR USUARIO-->
<div id="edit_usuario" class="modal fade" role="dialog">
  <input type="hidden" id="id_edit">
  <input type="hidden" id="password_aux">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><i class="fa fa-plus-circle"></i>&nbsp;Modificar Usuario Administrador</h3>
      </div>
      
      <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <span style="font-weight: bold;"> USERNAME &nbsp;&nbsp;</span>
              <input type="text" id="login_edit" class="form-control">
            </div>
          </div>

           <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <span style="font-weight: bold;"> E-MAIL &nbsp;&nbsp;</span>
              <input type="text" id="email_edit" class="form-control">
            </div>
          </div>

          <div class="row">
             <div class="col-sm-12 col-md-12 col-lg-12">
              <span style="font-weight: bold;">PASSWORD&nbsp;&nbsp;</span>
              <input type="password" id="password_edit" class="form-control">
              </div>
          </div>
          <div class="row">
             <div class="col-sm-12 col-md-12 col-lg-12">
              <span style="font-weight: bold;">CONFIRMAR PASSWORD&nbsp;&nbsp;</span>
              <input type="password" id="re_password_edit" class="form-control">
              </div>
          </div>
      

           <div class="row">
             <div class="col-sm-12 col-md-12 col-lg-12">
                <span style="font-weight: bold;"> STATUS&nbsp;&nbsp;</span>
                <select id="status_edit" class="form-control">
                  <option value="1">Activado</option>
                  <option value="0">Desactivado</option>
                </select>
              </div>
          </div>
    </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-sm" data-dismiss="modal" style="background-color: #2f5aa6;color: #fff;" onclick="editUser()">Modificar&nbsp;<i class="fa fa-plus-circle"></i></button>
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


  function delUsuario(id){
    swal({
      title: "¿Estas Seguro?",
      text: "de eliminar este usuario!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
            ajax=objetoAjax(); 
            var base=document.getElementById('base').value;
            var url="index.php/Main/deleteUsuarioAdmin?id="+id;  
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

function saveUser(){
    var login=document.getElementById('login').value;
    var email=document.getElementById('email').value;
    var password=document.getElementById('password').value;
    var re_password=document.getElementById("re_password").value;
    var nivel=0;
    if( login!=""  ){
      if(password==re_password){
        var base=document.getElementById('base').value;
        divResultado = document.getElementById('show_list');  
          ajax=objetoAjax(); 
          var url="index.php/Main/saveUserAdmin?login="+login+"&password="+password+"&nivel="+nivel+"&email="+email;         
          var URL=base+url;
          ajax.open("GET", URL);
          ajax.onreadystatechange=function() {
              if (ajax.readyState==4) {
                  divResultado.innerHTML = ajax.responseText
              }
          }
          ajax.send(null)
      }else{
        swal("Validacion!","El password no coincide con la confirmacion!","error");
      } 
       
    }else{
        swal("Validacion!","Los datos de: Username y password son Obligatorios!","error");
    }
  }

  function setEdit(id, username, email , status, password){
    document.getElementById('id_edit').value=id;
    document.getElementById('password_aux').value=password;
    document.getElementById('login_edit').value=username;
    document.getElementById('email_edit').value=email;
    document.getElementById('status_edit').value=status;
    document.getElementById('password_edit').value=password;
    document.getElementById('re_password_edit').value=password;

  }


  function editUser(){
    var id_edit=document.getElementById('id_edit').value;
    var password_aux=document.getElementById('password_aux').value;
    var login=document.getElementById('login_edit').value;
    var email=document.getElementById('email_edit').value;
    var password=document.getElementById('password_edit').value;
    var re_password=document.getElementById("re_password_edit").value;
    var status=document.getElementById("status_edit").value;
    if( login!=""  ){
      if(password==re_password){
        var base=document.getElementById('base').value;
        divResultado = document.getElementById('show_list');  
          ajax=objetoAjax(); 
          var url="index.php/Main/editUserAdmin?login="+login+"&password="+password+"&email="+email+"&status="+status+"&id="+id_edit+"&pwd="+password_aux;         
          var URL=base+url;
          ajax.open("GET", URL);
          ajax.onreadystatechange=function() {
              if (ajax.readyState==4) {
                  divResultado.innerHTML = ajax.responseText
              }
          }
          ajax.send(null)
      }else{
        swal("Validacion!","El password no coincide con la confirmacion!","error");
      } 
       
    }else{
        swal("Validacion!","Los datos de: Username y password son Obligatorios!","error");
    }
  }


</script>

