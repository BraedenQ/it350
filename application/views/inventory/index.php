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
							<th>Inventory ID</th>
							<th>Description</th>
							<th>Number of Units</th>
						</tr>
						<?php foreach ($inventory as $item): ?>
							<tr>
						       <td class="invId"><?php echo "{$item['invID']}"; ?></td>
						       <td><?php echo "{$item['description']}"; ?></td>
						       <td><?php echo "{$item['numberOfUnits']}"; ?></td>
					       </tr>   
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-md-3"></div>
			</div>

			<div class="col-md-9">
				<a class="btn btn-primary pull-right" href="<?php echo site_url('Inventory/editInventory'); ?>">Add/Delete Inventory</a>
			</div>
			<button class="btn btn-primary" onclick="enableEditMode($(this))">Edit Inventory</button>
		</div>
	</div>
</div>

<script type="text/javascript">
    function enableEditMode($button) {
        $('.invId').each(function () { //Loops through the employee rows
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
        var inventory =  [];
        $('.invID').each(function (i) {
            var $row = $(this).parent();
            var invID = $row.children().eq(0).children().val();
            var description = $row.children().eq(1).children().val();
            var numberOfUnits = $row.children().eq(2).children().val();
            var itemObject = new item(invID, description, numberOfUnits);
            inventory[i] = itemObject;
        });
        $button.text("Edit Inventory");
        $button.attr("onclick", "enableEditMode($(this))");
        $.ajax({
            url: '<?php echo site_url('inventory/updateInventory');?>',
            type: 'POST',
            data: {
                "inventory": inventory
            }
        }).success(function () {
            debugger;
            location.reload();
        }).error(function() {
            debugger;
        });
    }

    function item(invID, description, numberOfUnits) {
        this.invID = invID,
        this.description = description,
        this.numberOfUnits = numberOfUnits
    }
</script>