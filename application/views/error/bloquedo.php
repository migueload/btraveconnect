<?php
$this->load->view('header/header');
?>
<div class="container" style="text-align:center;">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div style="text-align: center;">
              <span style="font-size: 38px;font-weight: bold;font-family: verdana;">SloanVentas</span>
           <!--<img src="<?php echo base_url()?>assets/img/logo.png" style='width: 40%;'>-->
        </div>
      </div>
      <br>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="alert alert-danger" style="margin-top: 10%">
         <b> Mensaje:</b> Su usuario esta Inactivo!<br>
        </div>
       <div style="width: 100%;text-align: center;padding-right: 10px;padding-bottom: 10px;margin-top: -40px;"><a href="<?php echo base_url()?>index.php/Main/index" class="waves-effect waves-light btn mt-5 border-radius-4"> Volver</a>
        </div>
    </div>
</div>
