<?php
class EditTransactions_model extends CI_Model {

    public function get_transactions()
	{
        //die(print("user: ".$username."password: ".$password));
        $query = $this -> db -> query('SELECT * from transactions where buildID = 1');
        //$query = $this->db->query("SELECT * FROM transactions where ")
        //return $query->row_array();
        return $query->result_array();
    }
    public function add($type, $amount)
    {
    	$query = $this -> db -> query("INSERT INTO transactions(buildID, type, amount) VALUES (1, {$type}, {$amount})";
    }
}
?>