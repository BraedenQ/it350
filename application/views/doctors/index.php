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
							<th class="hide">EmpID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>Type</th>
							<th>Start Date</th>
						</tr>
						<?php foreach ($doctors as $doctor): ?>
							<tr>
							   <th class="hide"><?php echo "{$doctor['emplID']}";?> </th>
						       <td><?php echo "{$doctor['firstName']}"; ?></td>
						       <td><?php echo "{$doctor['lastName']}"; ?></td>
						       <td><?php echo "{$doctor['address']}"; ?></td>
						       <td><?php echo "{$doctor['type']}"; ?></td>
						       <td><?php echo "{$doctor['startDate']}"; ?></td>
					       </tr>   
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-md-3"></div>
			</div>

			<div class="col-md-9">
				<a class="btn btn-primary pull-right" href="<?php echo site_url('doctors/editDoctors'); ?>">Edit Doctors</a>
			</div> 
		</div>
	</div>
</div>