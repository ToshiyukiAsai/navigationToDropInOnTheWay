<?php
App::uses('AppModel', 'Model');
App::uses('Spot', 'Model');

/**
 * YourNavi Model
 *
 * @remark yournavigationのAPIを叩きます
 *
 *
 */

class YourNavi extends AppModel {
	public $useTable = false;
	public $uses = array('Spot');

/**
 * geoRelationship method
 * @param array from(lat, lon), to(lat, lon)
 * return array  result api
 * */

	public function geoRelationship($from, $to) {
		// $query = 'http://www.yournavigation.org/api/1.0/gosmore.php?format=geojson&flat=43.083603069181&flon=141.34148001116&tlat=43.004677218232&tlon=141.34811713738&v=motorcar&fast=1&layer=mapnik';
		$query = 'http://www.yournavigation.org/api/1.0/gosmore.php?format=geojson&flat='.$from['lon'].'&flon='.$from['lat'].'&tlat='.$to['lon'].'&tlon='.$to['lat'].'&v=motorcar&fast=1&layer=mapnik&lang=ja';
		// print_r($query);
		$data = file_get_contents($query);
		$data = json_decode($data);
		$dataArray = array();
		$results = array();
		foreach ($data as $key => $value) {
			$dataArray[] = (array)$value;
		}
		// print_r($results);
		return array(
			'coordinates' => $dataArray[2],
			'distance' => $dataArray[3]['distance'],
			'traveltime' => $dataArray[3]['traveltime']
		);

	}

	public function nearestSpots ($from, $to, $allowtime) {
		$this->Spot = new Spot();
		$nearestSpots = $this->Spot->getAroundSpotsMethods(array($from, $to), 3, 'all');

		$results = array();
		// print_r($n)
		foreach ($nearestSpots as $spot) {
			// $route1 = $this->geoRelationship($from, $spot[0]);
			// sleep(0.5);
			// $route2 = $this->geoRelationship($spot[0], $to);
			// print_r($route1);
			// print_r($route2);
			// $traveltime = $route1['distance'] * 2 + $route2['distance'] * 2;
			// echo $traveltime;
			// if($traveltime <= $allowtime) {
				$results[] = array(
					'lat' => $spot[0]['lon'],
					'lon' => $spot[0]['lat'],
					'len' => $spot[0]['len']
					);
				// print_r($route2);
				if(count($results) >= 3) break;
			// }


			// $route1 = $this->geoRelationship($from, $spot[0]);
			// // sleep(0.5);
			// $route2 = $this->geoRelationship($spot[0], $to);
			// // print_r($route1);
			// // print_r($route2);
			// $traveltime = $route1['distance'] * 2 + $route2['distance'] * 2;
			// // echo $traveltime;
			// if($traveltime <= $allowtime) {
			// 	$results[] = array(
			// 		'lat' => $spot[0]['lon'],
			// 		'lon' => $spot[0]['lat'],
			// 		'len' => $spot[0]['len']
			// 		);
			// 	// print_r($route2);
			// 	if(count($results) >= 3) break;
			// }



		}

		return $results;

	}

}
