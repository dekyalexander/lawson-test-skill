<?php 

class Login_model extends CI_Model {

public function cek_user($data) {

$query = $this->db->get_where('tbl_login', $data);

return $query;

}

}
?>