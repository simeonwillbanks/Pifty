<?php
class user_model extends model {
  public function get_by_id($id) {
    $query = $this->db->prepare("SELECT id, email FROM users where id = ?");
    $query->execute(array($id));
    return $query->fetch(PDO::FETCH_LAZY); 
  }
}