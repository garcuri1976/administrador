<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><Carre5-OnLine></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">-->
  <!-- Ionicons -->
  <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <!-- icheck bootstrap -->
  <!--<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">-->
  <!-- Theme style -->
  <link rel="stylesheet" href="css/login.css">
  <!-- Google Font: Source Sans Pro -->
  <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
</head>
<body background="images/carre5_.gif">
<!--<body class="hold-transition login-page">-->
<body class="login-page">
  <div class="login-box">
    <div class="login-logo">
    
    </div><h1 style="background-color:#FFce53;font-size:300%;text-align:center"><p><b>Gestor</b></p></h1>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Login</p>
        <?php
        if (isset($_REQUEST['login'])) {
          session_start();
          $email = $_REQUEST['email'] ?? '';
          $password1 = $_REQUEST['pass'] ?? '';
          #encripto password - Ariel
          $password = md5($password1);
          
          include_once "db.php";
          $con = mysqli_connect($host, $user, $pass, $db);
          $query = "SELECT id_admin,correo,nombre,apellido from usr_admin where correo='" . $email . "' and clave='" . $password . "';  ";
          $res = mysqli_query($con, $query);
          $row = mysqli_fetch_assoc($res);
          if ($row) {
            $_SESSION['id'] = $row['id_admin'];
            $_SESSION['email'] = $row['correo'];
            $_SESSION['nombre'] = $row['nombre'];// ]&" "&$row['apellido'];
            header("location: panel.php");
          } else {
        ?>
            <div class="alert alert-danger" role="alert">
              Error de login <img src="images/error2.jpg" width="200">
            </div>
        <?php
          }
        }
        ?>
        <form method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="pass">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <!--<script src="plugins/jquery/jquery.min.js"></script>-->
    <!-- Bootstrap 4 -->
    <!--<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
    <!-- AdminLTE App -->
    <!--<script src="dist/js/adminlte.min.js"></script>-->

</body>

</html>