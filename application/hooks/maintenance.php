<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class maintenance
{
    var $CI;
    public function maintenance()
    {
        $this->CI =& get_instance();
        $this->CI->load->config("config_maintenance");
        if(config_item("maintenance"))
        {
            $_error =& load_class('Exceptions', 'core');
            echo $_error->show_error("", "", 'error_maintenance', 200);
            exit;
        }
    }
}