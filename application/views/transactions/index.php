<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 style="text-align: center;"><?php echo $title; ?></h2>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<table class="table table-bordered table-hover">
						<tr>
							<th>Transaction ID</th>
							<th>Type</th>
							<th>Amount</th>
						</tr>
						<?php foreach ($transactions as $transaction): ?>
							<tr>
						       <td><?php echo "{$transaction['transID']}"; ?></td>
						       <td><?php echo "{$transaction['type']}"; ?></td>
						       <td><?php echo "{$transaction['amount']}"; ?></td> 
					       </tr>   
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-md-3"></div>
			</div>

			<div class="col-md-9">
				<a class="btn btn-primary pull-right" href="<?php echo site_url('editTransactions'); ?>">Edit Transactions</a>
			</div>
		</div>
	</div>
</div>