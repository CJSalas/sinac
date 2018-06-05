<?php include('../nav/header.php'); ?>
	<main role="main">

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Hello, Instituciones!</h1>
				<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
				<p><a class="btn btn-primary btn-design-home btn-lg" href="#" role="button">Learn more »</a></p>
			</div>
		</div>

		<div class="container">
		<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-4 wrap-contact3">
					<form method="post" class="frmsinac contact3-form" id="frmInstitucion" autocomplete="on">
						<div class="wrap-input3 validate-input" data-validate="Name is required">
							<input class="input3" type="text" name="name" placeholder="Nombre Institucion">
							<span class="focus-input3"></span>
						</div>
						<button type="submit" class="btn btn-primary" id="submit" name="submitAdd" value="Submit" onclick="submitButtonAdd('institucion');">Registrar</button>
						<button type="submit" class="btn btn-primary" id="submit" name="submitAdd" value="Submit" onclick="onUpdateSectors('0','Institucion')">Modificar</button>
					</form>
				</div>
				<div class="col-md-8 padding-top" id="div-institucion-list">
				</div>
			</div>
			<div class="html"></div>
		<hr>

		</div> <!-- /container -->

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Detalle de la Institución</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form method="post" class="frmsinac" id="frmInstitucionM" autocomplete="on">
							<div class="form-group">
								<input type='text' value="Asociaciones de Desarrollo Integral" data-validation="required" data-validation-error-msg="Campo requerido" class="form-control border-white" name="nombre_institucion" maxlength="40" size="40" placeholder="Nombre de la Institucion">
								<input type='text' value="0" data-validation="required" data-validation-error-msg="Campo requerido" class="form-control border-white" name="nombre_institucion" maxlength="40" size="40" placeholder="Nombre de la Institucion">
								<select name="sector_pertenece" class="form-control">
									<option value ="1">Asociaciones</option>
									<option value ="2">Plataformas</option>
									<option value ="3">Investigacion</option>
								</select> 
								<textarea class="form-control">
									Velar por el bienestar de la comunidad respectiva 
								</textarea> 
								<textarea class="form-control">
									Pueden formar parte de los CORACs
								</textarea> 
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>

	</main>
<?php include('../nav/footer.php'); ?>