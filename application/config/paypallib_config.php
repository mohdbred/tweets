<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// ------------------------------------------------------------------------ 
// Ppal (Paypal IPN Class) 
// ------------------------------------------------------------------------ 
// If (and where) to log ipn to file 
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';
$config['paypal_lib_ipn_log'] = TRUE;

// Where are the buttons located at  
$config['paypal_lib_button_path'] = 'buttons';

// What is the default currency? 
$config['paypal_lib_currency_code'] = 'USD';

// Enable Sandbox mode? 
$config['paypal_lib_sandbox_mode'] = TRUE;

$config['business']='alokb@test.com';
$config['return']=site_url('users/success');
$config['cancel_return']=site_url('users/cancel');
$config['notify_url']=site_url('users/notify');