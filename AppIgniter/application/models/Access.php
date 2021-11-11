<?php
class Access extends CI_Model {

    /**
     * Check login credentials 
     */
    public function checkLogin($username,$password){
        $sql = "Select * from auth where username='$username' and password='$password'";
        $query = $this->db->query($sql);
        $row = $query->result();
       
        if($row != null){
            $token = $this->generate_access_token($username);
            $sql = "UPDATE auth SET token='$token' WHERE username='$username'";
            $query = $this->db->query($sql);

            return $query? $token:null;
        }
        return false;
    }

    /**
     * Check the token 
     */
    function checkToken($username,$token){
        $sql = "Select * from auth where username='$username' and token='$token'";
        $query = $this->db->query($sql);
        $row = $query->result();
        return $row ;
    }

    /**
     * Generate new token 
     */
    function generate_access_token($user){
        $date_time  = date_timestamp_get(date_create());
        $random = random_int(0,999999);
        $token = $user.".".$date_time.".".$random."appIgniter";
        return base64_encode($token);
    }


}