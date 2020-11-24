
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getdistancebyparam {
 public function getdistance($lats,$lons){
	 	
	 	// $latitudeTo = '10.4255057';
	 	// $longitudeTo = '76.33044159999997';
	 	// $this->distance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo,"K");
	 	$earthRadius = 6371000;
	 	$radius = 8;//km
	 	// $this->load->model('display_modal');
	 	// $this->load->model('display_modal', '', TRUE);


	 	$n_rows = count($results);
	 	$placename = '';
	 	$storeid = '' ;
		for($i=0; $i<$n_rows; $i++) {
			if($this->distance($lats,$lons,$results[$i]->store_lat,$results[$i]->store_lon,"K") < $radius){
				$placename = $placename . $results[$i]->store_name . ",";
				$storeid = $storeid . $results[$i]->store_id . ",";
			}
		}

	 	return $storeid;
	 	// return $storeid;
		
// 	 	echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
	 }
	 function distance($lat11, $lon11, $lat22, $lon22, $unit) {
	 	$lat1 = floatval($lat11);
	 	$lon1 = floatval($lon11);
	 	$lat2 = floatval($lat22);
	 	$lon2 = floatval($lon22);
	  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
	    return 0;
	  }
	  else {
	    $theta = $lon1 - $lon2;
	    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	    $dist = acos($dist);
	    $dist = rad2deg($dist);
	    $miles = $dist * 60 * 1.1515;
	    $unit = strtoupper($unit);

	    if ($unit == "K") {
	      return ($miles * 1.609344);
	    } 
	    // else if ($unit == "N") {
	    //   return ($miles * 0.8684);
	    // } else {
	    //   return round($miles,2);
	    // }
	  }
	}
}
?>