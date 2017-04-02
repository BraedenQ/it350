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
                                <th class="hide"></th>
                                <th class="hide"></th>
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
                    <button class="btn btn-primary pull-right" onclick="enableEditMode($(this))">Edit Staff</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function enableEditMode($button) {
        $('.empId').each(function () { //Loops through the employee rows
            var $row = $(this).parent(); //grab the rows
            $row.children().each(function () { //Loop through the elements in the row
                var temp = $(this).text();
                $(this).html("<input type='text' class='form-control' value='" + temp + "'/>");    
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
            debugger;
            location.reload();
        }).error(function() {
            debugger;
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
            var firstName = $row.children().eq(2).children().val();
            var lastName = $row.children().eq(3).children().val();
            var address = $row.children().eq(4).children().val();
            var startDate = $row.children().eq(5).children().val();
            var notes = $row.children().eq(6).children().val();
            var staffMember = new employee(empId, jobId, firstName, lastName, address, startDate, notes);
            employees[i] = staffMember;
        });
        return employees;
    }
</script>