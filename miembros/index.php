<?php include('../nav/header.php'); ?>
	<main role="main">

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Hello, Miembros!</h1>
				<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
				<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
			</div>
		</div>

		<div class="container">
		<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-4">
					<form method="post" class="frmsinac" id="frmMiembros" autocomplete="on">
						<div class="form-group">
							<input type="text" data-validation="required" data-validation-error-msg="Campo requerido" class="form-control" id="nombre_miembros" name="nombre_miembros" size="40" placeholder="Nombre">
						</div>
						<button type="submit" class="btn btn-primary" id="submit" name="submitAdd" value="Submit" onclick="submitButtonAdd('miembro');">Agregar</button>
					</form>
				</div>
				<div class="col-md-8" id="div-miembros-list">
				</div>
			</div>
			<div class="html"></div>
		<hr>

		</div> <!-- /container -->

	</main>
<?php include('../nav/footer.php'); ?>