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
						<<tr>
							<th>Patient Name</th>
							<th>Patient Address</th>
							<th>Doctor</th>
						</tr>
						<?php foreach ($patients as $patient): ?>
							<tr>
						       <td><?php echo "{$patient['firstName']} {$patient['lastName']}"; ?></td>
						       <td><?php echo "{$patient['address']}"; ?></td>
						       <td><?php echo "{$patient['docFName']} {$patient['docLName']}"; ?></td>
					       </tr>   
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-md-3"></div>
			</div>

			<!-- <div class="col-md-9">
				<a class="btn btn-primary pull-right" href="<?php echo site_url('editTransactions'); ?>">Edit Transactions</a>
			</div> -->
		</div>
	</div>
</div>