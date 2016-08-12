<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * CMS Canvas
 *
 * @author      Mohd Belal
 * @copyright   Copyright (c) 2016
 * @license     MIT License
 * @link        http://cmscanvas.com
 */

class Theme_plugin extends Plugin
{
    public function partial()
    {
        $data = $this->attributes();
        unset($data['name']);

        return theme_partial($this->attribute('name'), $data);
    }
}

