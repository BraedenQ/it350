Add a Transaction: <br/>
Last Transaction: <?php echo $latest ?> <br/>
<form name ="userinput" action="editTransactions/add" method="post">
      Transaction: <input type="number" name="transaction"> <br/> 
      Type: <input type="text" name="type"> <br/>
      Amount: <input type="number" name="amount"> <br/>
      <input type="submit" value="Submit">
  </form>