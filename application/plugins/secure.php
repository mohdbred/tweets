<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * CMS Canvas
 *
 * @author      Mohd Belal
 * @copyright   Copyright (c) 2016
 * @license     MIT License
 * @link        http://cmscanvas.com
 */

class Secure_plugin extends Plugin
{
    public function is_auth()
    {
        return ($this->secure->is_auth()) ? 1 : 0;
    }
}


