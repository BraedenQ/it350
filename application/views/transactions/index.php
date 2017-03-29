<h2><?php echo $title; ?></h2>
<table>
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
<br/>
<p><a href="<?php echo site_url('editTransactions'); ?>">Edit Transactions</a></p> 