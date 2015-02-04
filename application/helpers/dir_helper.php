<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('calc_directory'))
{
    function calc_directory($language, $now)
	{
		$yes = "";
		
		switch($language)
		{
			case '1': $yes = 'english'; break;
			case '2': $yes = 'bisaya';  break;
			default:
				echo json_encode('fail');
				return;
				break;
		}
		
		date_default_timezone_set('Asia/Manila');
		
		$firstDay = strtotime("2013-12-01");
		$datediff = (($now - $firstDay)/(60*60*24)) % 1095;
		$day = '';
		
		if(date('D', $now) === 'Sun') {
			$yes = $yes.'/sunday';
			
			if($datediff > 730) { $yes = $yes.'/yearC'; }
			else if($datediff > 365) { $yes = $yes.'/yearB'; } 
			else { $yes = $yes.'/yearA'; }

			$datediff = $datediff % 365;
			$day = round($datediff / 7) + 1;
		} else {
			$yes = $yes.'/daily';
			
			if($datediff > 365 && $datediff <= 730){ $yes = $yes.'/odd'; }
			else { $yes = $yes.'/even'; }

			$datediff = $datediff % 365;
			$day = $datediff - floor($datediff / 7) + 1;
		}
		
		$myFile = '././html_attrib/parishStyles/readings/'.$yes.'/day'.$day.'.txt';
		
		return $myFile;
	}
}

?>

