<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 style="text-align: center;"><?php echo $title; ?></h2>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<!-- <th class="minus hide"></th> -->
								<th class="hide"></th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Address</th>
								<th>Doctor</th>
								<th>Entry Date</th>
								<th>Departure Date</th>
							</tr>
						</thead>
						<tbody id="patients">
							<?php foreach ($patients as $patient): ?>
								<tr>
									<!-- <td class="minus hide"><a class="deleteButton" onclick="deleteStaff($(this))"><i style="color: red;" class="fa fa-minus" aria-hidden="true"></i></td> -->
									<td class="hide"><?php echo "{$patient['patientID']}"; ?></td>
							       <td><?php echo "{$patient['firstName']}"; ?></td>
							       <td><?php echo "{$patient['lastName']}"; ?></td>
							       <td><?php echo "{$patient['address']}"; ?></td>
							       <td><?php echo "{$patient['docFName']} {$patient['docLName']}"; ?></td>
								   <td><?php echo "{$patient['entryDate']}"; ?></td>
								   <td><?php echo "{$patient['departDate']}"; ?></td>
						       </tr>   
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="row">
                <div class="col-md-11">
                    <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#newEmp">Add Patient</button>
                    <button class="btn btn-primary pull-right" onclick="enableEditMode($(this))" style="margin-right: 10px;">Edit Patients</button>
                </div>
            </div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="newEmp" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a Patient</h4>
      </div>
      <div class="modal-body">
        <label for="fName">First Name</label>
        <input type="text" class="form-control" name="fName" id="fName" />
        <label for="lName">Last Name</label>
        <input type="text" class="form-control" name="lName" id="lName" />
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="addNewPat()" data-dismiss="modal">Save</button>
      </div>
    </div>

  </div>
</div><!-- End Modal -->

<script type="text/javascript">
	function enableEditMode($button) {
        $('#patients').each(function () { //Loops through the employee rows
            var $row = $(this).children(); //grab the rows
            $row.each(function () { //Loop through the row
            	$(this).children().each(function(i) { //Loop through the elements in row
                	if (i != 0) {
                		var temp = $(this).text();
                		$(this).html("<input type='text' class='form-control' value='" + temp + "'/>");
                	}
                });
            });
        });
        
        $button.text("Done");
        $button.attr("onclick", "finishEditMode($(this))");
    }

    function finishEditMode($button) {
    	debugger;
        var patients = makeObject();
        $button.text("Edit Staff");
        $button.attr("onclick", "enableEditMode($(this))");
        $.ajax({
            url: '<?php echo site_url('Patients/updatePatients');?>',
            type: 'POST',
            data: { "patients": patients }
        }).success(function () {
            location.reload();
        }).error(function() {
        });
    }

	function addNewPat() {
		debugger;
        var newPatient = new patient(null, $('#fName').val(), $('#lName').val(), $('#address').val(), null);
        $.ajax({
            url: '<?php echo site_url('Patients/addPatient');?>',
            type: 'POST',
            data: {
                "patient": newPatient
            }
        }).success(function () {
            location.reload();  
        });
    }

    function makeObject() {
        var patients =  [];
        $('#patients').children().each(function (i) {
            var $row = $(this);
            var patientID = $row.children().eq(0).text();
            var firstName = $row.children().eq(1).children().val();
            var lastName = $row.children().eq(2).children().val();
            var address = $row.children().eq(3).children().val();
            var doctor = $row.children().eq(4).children().val();
            var entryDate = $row.children().eq(5).children().val();
            var departDate = $row.children().eq(6).children().val();
            var staffMember = new patient(patientID, firstName, lastName, address, entryDate);
            patients[i] = staffMember;
        });
        return patients;
    }

    function patient(patientID, firstName, lastName, address, entryDate) {
        this.patientID = patientID,
        this.firstName = firstName,
        this.lastName = lastName,
        this.address = address,
        this.entryDate = entryDate
    }

    // function deleteStaff($pos) {
    //     var patientID = $pos.parent().children().eq(1);
    //     $.ajax({
    //         url: '<?php echo site_url('patient/deletePatient');?>',
    //         type: 'POST',
    //         data: {
    //             "empId": empId
    //         }
    //     }).success(function () {
    //         location.reload();

    //     });
    // }
</script>