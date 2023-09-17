  <?php
include_once "db.php";
$con = mysqli_connect($host, $user, $pass, $db);
if(isset($_REQUEST['idBorrar'])){
    $id= mysqli_real_escape_string($con,$_REQUEST['idBorrar']??'');
    $query="DELETE from clientes  where id_cliente='".$id."';";
    $res=mysqli_query($con,$query);
    if($res){
        ?>

echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=clientes&mensaje=Cliente borrado exitosamente" />  ';

     
        <?php
    }else{
        ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar <?php echo mysqli_error($con); ?>
        </div>
        <?php
    }
}
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Clientes</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                          <table id="example2" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>Nombre</th>
                                      <th>Apellido</th>
                                      <th>Email</th>
                                      <th>Telefono</th>
                                      <th>Acciones
                                          <a href="panel.php?modulo=crearliente"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $query = "SELECT id_cliente,nombre,apellido,correo,telefono from clientes;   ";
                                    $res = mysqli_query($con, $query);

                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                      <tr>
                                          <td><?php echo $row['nombre'] ?></td>
                                          <td><?php echo $row['apellido'] ?></td>
                                          <td><?php echo $row['correo'] ?></td>
                                          <td><?php echo $row['telefono'] ?></td>
                                          <td>
                                          
                                          
                                          <a href="panel.php?modulo=editarCliente&id=<?php echo $row['id_cliente'] ?>" style="margin-right: 5px;"> <i class="fas fa-edit"></i> </a>
                                            <a href="panel.php?modulo=clientes&idBorrar=<?php echo $row['id_cliente'] ?>" class="text-danger borrar"> <i class="fas fa-trash"></i> </a>
                                                                                
                                         
                                          </td>
                                      </tr>
                                  <?php
                                    }
                                    ?>
                              </tbody>
                          </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
  </div>