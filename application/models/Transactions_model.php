<?php
class Transactions_model extends CI_Model {

    public function get_transactions($busID)
	{
        //die(print("user: ".$username."password: ".$password));
        //$query = $this -> db -> query('SELECT * from transactions where buildID = 1');

		// NOTE: I know this I am assuming that a BusID is a building ID but we could add logic if we needed to.

        $this -> db -> select('transID, buildID,type,amount');
   		$this -> db -> from('transactions');
   		$this -> db -> where('buildID', $busID);
   		$query = $this -> db -> get();

        //$query = $this->db->query("SELECT * FROM transactions where ")
        //return $query->row_array();
        return $query->result_array();
    }

}
?>