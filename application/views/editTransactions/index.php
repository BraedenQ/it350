

<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Add a Transaction</h3>
				</div>
				<div class="panel-body">
					<form name ="userinput" action="editTransactions/add" method="post">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Type</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input class="form-control" type="text" name="type"></td>
									<td><input class="form-control" type="number" step="0.01" name="amount"></td>
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
					<h3>Delete a Transaction</h3>
				</div>
				<div class="panel-body">
					<form name ="userinput2" action="editTransactions/remove" method="post">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Transaction ID</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input class="form-control" type="number" name="transID"></td>
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
