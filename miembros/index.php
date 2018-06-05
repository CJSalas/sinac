<?php include('../nav/header.php'); ?>
	<main role="main">

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Propietarios</h1>
				<p></p>
				<p><a class="btn btn-primary btn-design-home btn-lg" href="#" role="button">Learn more »</a></p>
			</div>
		</div>

		<div class="container">
		<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-5 wrap-contact3">
					<form method="post" class="frmsinac contact3-form validate-form" id="frmMiembro" autocomplete="on">
						<input id="id_hidden" name="idmiembroinst" type="hidden" value="">
						
						<div class="wrap-input3 validate-input" data-validate="Campo requerido">
							<input class="input3" type="text" maxlength="9" id="txtCedulaMiembro" name="name" placeholder="C&eacute;dula (XXXXXXXXX)">
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 validate-input" data-validate="Campo requerido">
							<input class="input3" type="text" id="txtNombreMiembro" name="name" placeholder="Nombre">
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 validate-input" data-validate="Campo requerido">
							<input class="input3" type="text" id="txtApellidoMiembro" name="name" placeholder="Apellido">
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 validate-input" data-validate="Campo requerido">
							<input class="input3" type="text" id="txtTelefonoMiembro" name="name" placeholder="Tel&eacute;fono">
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 validate-input" data-validate="Campo requerido">
							<input class="input3" type="email" id="txtCorreoElectronico" name="name" placeholder="Correo electr&oacute;nico">
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3" style="display: block;">
							<div>
								<select id="select_instituciones" class="selection-2 select2-hidden-accessible" name="slsectores" tabindex="-1" aria-hidden="true">
									
								</select>
							</div>
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-contact3-form-radio">
							<div class="contact3-form-radio" style="margin-right:15px;">
								<input class="input-radio3" id="radio7" type="radio" name="choice4" value="get-quote">
								<label class="label-radio3" for="radio7">
									No es Suplente
								</label>
							</div>
							<div class="contact3-form-radio m-r-42">
								<input class="input-radio3" id="radio8" type="radio" name="choice4" value="say-hi" checked="checked">
								<label class="label-radio3" for="radio8">
									Es Suplente
								</label>
							</div>
						</div>
						<div class="wrap-input3 input5-select" style="display: none;">
							<div>
								<select id="select_miembros" class="selection-2 select2-hidden-accessible" name="slsectores" tabindex="-1" aria-hidden="true">
									
								</select>
							</div>
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-input3 input3-select" style="display: none;">
							<div>
								<select id="select_coracM" class="selection-2 select2-hidden-accessible" name="slsectores" tabindex="-1" aria-hidden="true">
									
								</select>
							</div>
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-contact3-form-radio">
							<div class="contact3-form-radio" style="margin-right:15px;">
								<input class="input-radio3" id="radio2" type="radio" name="choice" value="get-quote">
								<label class="label-radio3" for="radio2">
									CORAC
								</label>
							</div>
							<div class="contact3-form-radio m-r-42">
								<input class="input-radio3" id="radio1" type="radio" name="choice" value="say-hi" checked="checked">
								<label class="label-radio3" for="radio1">
									N/A
								</label>
							</div>
						</div>
						<div class="wrap-input3 input4-select" style="display: none;">
							<div>
								<select id="select_colacM" class="selection-2 select2-hidden-accessible" name="slsectores" tabindex="-1" aria-hidden="true">
									
								</select>
							</div>
							<span class="focus-input3"></span>
						</div>
						<div class="wrap-contact3-form-radio">
							<div class="contact3-form-radio" style="margin-right:15px;">
								<input class="input-radio3" id="radio4" type="radio" name="choice2" value="get-quote">
								<label class="label-radio3" for="radio4">
									COLAC
								</label>
							</div>
							<div class="contact3-form-radio m-r-42">
								<input class="input-radio3" id="radio3" type="radio" name="choice2" value="say-hi" checked="checked">
								<label class="label-radio3" for="radio3">
									N/A
								</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary" id="submitR" name="submitAdd" value="Submit" onclick="submitButtonAdd('miembro');">Registrar</button>
						<button type="submit" class="btn btn-primary modificar" id="submitE" name="submitAdd" value="Submit" onclick="onUpdateMiembros()">Modificar</button>
						<span class="btn btn-primary" id="clean" name="span_clean">Limpiar</span>
						
					</form>
				</div>
				<div class="col-md-7 padding-top" id="div-miembros-list">
				</div>
			</div>
			<div class="html"></div>
		<hr>

		</div> <!-- /container -->

	</main>
<?php include('../nav/footer.php'); ?>