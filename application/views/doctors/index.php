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
							<th class="hide"></th>
							<th class="minus hide"></th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>Type</th>
							<th>Start Date</th>
						</tr>
						<?php foreach ($doctors as $doctor): ?>
							<tr>
							   <th class="hide empId"><?php echo "{$doctor['emplID']}";?> </th>
						       <td class="minus hide" valign="middle" style="color: red;"><a class="deleteButton" onclick="deleteDoctor($(this))"><i class="fa fa-minus" aria-hidden="true"></i></td>
						       <td><?php echo "{$doctor['firstName']}"; ?></td>
						       <td><?php echo "{$doctor['lastName']}"; ?></td>
						       <td><?php echo "{$doctor['address']}"; ?></td>
						       <td><?php echo "{$doctor['type']}"; ?></td>
						       <td><?php echo "{$doctor['startDate']}"; ?></td>
					       </tr>   
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-md-10"></div>
			</div>
			  <div class="row">
				<div class="col-md-11">
					<button class="btn btn-primary pull-right" onclick="enableEditMode($(this))">Edit Doctors</button>
					<button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#newDoc">Add Doctor</button>
				</div> 
			  </div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="newDoc" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <label for="fName">First Name</label>
        <input type="text" class="form-control" name="fName" id="fName" />
        <label for="lName">Last Name</label>
        <input type="text" class="form-control" name="lName" id="lName" />
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" />
        <label for="type">Type</label>
        <input type="text" class="form-control" name="type" id="type" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="addNewDoc()" data-dismiss="modal">Save</button>
      </div>
    </div>

  </div>
</div><!-- End Modal -->

<script type="text/javascript">
    function enableEditMode($button) {
		$('.empId').each(function () { //Loops through the employee rows
            var $row = $(this).parent(); //grab the rows
            $row.children().each(function (i) { //Loop through the elements in the row
                if (i != 1) {
                    var temp = $(this).text();
                    $(this).html("<input type='text' class='form-control' value='" + temp + "'/>");
                } else {
                    $('.minus').removeClass("hide");
                }
            });
        });
        $button.text("Done");
        $button.attr("onclick", "finishEditMode($(this))");
    }

    function finishEditMode($button) {
        var doctors = makeObject();
        $button.text("Edit Doctors");
        $button.attr("onclick", "enableEditMode($(this))");
        $.ajax({
            url: '<?php echo site_url('doctors/editDoctors');?>',
            type: 'POST',
            data: {
                "doctors": doctors
            }
        }).success(function () {
            debugger;
            location.reload();
        }).error(function() {
            debugger;
        });
    }

    function employee(emplID, firstName, lastName, address, startDate, type) {
        this.emplID = emplID,
        this.firstName = firstName,
        this.lastName = lastName,
        this.address = address,
        this.startDate = startDate,
        this.type = type
    }

    function makeObject() {
        var doctors =  [];        
        $('.empId').each(function (i) {
            var $row = $(this).parent();
            var empId = $row.children().eq(0).children().val();
            var firstName = $row.children().eq(2).children().val();
            var lastName = $row.children().eq(3).children().val();
            var address = $row.children().eq(4).children().val();
            var type = $row.children().eq(5).children().val();
            var startDate = $row.children().eq(6).children().val();
            var doctor = new employee(empId, firstName, lastName, address, startDate, type);
            doctors[i] = doctor;
        });
        return doctors;
    }

    function addNewDoc() {
    	var date = new Date();
		var formatDate = (date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear()
        var newEmp = new employee(null, $('#fName').val(), $('#lName').val(), $('#address').val(), formatDate, $('#type').val());
        $.ajax({
            url: '<?php echo site_url('doctors/add');?>',
            type: 'POST',
            data: {
                "doctor": newEmp
            }
        }).success(function () {
        	//debugger;
            location.reload();  
        });

    }

    function deleteDoctor($pos) {
        var empId = $pos.parent().parent().children().eq(0).children().val();
        $.ajax({
            url: '<?php echo site_url('doctors/delete');?>',
            type: 'POST',
            data: {
                "doctorID": empId
            }
        }).success(function () {
            location.reload();
        });
    }
</script>