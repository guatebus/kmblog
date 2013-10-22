<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Helper to get User Agent info.
 */

class KM_User_Agent_Helper {

	public static function get_user_agent_platform()
	{
		$CI =& get_instance();
		$CI->load->library('user_agent');
		return $CI->agent->platform();
	}
	
	public static function get_user_agent_info()
	{
		$CI =& get_instance();
		$CI->load->library('user_agent');
		
		if ($CI->agent->is_browser())
		{
			$agent = $CI->agent->browser().' '.$CI->agent->version();
		}
		elseif ($CI->agent->is_robot())
		{
			$agent = $CI->agent->robot();
		}
		elseif ($CI->agent->is_mobile())
		{
			$agent = $CI->agent->mobile();
		}
		else
		{
			$agent = 'Unidentified User Agent';
		}

		$info['agentInfo'] = $agent;
		$info['agent_platform'] = $CI->agent->platform();
		$info['agentString'] = $CI->agent->agent_string();
		
		return $info;
	}

}

?>