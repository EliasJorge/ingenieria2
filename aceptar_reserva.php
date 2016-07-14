<?php
//cancelar todas las solicitudes en ese intervalo de fechas
//cambia el estado de la solicitud en la bd
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
    $sql="SELECT  * FROM reservas WHERE estado='activo' AND id_publicacion='$idP' and (fecha_desde between '$fechaDesde' and '$fechaHasta' or fecha_hasta between '$fechaDesde' and '$fechaHasta') and id_reserva != '$idRes' ";
   
	$result= busqueda($sql);
    foreach ($result as $res)
    {
		$reserva=$res['id_reserva'];
		
        $consulta= "UPDATE reservas SET estado='rechazado', aceptada_fecha=CURRENT_DATE WHERE id_reserva='$reserva'";
        $re = actualizar($consulta);
      
    }
  }
  $consulta= "UPDATE reservas SET estado='aceptado', aceptada_fecha=CURRENT_DATE  WHERE id_reserva='{$idRes}'";
  $act = actualizar($consulta);
	if ($act){ ?>
			<script type="text/javascript">
						alert("la solicitud se acepto correctamente");
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
