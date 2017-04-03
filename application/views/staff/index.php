<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 style="text-align: center;"><?php echo $title; ?></h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="hide"></th>
                                <th class="hide"></th>
                                <th class="minus hide"></th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Start Date</th>
                                <th>Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($staff as $emp) : ?>
                                <tr>
                                    <td class="hide empId"><?php echo "{$emp['emplID']}"?></td>
                                    <td class="hide jobId"><?php echo "{$emp['jobID']}"?></td>
                                    <td class="minus hide" valign="middle" style="color: red;"><a class="deleteButton" onclick="deleteStaff($(this))"><i style="color: red;" class="fa fa-minus" aria-hidden="true"></i></td>
                                    <td><?php echo "{$emp['firstName']}"; ?></td>
                                    <td><?php echo "{$emp['lastName']}" ?></td>
                                    <td><?php echo "{$emp['address']}" ?></td>
                                    <td><?php echo "{$emp['startDate']}"; ?></td>
                                    <td><?php echo "{$emp['notes']}"; ?></td>
                               </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-10"></div>
            </div>
            <div class="row">
                <div class="col-md-11">
                    <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#newEmp">Add Employee</button>
                    <button class="btn btn-primary pull-right" onclick="enableEditMode($(this))">Edit Staff</button>
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
        <h4 class="modal-title">Modal Header</h4>
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
        <button type="button" class="btn btn-default" onclick="addNewEmp()" data-dismiss="modal">Save</button>
      </div>
    </div>

  </div>
</div><!-- End Modal -->

<script type="text/javascript">
    $(document).ready(function () {
        // $(document).on('click', 'a.deleteButton', function () {
        //     debugger;
        //     delete($(this));
        // });
    });

    function enableEditMode($button) {
        $('.empId').each(function () { //Loops through the employee rows
            var $row = $(this).parent(); //grab the rows
            $row.children().each(function (i) { //Loop through the elements in the row
                if (i != 2) {
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
        var employees = makeObject();
        $button.text("Edit Staff");
        $button.attr("onclick", "enableEditMode($(this))");
        $.ajax({
            url: '<?php echo site_url('staff/updateStaff');?>',
            type: 'POST',
            data: {
                "employees": employees
            }
        }).success(function () {
            location.reload();
        }).error(function() {
        });
    }

    function addNewEmp() {
        var newEmp = new employee(null, null, $('#fName').val(), $('#lName').val(), $('#address').val(), new Date(), null);
        $.ajax({
            url: '<?php echo site_url('staff/addStaff');?>',
            type: 'POST',
            data: {
                "employee": newEmp
            }
        }).success(function () {
            location.reload();  
        });
    }

    function employee(empId, jobId, firstName, lastName, address, startDate, notes) {
        this.empId = empId,
        this.jobId = jobId,
        this.firstName = firstName,
        this.lastName = lastName,
        this.address = address,
        this.startDate = startDate,
        this.notes = notes
    }

    function makeObject() {
        var employees =  [];
        $('.empId').each(function (i) {
            var $row = $(this).parent();
            var empId = $row.children().eq(0).children().val();
            var jobId = $row.children().eq(1).children().val();
            var firstName = $row.children().eq(3).children().val();
            var lastName = $row.children().eq(4).children().val();
            var address = $row.children().eq(5).children().val();
            var startDate = $row.children().eq(6).children().val();
            var notes = $row.children().eq(7).children().val();
            var staffMember = new employee(empId, jobId, firstName, lastName, address, startDate, notes);
            employees[i] = staffMember;
        });
        return employees;
    }

    function deleteStaff($pos) {
        var empId = $pos.parent().parent().children().eq(0).children().val();
        $.ajax({
            url: '<?php echo site_url('staff/deleteStaff');?>',
            type: 'POST',
            data: {
                "empId": empId
            }
        }).success(function () {
            location.reload();
        });
    }
</script>