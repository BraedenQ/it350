<?php
class Helloworld_model extends CI_Model {
 
    public function __construct()
    {
            $this->load->database();
    }



    function Helloworld_model()
    {
        // Call the Model constructor
        parent::Model();
    }


    public function get_news($name = "tanner")
    {
            // if ($name === FALSE)
            // {
            //         $query = $this->db->get('news');
            //         return $query->result_array();
            // }

            $query = $this->db->get_where('test', array('name' => $name));
            return $query->row_array();
    }


     
    // function getData()
    //     {
    //         //Query the data table for every record and row
    //         $query = $this->db->get('data');
             
    //         if ($query->num_rows() > 0)
    //         {
    //             //show_error('Database is empty!');
    //         }else{
    //             return $query->result();
    //         }
    //     }
 
}
?>
