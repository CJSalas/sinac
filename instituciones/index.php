<?php include('../nav/header.php'); ?>
	<main role="main">

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Instituciones</h1>
				<p></p>
				<p><a class="btn btn-primary btn-design-home btn-lg" href="#" role="button">Learn more »</a></p>
			</div>
		</div>

		<div class="container">
		<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-5 wrap-contact3">
					<form method="post" class="frmsinac contact3-form validate-form" id="frmInstitucion" autocomplete="on">
						<input id="id_hidden_sector_instituciones" name="idsectorinst" type="hidden" value="">
						<div class="wrap-input3 validate-input" data-validate="Campo requerido">
							<input class="input3" type="text" id="txtNombreInstitucion" name="name" placeholder="Nombre Instituci&oacute;n">
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 validate-input" data-validate="Campo requerido">
							<input class="input3" type="text" id="txtPresupuestoInstitucion" name="name" placeholder="Presupuesto A&ntilde;o">
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 input3-select" style="display: block;">
							<div>
								<select id="select_instituciones" class="selection-2 select2-hidden-accessible" name="slsectores" tabindex="-1" aria-hidden="true">
									
								</select>
							</div>
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 validate-input" data-validate = "Campo requerido">
							<textarea class="input3" id="txtFuncionInstitucion" name="message" placeholder="Funci&oacute;n"></textarea>
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 validate-input" data-validate = "Campo requerido">
							<textarea class="input3" id="txtObjetivoInstitucion" name="message" placeholder="Objetivos"></textarea>
							<span class="focus-input3"></span>
						</div>
						<button type="submit" class="btn btn-primary" id="submitR" name="submitAdd" value="Submit" onclick="submitButtonAdd('institucion');">Registrar</button>
						<button type="submit" class="btn btn-primary modificar" id="submitE" name="submitAdd" value="Submit" onclick="onUpdateInstituciones(document.getElementById('txtNombreInstitucion').name, document.getElementById('txtNombreInstitucion').value, document.getElementById('txtPresupuestoInstitucion').value, $('#select_instituciones').val(), $('textarea#txtFuncionInstitucion').val(), $('textarea#txtObjetivoInstitucion').val())">Modificar</button>
						<span class="btn btn-primary" id="clean" name="span_clean">Limpiar</span>
					</form>
				</div>
				<div class="col-md-7 padding-top" id="div-institucion-list">
				</div>
			</div>
			<div class="html"></div>
		<hr>

		</div> <!-- /container -->

	</main>
<?php include('../nav/footer.php'); ?>