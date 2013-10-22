<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Helper to get User Agent info.
 */

class KM_User_Agent_Helper {

	public static function getUserAgentInfo()
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
		$info['agentPlatform'] = $CI->agent->platform();
		$info['agentString'] = $CI->agent->agent_string();
		
		return $info;
	}

}

?>