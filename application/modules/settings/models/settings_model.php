<?php
/**
 * CMS Canvas
 *
 * @author      Mohd Belal
 * @copyright   Copyright (c) 2016
 * @license     MIT License
 * @link        http://cmscanvas.com
 */

class Settings_model extends DataMapper
{	
    public $table = "settings";
    
    public function get_setting_by_slug($slug = '') {
        $this->db->select('value');
        $this->db->from($this->table);
        $this->where('slug',$slug);
        $data = $this->db->get()->row_array();
        return $data['value'];
    }
}


