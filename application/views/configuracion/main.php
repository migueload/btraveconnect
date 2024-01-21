
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
       Configuraciones
      </h4>


    </section>
    <section class="content" style="margin-top: 20px">
      <input type="hidden" id="base" value="<?php echo base_url();?>">
      	<div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1" style="background-color: #2f5aa6;color: #fff;font-size: 16px;">
           <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist" style="background-color: #2f5aa6;">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-info" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><i class="fa fa-user"></i> Usuarios Administradores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-facilidades" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><i class="fa fa-tag"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-tarifas" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false"><i class="fa fa-tag"></i></a>
              </li>
              
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-info" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                	<?php $this->load->view('configuracion/list');?>
                 </div> 
               
                  <div class="tab-pane fade" id="custom-tabs-one-facilidades" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  </div>
               
                  <div class="tab-pane fade" id="custom-tabs-one-tarifas" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                 </div>
               


            </div>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('footer/footer');?>

</body>
