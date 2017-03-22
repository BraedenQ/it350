<?php
Class User_model extends CI_Model
{

 function login($username, $password)
 {
  //die(print("user: ".$username."password: ".$password));
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
   $query = $this -> db -> get();


   // $query = $this->db->get_where('users', array('username' => $username,'password' => MD5($password)));
  //$query = $this->db->query("SELECT * FROM users WHERE username='".$username."' AND password='".MD5($password)."' LIMIT 1;");
  //die(print($query->num_rows()));
  //die(var_dump($query->result()));
   
   if($query -> num_rows() == 1)
   {
    //die(print("madeit"));
     //die(var_dump($query->result()));
     return $query->result();
   }
   else
   {
    // /die(print("not"));
     return false;
   }
 }
}
?>