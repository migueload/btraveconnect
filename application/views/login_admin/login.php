<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BtravelConnect</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-color: #fff;">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url()?>assets/img/logo.jpg" width="50%"><br>    
  </div>
  <!-- /.login-logo -->
  <form id="form_auth" method="post" action="<?php echo base_url()?>index.php/Main/authentication">
  <div class="login-box-body">    
  <p class="login-box-msg">Ingrese Datos de Autenticaci&oacute;n</p>
      <div class="form-group has-feedback">
        <input type="text" name="username" id="username" class="form-control" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    <div class="social-auth-links text-center">
      <a href="#" onclick="authentication()">
      <div class="btn btn-primary btn-sm" style="background-color: #2f5aa6">Entrar</div>
      </a>
    </div> 
    <div id="mensaje"></div>
    <hr>
    <p class="login-box-msg">BTravelConnect V 0.1</p>   
  </div>
</form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.0/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
 function authentication(){
    var usuario=document.getElementById('username').value;
    var clave=document.getElementById('password').value;
    if(usuario!="" && clave!=""){
        document.getElementById('form_auth').submit();
    }else{
        swal("Validacion","Los datos de autenticacion son obligatorios","error");
    }
}
</script>
</script>
</html>

