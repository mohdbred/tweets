<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CMS Canvas
 *
 * @author      Mark Price
 * @copyright   Copyright (c) 2016
 * @license     MIT License
 * @link        http://cmscanvas.com
 */

class Standard_result
{
    /*
     * Exists
     *
     * Checks to that query result found
     *
     * @return bool
     */
    function exists()
    {
        if (isset($this->id))
        {
            return TRUE;
        }

        return FALSE;
    }
}
