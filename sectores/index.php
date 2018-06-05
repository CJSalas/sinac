<?php include('../nav/header.php'); ?>
	<main role="main">

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Hello, Sectores!</h1>
				<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
				<p><a class="btn btn-primary btn-design-home btn-lg" href="#" role="button">Learn more »</a></p>
			</div>
		</div>

		<div class="container">
		<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-4 wrap-contact3">
					<form method="post" class="frmsinac contact3-form" id="frmSectores" autocomplete="on">
						<div class="wrap-input3 validate-input" data-validate="Name is required">
							<input class="input3" type="text" name="name" placeholder="Nombre Sector">
							<span class="focus-input3"></span>
						</div>
						<button type="submit" class="btn btn-primary" id="submit" name="submitAdd" value="Submit" onclick="submitButtonAdd('sector');">Registrar</button>
						<button type="submit" class="btn btn-primary" id="submit" name="submitAdd" value="Submit" onclick="onUpdateSectors('0','Sector')">Modificar</button>
					</form>
				</div>
				<div class="col-md-8 padding-top" id="div-sector-list">
				</div>
			</div>
			<div class="html"></div>
		<hr>

		</div> <!-- /container -->

	</main>
<?php include('../nav/footer.php'); ?>