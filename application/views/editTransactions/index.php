Add a Transaction: <br/>

<form name ="userinput" action="editTransactions/add" method="post">
	Type: <input type="text" name="type"> <br/>
	Amount: <input type="number" step="0.01" name="amount"> <br/>
	<input type="submit" value="Submit">
</form>

Delete a Transaction: <br/>
<form name ="userinput2" action="editTransactions/remove" method="post">
	Transaction ID: <input type="number" name="transID"> <br/>
	<input type="submit" value="Submit">
</form>
