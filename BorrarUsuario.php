<?php
include_once "db.php";
$con = mysqli_connect($host, $user, $pass, $db);
if(isset($_REQUEST['idBorrar'])){
    $id= mysqli_real_escape_string($con,$_REQUEST['idBorrar']??'');
    $query="DELETE from usradmin  where id='".$id."';";
    $res=mysqli_query($con,$query);
    if($res){
        ?>
        
        

        
        <!--<div class="alert alert-warning float-right" role="alert">
            Usuario borrado con exito (no tienes corazon)
        </div>-->
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
