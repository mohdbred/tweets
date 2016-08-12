<?php
/*
* Mohd Belal custom form_helper
*/

// Override validaton_errors to add error class to paragraph tags
if ( ! function_exists('validation_errors'))
{
	function validation_errors($prefix = '', $suffix = '')
	{
		if (FALSE === ($OBJ =& _get_validation_object()))
		{
			return '';
		}

        if($prefix == '' && $suffix == '')
        {
            $prefix = '<p class="error">';
            $suffix = '</p>';
        }

		return $OBJ->error_string($prefix, $suffix);
	}
}
