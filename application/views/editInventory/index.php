<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Add a Inventory</h3>
				</div>
				<div class="panel-body">
					<form name ="userinput" action="add" method="post">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Description</th>
									<th>Number of Units</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input class="form-control" type="text" name="description"></td>
									<td><input class="form-control" type="number" name="numUnits"></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th></th>
									<th><input class="btn btn-primary pull-right" type="submit" value="Submit"></th>
								</tr>
							</tfoot>
						</table>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Delete Inventory</h3>
				</div>
				<div class="panel-body">
					<form name ="userinput2" action="remove" method="post">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Inventory ID</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input class="form-control" type="number" name="invID"></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th><input class="btn btn-primary pull-right" type="submit" value="Submit"></th>
								</tr>
							</tfoot>
						</table>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>
