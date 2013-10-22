<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Helper to get device info through the Kitmaker_Wurfl library.
 */

class WURFL_Device_Helper {

	const TABLET = "Tablet";
	const MOBILE_PHONE = "Mobile Phone";
	const MOBILE_DEVICE = "Mobile Device";
	
	const SMART_TV = "Smart TV";
	const DESKTOP_OR_LAPTOP = "Desktop or Laptop";
	
	public static function is_handheld($requestingDevice)
	{
		return $requestingDevice->getCapability('is_wireless_device') == 'true'; // according to WURFL docs, both laptop and desktop return false to this.
	}

	public static function identify_device($requestingDevice)
	{
		$is_wireless = static::is_handheld($requestingDevice);
		$is_smarttv = ($requestingDevice->getCapability('is_smarttv') == 'true');
		$is_tablet = ($requestingDevice->getCapability('is_tablet') == 'true');
		$is_phone = ($requestingDevice->getCapability('can_assign_phone_number') == 'true');
		
		if ($is_wireless) 
		{
			if ($is_tablet) 
			{
				$device = static::TABLET;
			} 
			else if ($is_phone) 
			{
				$device = static::MOBILE_PHONE;
			} 
			else 
			{
				$device = static::MOBILE_DEVICE;
			}
		} 
		else 
		{
			if ($is_smarttv) 
			{
				$device = static::SMART_TV;
			} 
			else 
			{
				$device = static::DESKTOP_OR_LAPTOP;
			}
		}
		
		return $device;
	}

}

?>