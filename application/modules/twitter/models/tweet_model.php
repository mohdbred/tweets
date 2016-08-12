<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 class Tweet_model extends DataMapper {
    public $table = "tweet";

    // Count all record of table "tweet" in database.
public function record_count() {
return $this->db->count_all("tweet");
}
    
    // Fetch data according to per_page limit.
public function fetch_data($limit, $id) {
    $this->db->limit($limit);
    $this->db->where('id', $id);
    $query = $this->db->get("tweet");
    if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
    $data[] = $row;
    }

    return $data;
    }
    return false;
}
    
}