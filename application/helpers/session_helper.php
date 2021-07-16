<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	function __construct() {

		
	}

	function checkSession(){

	$CI =& get_instance();
    $is_logged_in = $CI->session->userdata('logged');
	    if(!isset($is_logged_in) || $is_logged_in != true){
	        	 redirect('C_Admin/login','refresh');      
		}else{
			 redirect('C_Admin','refresh');  
		}      
	}	

?>