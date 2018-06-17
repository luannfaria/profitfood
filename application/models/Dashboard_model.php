<?php

/**
 *
 */
class Dashboard_model extends CI_Model
{

  function __construct() {
      parent::__construct();
  }

public function check_credentials($login) {
    $this->db->where('login', $login);

    $this->db->limit(1);
    return $this->db->get('usuario')->row();
}

public function count($table) {
    return $this->db->count_all($table);
}

}
