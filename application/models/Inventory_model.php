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
    public function get_latest_inventory($busID)
    {
                //die(print("user: ".$username."password: ".$password));

        $session_data = $this->session->userdata('logged_in');
        $busID = $session_data['busID'];

        $this -> db -> select('invID');
        $this -> db -> from('inventory');
        $this -> db -> where('busID', $busID);
        $this->db->order_by("invID", "desc");
        $this -> db -> limit(1);
        $query = $this -> db -> get();

        //$query = $this -> db -> query('SELECT transID from transactions where buildID = 1 order by transID desc limit 1');
        //$query = $this->db->query("SELECT * FROM transactions where ")
        //return $query->row_array();
        return $query->row()->invID;
    }
    public function add_inventory($description, $numUnits, $invID,$busID)
    {
        $data = array(
            'invID' => ($invID + 1),
            'busID' => $busID,
            'description' => $description,
            'numberOfUnits'=> $numUnits
        );
        $this->db->insert('inventory',$data);

   
    }

    public function remove_inventory($invID, $busID)
    {
        $data = array('invID'=>$invID, 'busID'=>$busID,);
        $this->db->delete('inventory',$data);
   
    }
    public function edit_inventory($invID, $inventoryData, $busID)
    {
        $this->db->where('invID', $invID);
        $this->db->where('busID', $busID);
        $this->db->update('inventory', $inventoryData);

    }
}
?>