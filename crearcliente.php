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

    $query = "INSERT INTO clientes 
        (email       ,contrasena       ,nombre     ,apellido    ,localidad     ,direccion) VALUES
        ('" . $email . "','" . $pass . "','" . $nombre . "','" . $apellido . "','" . $localidad . "','" . $direccion . "');
        ";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=clientes&mensaje=clientes creado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al crear usuario <?php echo mysqli_error($con); ?>
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
                        <form action="panel.php?modulo=crearcliente" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"  required="required" >
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