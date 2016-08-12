<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Search_model extends CI_Model {

    public $speciality_table = "mst_specialties";
    public $speciality_link_table = "user_specialties_link";
    public $table = "users";

    public function getSearchData($content = NULL) {
        $condition = array();
        $condition_area = array();
        if ($content) {
            foreach ($content as $key => $value) {
                if (isset($value) && $value && $key != 'form_name' && $key != 'form_id') {
                    $condition[$key] = $value;
                }
            }
        } else {
            return FALSE;
        }
        if ($condition) {
            foreach ($condition as $key => $value) {
                if ((isset($value) && $value) && ($key == 'city' || $key == 'state' || $key == 'zip' || $key == 'company')) {
                    $condition_area[$key] = $value;
                }
            }
            $condition_area['user_type_id'] = $content['form_id'];

            $this->db->select('a.*');
            $this->db->from('users as a');
            if (isset($condition['specialties']) && $condition['specialties']) {
                $this->db->join('user_specialties_link as b', 'a.id=b.user_id', 'left');
            }
            if (isset($condition['conditions']) && $condition['conditions']) {
                $this->db->join('user_conditions_treated_link as c', 'a.id=c.user_id', 'left');
            }
            if (isset($condition['procedures']) && $condition['procedures']) {
                $this->db->join('user_procedures_performed_link as d', 'a.id=d.user_id', 'left');
            }
            if (isset($condition['amenities']) && $condition['amenities']) {
                $this->db->join('user_amenities_link as e', 'a.id=e.user_id', 'left');
            }
            if (isset($condition['insurance']) && $condition['insurance']) {
                $this->db->join('user_insurance_link as f', 'a.id=f.user_id', 'left');
            }
            $query = $this->db->where($condition_area)->get();
            return $query->result();
        }
    }

}
