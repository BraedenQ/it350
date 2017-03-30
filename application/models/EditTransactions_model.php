<?php
class editTransactions_model extends CI_Model {


    public function get_latest_transaction($buildID)
	{
        //die(print("user: ".$username."password: ".$password));

        $session_data = $this->session->userdata('logged_in');
        $busID = $session_data['busID'];

        $this -> db -> select('transID');
        $this -> db -> from('transactions');
        $this -> db -> where('buildID', $buildID);
        $this->db->order_by("transID", "desc");
        $this -> db -> limit(1);
        $query = $this -> db -> get();

        //$query = $this -> db -> query('SELECT transID from transactions where buildID = 1 order by transID desc limit 1');
        //$query = $this->db->query("SELECT * FROM transactions where ")
        //return $query->row_array();
        return $query->row()->transID;
    }
    public function add($type, $amount, $transaction,$busID)
    {
    	$data = array('transID' => ($transaction + 1),
    		
    		'buildID' => $busID,
    		'type' => $type,
    		'amount'=> $amount
    	);
    	$this->db->insert('transactions',$data);

   
	}
    public function get_transactions($buildID)
    {
        $this -> db -> select('transID,buildID,type,amount');
        $this -> db -> from('transactions');
        $this -> db -> where('buildID', $buildID);
        $query = $this -> db -> get();
        //$query = $this -> db -> query('SELECT * from transactions where buildID = 1');
        return $query->result_array();
    }

    public function remove($transID)
    {
        $data = array('transID'=>$transID);
        $this->db->delete('transactions',$data);
   
    }
}
?>
