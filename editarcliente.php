<?php
include_once "db.php";
$con = mysqli_connect($host, $user, $pass, $db);
if (isset($_REQUEST['guardar'])) {

    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $apellido = mysqli_real_escape_string($con, $_REQUEST['apellido'] ?? '');
    $localidad = mysqli_real_escape_string($con, $_REQUEST['localidad'] ?? '');
    $direccion = mysqli_real_escape_string($con, $_REQUEST['direccion'] ?? '');
    $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
    $pass = md5(mysqli_real_escape_string($con, $_REQUEST['contrasena'] ?? ''));
    $id = mysqli_real_escape_string($con, $_REQUEST['user_id'] ?? '');

    $query = "UPDATE clientes SET
        nombre='" . $nombre . "',apellido='" . $apellido . "',localidad='" . $localidad . "',direccion='" . $direccion . "',email='" . $email . "',contrasena='" . $pass . "'
        where user_id='". $id ."';
        ";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=clientes&mensaje=Clientes '.$nombre.' editado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al crear cliente <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
$id= mysqli_real_escape_string($con,$_REQUEST['id']??'');
$query= "SELECT user_id,nombre,apellido,localidad,direccion,email,contrasena from clientes where user_id='".$id."'; ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Cliente</h1>
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
                        <form action="panel.php?modulo=editarcliente" method="post">
                        <div class="form-group">
                                <label>Email</label>
                                <input type="mail" name="email" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <label>Pass</label>
                                <input type="password" name="contrasena" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" name="apellido" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <label>Localidad</label>
                                <input type="text" name="localidad" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                                <label>Direccion</label>
                                <input type="text" name="direccion" class="form-control"  required="required" >
                            </div>
                            <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $row['user_id'] ?>" >
                                <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                            </div>
                        </form>
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