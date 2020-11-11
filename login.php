<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
  <!--CDN DE BOOSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
	<script src="js/script.js"></script>
</head>

<body>
	<div class="container">
		<!--VAMOS A  CENTRAR EL CUADRO DE LOGIN-->
		<div class="row justify-content-center mt-5 pt-5 m-1">
			<div class="col-sm-8 col-xl-4 col-lg-5  login text-center">

				<form>
					<div class="form-group">
						<h3>Login</h3>
					</div>

					<div class="form-group">
						<img src="img/1.png" alt="Logo" class="logo">
					</div>

					<div class="form-group mx-sm-5 pt-2">
						<input type="text" name="username" class="form-control caja-texto" placeholder="Ingrese Usuario">
					</div>

					<div class="form-group mx-sm-5 pt-2">
						<input type="password" name="password" class="form-control caja-texto" placeholder="Ingrese su contraseña">
					</div>

					<div class="form-group mx-sm-5 pt-2">
						<input onclick="login()" class="btn btn-block " value="Ingresar">
					</div>
				</form>

			</div>
		</div>
	</div>





	<!--BUNDLE DE BOOSTRAP-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</body>

</html>