  <table id="myTable" width="100%" class="table table-condensed table-striped">
  <thead>
    <tr>
      <th>Login</th>
      <th>E-mail</th>
      <th>Nivel</th>
      <th>Status</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    if(isset($rs)){
    foreach ($rs as $row) {?>
      <tr>
        <td><?php echo $row->username;?></td>
        <td><?php echo $row->email;?></td>
        <td><?php echo $row->nivel==0?"Administrador":"Cliente";?></td>
        <td><?php echo $row->status==1?"Activo":"Desactivado";?></td>
        <td>
          <button class="btn btn-sm" style="background-color: #2f5aa6;color: #fff" data-toggle="modal" data-target="#edit_usuario" onclick="setEdit('<?php echo $row->id?>','<?php echo $row->username?>','<?php echo $row->email?>','<?php echo $row->status?>','<?php echo $row->password?>')"><i class="fa fa-edit"></i></button>
        </td>
        <td>
          <button class="btn btn-sm" style="background-color: #2f5aa6;color: #fff" onclick="delUsuario('<?php echo $row->id?>')"><i class="fa fa-times-circle"></i></button>
        </td>
      </tr>
    <?php }
  }?>
  </tbody>
</table>