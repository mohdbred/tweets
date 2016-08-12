<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Print Recursive
 *
 * Simply wraps a print_r() in pre tags for debugging.
 *
 * @param mixed
 * @return string
 */
if ( ! function_exists('_pr'))
{
    function _pr($a)
    {
        echo "<pre>";
        print_r($a);
        echo "</pre>";
    }
}

// ------------------------------------------------------------------------

/*
 * Variable Dump
 *
 * Simply wraps a var_dump() in pre tags for debugging.
 *
 * @param mixed
 * @return string
 */
if ( ! function_exists('_vd'))
{
    function _vd($a)
    {
        echo "<pre>";
        var_dump($a);
        echo "</pre>";
    }
}


// ------------------------------------------------------------------------

/*
 * Is Ajax
 *
 * Returns true if request is ajax protocol
 *
 * @return bool
 */
if ( ! function_exists('is_ajax'))
{
    function is_ajax() 
    {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
    }
}

// ------------------------------------------------------------------------

/* 
 * Theme Partial
 *
 * Load a theme partial
 *
 * @param string
 * @param array
 * @param bool
 * @return string
 */
if ( ! function_exists('theme_partial'))
{
    function theme_partial($view, $vars = array(), $return = TRUE)
    {
        $CI =& get_instance();
        $CI->load->library('parser');
        return $CI->parser->parse_string($CI->load->theme($CI->template->theme . '/views/partials/' . trim($view, '/'), $vars, $return, $CI->template->theme_path), $vars, $return);
    }
}

// ------------------------------------------------------------------------

/* 
 * Theme Url
 *
 * Create a url to the current theme
 *
 * @param string
 * @return string
 */
if ( ! function_exists('theme_url'))
{
    function theme_url($uri = '')
    {
        $CI =& get_instance();
        return base_url($CI->template->theme_path . '/' . $CI->template->theme . '/'  . trim($uri, '/'));
    }
}

// ------------------------------------------------------------------------

/* 
 * Text to URL
 *
 * Create a url from the given text
 *
 * @param string
 * @return string
 */
if ( ! function_exists('makeClickableLinks'))
{
    function makeClickableLinks($s = '')
    {
        return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a target="blank" rel="nofollow" href="$1" target="_blank">$1</a>', $s);
    }
}
