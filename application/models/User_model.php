<?php
Class User_model extends CI_Model
{

 function login($username, $password)
 {
  //die(print("user: ".$username."password: ".$password));
   $this -> db -> select('userID, username, password,busID');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
   $query = $this -> db -> get();

   
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>