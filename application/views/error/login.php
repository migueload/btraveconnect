
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
  <div>
    <h3> El login  el password es incorrecto!</h3>
  </div>
<br>
 <div style="width: 100%;text-align: center;padding-right: 10px;">
  <a href="<?php echo base_url()?>index.php/Main/index" class="waves-effect waves-light btn mt-5 border-radius-4"> Volver</a>
</div>
    </div>
    <hr>
    <p class="login-box-msg">BTravelConnect V 0.1</p>   
  </div>
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


