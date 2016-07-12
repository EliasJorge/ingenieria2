<?php
//cancelar todas las solicitudes en ese intervalo de fechas
//cambia el estado de la soli en la bd
//session_start();
include 'abrir_conexion.php';
$con = conectar1();
include 'funciones.php';
$idRes = $_REQUEST['idR'];
$consulta = "SELECT * FROM reservas WHERE  id_reserva='$idRes'";

$resultado = busqueda($consulta);
if($resultado)
{
  foreach ($resultado as $r)
  {
    $fechaDesde= $r['fecha_desde'];
    $fechaHasta= $r['fecha_hasta'];
    $idP= $r['id_publicacion'];
    $sql="SELECT  * FROM reservas WHERE estado='activo' AND id_publicacion='$idP'";
    $result= busqueda($sql);
    foreach ($resultado as $res)
    {
      $fechaDRes= $res['fecha_desde'];
      $fechaHRes= $res['fecha_hasta'];
      if(($fechaDRes >= $fechaDesde) || ($fechaHasta >= $fechaHRes))
      {
        $consulta= "UPDATE reservas SET estado='rechazado' WHERE id_reserva='{$idRes}'";
        $re = actualizar($consulta);
      }
    }
  }
  $consulta= "UPDATE reservas SET estado='aceptado' WHERE id_reserva='{$idRes}'";
  $act = actualizar($consulta);
	if ($act){ ?>
			<script type="text/javascript">
						alert("la reserva se acepto correctamente");
						window.location="listado_reservas.php?id=<?php echo $idP?>"
			</script>';
		<?php
	}else{
		?>
			<script type="text/javascript">
						alert("ocurrio un error");
						window.location="listado_reservas.php?id=<?php echo $idP?>"
			</script>';
		<?php
		
	}
}
								
?>
