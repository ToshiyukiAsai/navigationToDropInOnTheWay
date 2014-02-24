<?php
App::uses('AppModel', 'Model');
/**
 * Link Model
 *
 */
class Link extends AppModel {
	public $uses = array('Link', 'YourNavi');

	public function routes($spotIds, $allowtime, $startLatlon, $goalLatlon) {
		$candidateLinks = $this->candidateLinks($spotIds);

		// $routes['traveltime'] = 0;
		// $routes['staytime'] = 0;
		// for( $i=0; $i<count($candidateLinks); $i++ ) {
		// 	$tmp = array();
		// 	$tmp['traveltime'] = 0;
		// 	$tmp['staytime'] = 0;
		// 	// $tmp[$i][] = $candidateLinks[$i];
		// 	$tmp['traveltime'] = $candidateLinks[$i]['Link']['distance'] / 30 * 60; //時速30kmでの
		// }

		$routes = array();
		while(count($routes) < 10) {
			$candidateRoute = $this->randomRouteMaker($candidateLinks, 5);
			//要件を満たしているのかチェックする
			$this->checkAdd($candidateRoute, $routes, $allowtime, $startLatlon, $goalLatlon);
		}
		// do {

		// 	$candidateRoute = $this->randomRouteMaker($candidateLinks, 5);
		// 	//要件を満たしているのかチェックする
		// 	$this->checkAdd($candidateRoute, $routes, $allowtime);
		// 	debug($routes);
		// 	debug(count($routes));
		// } while (count($routes) <=10);

		return $routes;
	}


	public function randomRouteMaker($links, $spotNum = 5, $spots = null, $results = null ) {

		if($spots == null) {
			$from = array_rand($links);
			$link = array_rand($links[$from]);
			$route = $links[$from][$link];
			$coordinates = $this->modifyCoordinate($route[0]['coordinate']);
			$spots = array($route['Link']['spotFrom'], $route['Link']['spotTo']);
			$results = array();
			$results[] = array(
				'Link' => $route['Link'],
				'coordinates' => $coordinates,
				'co' => $route[0]['coordinate']
			);
		} elseif (count($spots) -1 == $spotNum ) {
			return $results;
		}
		$count = count($spots)-2;
		$from = $results[$count]['Link']['spotTo'];//$first['Link']['spotTo'];
		$link = array_rand($links[$results[$count]['Link']['spotTo']]);
		while (in_array($link, $spots)) {
			$link = array_rand($links[$results[$count]['Link']['spotTo']]);
		}
		$route = $links[$from][$link];
		$coordinates = $this->modifyCoordinate($route[0]['coordinate']);
		$spots[] = $route['Link']['spotTo'];
		$results[] = array(
			'Link' => $route['Link'],
			'coordinates' => $coordinates,
				'co' => $route[0]['coordinate']
		);

		return $this->randomRouteMaker($links, $spotNum, $spots, $results );

	}

	public function candidateLinks($ids) {
		$results = array();
		for( $i=0; $i<count($ids); $i++ ) {
			// $results = array_merge($results, $this->find('all',array(
			// 		'conditions' => array(
			// 			'Link.spotFrom' => $ids[$i],
			// 			'Link.spotTo' => $ids
			// 		),
			// 		'fields' => array(
			// 			'Link.id', 'Link.spotFrom', 'Link.spotTo', 'Link.traveltime', 'Link.distance', 'ASTEXT(Link.coordinate) as coordinate'
			// 		)
			// 	)
			// ));

			$results[$ids[$i]] = $this->find('all',array(
					'conditions' => array(
						'Link.spotFrom' => $ids[$i],
						'Link.spotTo' => $ids
					),
					'fields' => array(
						'Link.id', 'Link.spotFrom', 'Link.spotTo', 'Link.traveltime', 'Link.distance', 'ASTEXT(Link.coordinate) as coordinate'
					)
				)
			);

			// debug($this->find('all',array(
			// 		'conditions' => array(
			// 			'Link.spotFrom' => $ids[$i],
			// 			'Link.spotTo' => $ids
			// 		),
			// 		'fields' => array(
			// 			'Link.id', 'Link.spotFrom', 'Link.spotTo', 'Link.traveltime', 'Link.distance', 'ASTEXT(Link.coordinate) as coordinate'
			// 		)
			// 	)
			// ));
		}
		return $results;
	}

	public function checkAdd($route, &$routes, $allowtime, $startLatlon, $goalLatlon) {
		$traveltime = 0;
		$staytime = 0;
		foreach ($route as $link) {
			$traveltime += $link['Link']['distance'] / 30 * 60; //時速30kmでの
			$staytime += 20; //滞在時間を20分に固定
		}
			$staytime -= 20;
		//ほんとはスタートとゴールを結ぶよ
			// $start = $this->YourNavi->geoRelationship($startLatlon, )
			$required = $traveltime + $staytime;
			if($required <= $allowtime ) {
				$routes[] = array('route' => $route, 'required' => $required);
			}

	}

	public function modifyCoordinate($coordinate) {
		$resultString = ltrim($coordinate, 'LINESTRING(');
		$resultString = rtrim($resultString, ')');
		$latlon = explode(',', $resultString);
		$results = array();
		foreach ($latlon as $l) {
			$tmp = explode(' ', $l);
			$results[] = array('lat' => $tmp[0], 'lon' => $tmp[1]);
		}
		return $results;
	}


}
