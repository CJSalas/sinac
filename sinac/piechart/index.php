<?php include('../nav/header.php'); ?>
	<main role="main">

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Estadisticas</h1>
				<p></p>
				<p><a class="btn btn-primary btn-design-home btn-lg" href="#" role="button">Learn more »</a></p>
			</div>
		</div>

		<div class="container">
		<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-4 wrap-contact3" id="div-left">
					<form method="post" class="frmsinac contact3-form" id="frmPie" autocomplete="on">
						<div class="wrap-contact3-form-radio">
							<div class="contact3-form-radio" style="margin-right:15px;">
								<input class="input-radio3" id="radio9" type="radio" name="choice4" value="get-quote" checked="checked">
								<label class="label-radio3" for="radio9">
									Institución/Sector
								</label>
							</div>
							<div class="contact3-form-radio m-r-42">
								<input class="input-radio3" id="radio0" type="radio" name="choice4" value="say-hi">
								<label class="label-radio3" for="radio0">
									Miembro/Sector
								</label>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-8 padding-top" id="div-sector-list">
                    <div id="piechart"></div>
					<div class="html" id="actores"></div>
				</div>
			</div>
		<hr>

		</div> <!-- /container -->
	</main>
<?php include('../nav/footer.php'); ?>