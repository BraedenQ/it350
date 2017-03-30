<?php
class Inventory_model extends CI_Model {

    public function get_inventory($busID)
    {
        //die(print("user: ".$username."password: ".$password));
        //$query = $this -> db -> query('SELECT * from transactions where buildID = 1');

        // NOTE: I know this I am assuming that a BusID is a building ID but we could add logic if we needed to.
        if($this->session->userdata('logged_in'))
        {
            $this -> db -> select('invID, numberOfUnits, description');
            $this -> db -> from('inventory');
            $this -> db -> where('busID', $busID);
            $query = $this -> db -> get();

            //$query = $this->db->query("SELECT * FROM transactions where ")
            //return $query->row_array();
            return $query->result_array();
        }
        else 
        {
         //If no session, redirect to login page
         redirect('login', 'refresh');
        }
    }

}
?>