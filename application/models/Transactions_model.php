<?php
class Transactions_model extends CI_Model {


    public function get_transactions()
	{
        //die(print("user: ".$username."password: ".$password));
        //$query = $this -> db -> query('SELECT * from transactions where buildID = 2');
        $query = $this->db->get_where('transactions', array('buildID' => 2));
        return $query->row_array();

    }
}