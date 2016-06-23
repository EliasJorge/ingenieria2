<?php
if(isset($_SESSION['loggedin']))
{
  $mail=	$_SESSION['mail'];
  $sql= "SELECT*FROM usuarios WHERE email='$mail';
  $result= mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
  $row = mysqli_fetch_array($result);
  if (!$result || mysqli_num_rows($result) == 1)
  {
    $_SESSION['nombre']= $row["nombre"];
  }
  if ($_SESSION['idU'] == $idU)
  {
  ?>


  <?php
}
else
{
  ?>

  <?php
}
  ?>
