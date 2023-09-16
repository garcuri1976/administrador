    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      
      <!-- /.conexion a la DB -->
      <?php
      include_once "db.php";
          $con = mysqli_connect($host, $user, $pass, $db);

      // Verificar la conexión
          if (!$con) {
            die("Error de conexión: " . mysqli_connect_error());
          }
      // Realizar la consulta usuario gestion
          $query = "SELECT COUNT(*) AS total FROM usr_admin";
          $result = mysqli_query($con, $query);
      
      // Verificar si la consulta fue exitosa
          if ($result) {
            $row = mysqli_fetch_assoc($result);
            $CantUsrAdm = $row['total'];
        } else {
            echo "Error en la consulta: " . mysqli_error($con);
        }
                
      // Cerrar la conexión
          mysqli_close($con);


          include_once "db.php";
          $con2 = mysqli_connect($host, $user, $pass, $db);

      // Verificar la conexión
          if (!$con2) {
            die("Error de conexión: " . mysqli_connect_error());
          }    
      // Realizar la consulta cliente
      $query2 = "SELECT COUNT(*) AS total2 FROM clientes";
      $result2 = mysqli_query($con2, $query2);

      if ($result2) {
        $row2 = mysqli_fetch_assoc($result2);
        $Cantcli = $row2['total2'];
    } else {
        echo "Error en la consulta: " . mysqli_error($con);
    }

    // Cerrar la conexión
    mysqli_close($con2);
      ?>






      
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3> <?php echo $CantUsrAdm; ?></h3>

                  <p>New Orders</p>

                </div>
                
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              
            <!-- small box  USR ADMIN-->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $CantUsrAdm; ?></h3>
                  <p>Usuarios de Gestion</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              
            
            <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $Cantcli; ?></h3>

                  <p>Clientes Registrados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  