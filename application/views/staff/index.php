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
							<th>Name</th>
							<th>Start Date</th>
							<!-- <th>Job Description</th> -->
							<th>Review</th>
						</tr>
						<?php foreach ($staff as $emp): ?>
							<tr>
						       <td><?php echo "{$emp['firstName']} {$emp['lastName']}"; ?></td>
						       <td><?php echo "{$emp['startDate']}"; ?></td>
						       <!-- <td><?php// echo "{$emp['']}"; ?></td> -->
						       <td><?php echo "{$emp['notes']}"; ?></td>
					       </tr>   
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-md-3"></div>
			</div>

			<!-- <div class="col-md-9">
				<a class="btn btn-primary pull-right" href="<?php echo site_url('staff'); ?>">Edit Transactions</a>
			</div> -->
		</div>
	</div>
</div>