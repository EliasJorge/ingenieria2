<?php
	session_start();
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
	$contrasenia=$_POST['contrasenia'];
	$rcontrasenia=$_POST['rcontrasenia'];
	$mail=$_POST['mail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Couch Inn</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">

<?php
	if(isset($_POST['enviar'])) 
	{
		if($contrasenia!= $rcontrasenia) 
                {
                    echo '<script type="text/javascript">
					alert("las contraseñas ingresadas no coinciden");
					window.location="comprobar_mail.php"
					</script>';
                }
                else 
                {
					$consulta="UPDATE usuarios SET contrasenia='".$contrasenia."' WHERE email='".$mail."'";
                    $sql = mysqli_query($conexion,$consulta)or die(mysqli_error($conexion));
                    if($sql) 
                    {
                        echo '<script type="text/javascript">
									alert("la contraseña ha sido cambiada correctamente");
									window.location="login.php"
					   		   </script>';
                    }
                    else 
                    {
                        echo '<script type="text/javascript">
									alert("error al cargar los datos en la base");
									window.location="comprobar_mail.html"
							</script>';
                    }
                }
	}
?>
</body>
</html>