<?php
class EditTransactions_model extends CI_Model {

    public function get_latest_transaction()
	{
        //die(print("user: ".$username."password: ".$password));
        $query = $this -> db -> query('SELECT transID from transactions where buildID = 1 order by transID desc limit 1');
        //$query = $this->db->query("SELECT * FROM transactions where ")
        //return $query->row_array();
        return $query->result();
    }
    public function add($type, $amount, $transaction)
    {
    	$data = array(
    		'transID' => $transaction,
    		'buildID' => 1,
    		'type' => $type,
    		'amount'=> $amount
    	);
    	$this->db->insert('transactions',$data);

   
	}
}
?>
