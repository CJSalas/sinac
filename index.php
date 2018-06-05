<?php include('nav/header.php'); ?>
	<main role="main">

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3"></h1>
				<p></p>
				<p><a class="btn btn-primary btn-design-home btn-lg" href="#" role="button">Learn more »</a></p>
			</div>
		</div>

		
		<div class="container-register">
			<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-12 wrap-contact3">
					<form method="post" action="/sinac/lista" class="frmsinac contact3-form" id="frmRegistro" autocomplete="on">
						<div class="wrap-input3 validate-input" data-validate="Nombre es requerido">
							<input class="input3" id="txtNombreUsuario" type="text" name="name" placeholder="Nombre de Usuario">
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 validate-input" data-validate="Nombre es requerido">
							<input class="input3" id="txtPassword" type="password" name="name" placeholder="Contrasena">
							<span class="focus-input3"></span>
						</div>
						<button type="submit" class="btn btn-primary" id="submit" name="submitAdd" value="Submit">Ingresar</button>
						<span class="btn btn-primary" id="clean" name="span_clean">Limpiar</span>
					</form>
				</div>
			</div>
			<!--<hr>-->
	    </div> <!-- /container -->
	</main>
<?php include('nav/footer.php'); ?>