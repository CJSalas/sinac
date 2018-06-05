<?php include('../nav/header.php'); ?>
	<main role="main">

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Coracs</h1>
				<p></p>
				<p><a class="btn btn-primary btn-design-home btn-lg" href="#" role="button">Learn more »</a></p>
			</div>
		</div>

		<div class="container">
		<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-5 wrap-contact3">
					<form method="post" class="frmsinac contact3-form" id="frmCORAC" autocomplete="on">
						<div class="wrap-input3 validate-input" data-validate="Nombre es requerido">
							<input class="input3" id="txtNombreCorac" type="text" name="name" placeholder="Nombre del CORAC">
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 input3-select" style="display: block;">
							<div>
								<select id="select_conacs" class="selection-2 select2-hidden-accessible" name="slconac" tabindex="-1" aria-hidden="true">
									<option value="1">CONAC</option>
								</select>
							</div>
							<span class="focus-input3"></span>
						</div>
						<button type="submit" class="btn btn-primary" id="submitR" name="submitAdd" value="Submit" onclick="submitButtonAdd('corac');">Registrar</button>
						<button type="submit" class="btn btn-primary modificar" id="submitE" name="submitAdd" value="Submit" onclick="onUpdateCoracs(document.getElementById('txtNombreCorac').name, document.getElementById('txtNombreCorac').value, 1)">Modificar</button>
						<span class="btn btn-primary" id="clean" name="span_clean">Limpiar</span>
					</form>
				</div>
				<div class="col-md-7 padding-top" id="div-corac-list">
				</div>
			</div>
			<div class="html"></div>
		<hr>

		</div> <!-- /container -->
	</main>
<?php include('../nav/footer.php'); ?>