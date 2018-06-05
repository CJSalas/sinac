<?php include('nav/header.php'); ?>
	<main role="main">

		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Hello, world!</h1>
				<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
				<p><a class="btn btn-primary btn-design-home btn-lg btn-lg" href="#" role="button">Learn more »</a></p>
			</div>
		</div>

		<div class="container">
		<!-- Example row of columns -->
			<div class="row">
				<div class="col-md-4">
					<form>
						<div class="form-group">
							<!--<label for="lblnombre_sector">Nombre del Sector</label>-->
							<input type="text" class="form-control" id="nombre_sector" placeholder="Nombre del Sector">
						</div>
						<button type="submit" class="btn btn-primary">Agregar</button>
					</form>
				</div>
				<div class="col-md-8" id="div-sector-list">
					<table class="table table-hover">
						<thead>
							<tr>
								<th colspan="3">Sectores</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Asociaciones</td>
								<td>
									<button type="submit" class="btn btn-primary">Modificar</button>
									<button type="submit" class="btn btn-primary">Eliminar</button>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Plataformas</td>
								<td>
									<button type="submit" class="btn btn-primary">Modificar</button>
									<button type="submit" class="btn btn-primary">Eliminar</button>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Investigación</td>
								<td>
									<button type="submit" class="btn btn-primary">Modificar</button>
									<button type="submit" class="btn btn-primary">Eliminar</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		<hr>

		</div> <!-- /container -->

	</main>
<?php include('nav/footer.php'); ?>