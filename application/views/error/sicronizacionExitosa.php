<!DOCTYPE html>
<html>
<?php
    $this->load->view('header/header');
    $this->load->view('menu/menu');
?>
  
  <div class="content-wrapper">
    <section class="content-header">
      <br><br><br>
      <h1>
        Administrador
        <small>Sincronizar Reservaciones</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Sincronizar</a></li>
        <li class="active">Reservaciones</li>
      </ol>
    </section>
    <section class="content">
     
     
      <!-- Main row -->
      <div class="row" style="margin-top: 5%; padding-left: 20%;padding-right: 20%;">
         <div class="col-6">
               <div class="alert alert-info" style="font-size: 16px">
                <i class="fa fa-info-circle"></i>
                 Sincronización Exitosa
               </div>
          </div>
       </div>
 
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1
    </div>
    <strong>THoperadora Copyright &copy; 2018</strong> Todos los derechos reservados.
  </footer>

</div>
<!-- ./wrapper -->
<?php
  $this->load->view('footer/footer');
?>
</body>
</html>


