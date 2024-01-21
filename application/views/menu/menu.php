<style>
  #item{
    color: #585858;
    font-size: 16px;
  }
  .nav-link {
    color: #fff;
  }
  #item:hover{
    color: #fff;

  }
</style>
<aside class="main-sidebar" style="background-color: #fff;margin-top: -50px;">

    <img src="<?php echo base_url()?>/assets/img/logo.jpg" width="70px">    
    <section class="sidebar" style="margin-top: 10px;padding-left: 5px;" id="item">
      <ul class="sidebar-menu" data-widget="tree">  
      <?php if($nivel==0){?>
        <li>
         <a href="<?php echo base_url()?>index.php/Main/list_hotel">
            <i class="fa fa-building" id="item"></i> <span id="item">Hoteles</span>            
          </a>
        </li>


         <li>
          <a href="<?php echo base_url()?>index.php/Main/usuarios">
           <i class="fa fa-users" id="item"></i> <span id="item">Usuarios</span>
          </a>
        </li>

       
        <?php }?>

         <li>
          <a href="<?php echo base_url()?>index.php/Main/configuracion">
           <i class="fa fa-wrench" id="item"></i> <span id="item">Configuraci&oacute;n</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url()?>index.php/Main/cerrarSesion">
            <i class="fa fa-sign-out" id="item"></i> <span id="item">Cerrar Sesion</span>
          </a>
        </li>        

    </section>

  </aside>