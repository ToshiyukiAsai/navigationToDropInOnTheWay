<?php
App::uses('AppController', 'Controller');
/**
 * Api Controller
 *
 */
class ApiController extends AppController {
	public $uses = array('Spot', 'YourNavi', 'Route', 'Link');
/**
 * nearSites method
 *
 * @method POST
 * @param array s_lat, s_lon, g_lat, g_lon
 * @return spots
 */

	public function nearSites () {
		if ( true ){ //$this->request->is('ajax') && $this->request->isPost() ) {

			//request check
			if( !(
				  !empty($this->request->data['flat']) &&
				  !empty($this->request->data['flon']) &&
				  !empty($this->request->data['tlat']) &&
				  !empty($this->request->data['tlon']) &&
				  is_numeric($this->request->data['flat']) &&
				  is_numeric($this->request->data['flon']) &&
				  is_numeric($this->request->data['tlat']) &&
				  is_numeric($this->request->data['tlon'])
				) ) {
				$results = array( 'error' => 'POSTデータがおかしいです。' );
				$this->response->statusCode(400);
				$this->viewClass = 'Json';
				$this->set('results', $results);
				$this->set('_serialize', array('results'));
				return ;
			}

			$results = $this->Spot->getAroundSpotsMethods(array(
				array('lat' => $this->request->data['flon'],
								 'lon' => $this->request->data['flat'],
				),
				array('lat' => $this->request->data['tlon'],
								 'lon' => $this->request->data['tlat'],
				)
			), 0);
	//デバッグ用
			// $results = $this->Spot->getAroundSpotsMethods(array(
			// 	array('lat' => 141.100738,
			// 		  'lon' => 42.870932,
			// 	),
			// 	array('lat' => 141.539183,
			// 		  'lon' => 43.153102,
			// 	)
			// ), 0);

			$this->response->statusCode(200);
			$this->viewClass = 'Json';
			$this->set('results', $results);
			$this->set('_serialize', array('results'));


		} else {
				$results = array( 'error' => 'POSTでないか、ajaxでのリクエストではありません。' );
				$this->response->statusCode(400);
				$this->viewClass = 'Json';
				$this->set('results', $results);
				$this->set('_serialize', array('results'));
				return ;
		}
	}


/**
 * fromToRoute method
 *
 * @method POST
 * @param array flat, flon, tlat, tlon
 * @return route
 */

	public function fromToRoute () {
		if ( true ){ //$this->request->is('ajax') && $this->request->isPost() ) {

			//request check
			if( !(
				  !empty($this->request->data['flat']) &&
				  !empty($this->request->data['flon']) &&
				  !empty($this->request->data['tlat']) &&
				  !empty($this->request->data['tlon']) &&
				  is_numeric($this->request->data['flat']) &&
				  is_numeric($this->request->data['flon']) &&
				  is_numeric($this->request->data['tlat']) &&
				  is_numeric($this->request->data['tlon'])
				) ) {
				$results = array( 'error' => 'POSTデータがおかしいです。' );
				$this->response->statusCode(400);
				$this->viewClass = 'Json';
				$this->set('results', $results);
				$this->set('_serialize', array('results'));
				return ;
			}

			$results = $this->YourNavi->geoRelationship(
				array('lat' => $this->request->data['flon'],
					  'lon' => $this->request->data['flat'],
				),
				array('lat' => $this->request->data['tlon'],
					  'lon' => $this->request->data['tlat'],
				)
			);
	//デバッグ用
			// $results = $this->YourNavi->geoRelationship(
			// 	array('lat' => 141.346733,
			// 		  'lon' => 43.078692,
			// 	),
			// 	array('lat' => 141.335286,
			// 		  'lon' => 42.984495,
			// 	)
			// );

			$this->response->statusCode(200);
			$this->viewClass = 'Json';
			$this->set('results', $results);
			$this->set('_serialize', array('results'));


		} else {
				$results = array( 'error' => 'POSTでないか、ajaxでのリクエストではありません。' );
				$this->response->statusCode(400);
				$this->viewClass = 'Json';
				$this->set('results', $results);
				$this->set('_serialize', array('results'));
				return ;
		}

	}


/**
 * fromToRoutes method
 *
 * @method POST
 * @param array flat, flon, tlat, tlon, targetTime
 * @return route
 */

	public function fromToRoutes () {
		if ( true ){ //$this->request->is('ajax') && $this->request->isPost() ) {

			//request check
			if( !(
				  !empty($this->request->data['flat']) &&
				  !empty($this->request->data['flon']) &&
				  !empty($this->request->data['tlat']) &&
				  !empty($this->request->data['tlon']) &&
				  !empty($this->request->data['targetTime']) &&
				  is_numeric($this->request->data['flat']) &&
				  is_numeric($this->request->data['flon']) &&
				  is_numeric($this->request->data['tlat']) &&
				  is_numeric($this->request->data['tlon'])
				) ) {
				$results = array( 'error' => 'POSTデータがおかしいです。' );
				$this->response->statusCode(400);
				$this->viewClass = 'Json';
				$this->set('results', $results);
				$this->set('_serialize', array('results'));
				return ;
			}

			$goaltime = new DateTime($this->request->data['targetTime']);
			$now = new DateTime();
			$allowtime = ( strtotime($goaltime->format('Y-m-d H:i:s')) - strtotime($now->format('Y-m-d H:i:s')) ) / 60;

			$candidateSpots = $this->Spot->getAroundSpotsMethods(array(
				array('lat' => $this->request->data['flon'],
								 'lon' => $this->request->data['flat'],
				),
				array('lat' => $this->request->data['tlon'],
								 'lon' => $this->request->data['tlat'],
				)
			), 0,'list');

	//デバッグ用
			// $candidateSpots = $this->Spot->getAroundSpotsMethods(array(
			// 	array('lat' => 141.346733,
			// 		  'lon' => 43.078692,
			// 	),
			// 	array('lat' => 141.335286,
			// 		  'lon' => 42.984495,
			// 	)
			// ), 0,'list');

			// debug($candidateSpots);
			$spotIds = array_keys($candidateSpots);
			// debug($spotIds);
			// $candidateLinks = $this->Link->routes($spotIds, $allowtime);
			$candidateLinks = $this->Link->routes($spotIds, 300, array(
					  'lat' => 141.346733,
					  'lon' => 43.078692,
				),
				array('lat' => 141.335286,
					  'lon' => 42.984495,
				)
			);
			// $candidateLinks = $this->Link->find('all',array(
			// 		'conditions' => array(
			// 			'OR' => array(
			// 				'Link.spotFrom' => $spotIds,
			// 				'Link.spotTo' => $spotIds
			// 			)
			// 		)
			// 	)
			// );
			// debug($candidateLinks);

	//デバッグ用
			// $results = $this->YourNavi->geoRelationship(
			// 	array('lat' => 141.346733,
			// 		  'lon' => 43.078692,
			// 	),
			// 	array('lat' => 141.335286,
			// 		  'lon' => 42.984495,
			// 	)
			// );

			$this->response->statusCode(200);
			$this->viewClass = 'Json';
			$this->set('results', $candidateLinks);
			$this->set('_serialize', array('results'));


		} else {
				$results = array( 'error' => 'POSTでないか、ajaxでのリクエストではありません。' );
				$this->response->statusCode(400);
				$this->viewClass = 'Json';
				$this->set('results', $results);
				$this->set('_serialize', array('results'));
				return ;
		}

	}




	public function routes () {
		if ( true ){ //$this->request->is('ajax') && $this->request->isPost() ) {

			//request check
			// if( !(
			// 	  !empty($this->request->data['flat']) &&
			// 	  !empty($this->request->data['flon']) &&
			// 	  !empty($this->request->data['tlat']) &&
			// 	  !empty($this->request->data['tlon']) &&
			// 	  is_numeric($this->request->data['flat']) &&
			// 	  is_numeric($this->request->data['flon']) &&
			// 	  is_numeric($this->request->data['tlat']) &&
			// 	  is_numeric($this->request->data['tlon'])
			// 	) ) {
			// 	$results = array( 'error' => 'POSTデータがおかしいです。' );
			// 	$this->response->statusCode(400);
			// 	$this->viewClass = 'Json';
			// 	$this->set('results', $results);
			// 	$this->set('_serialize', array('results'));
			// 	return ;
			// }

			// $results = $this->YourNavi->geoRelationship(
			// 	array('lat' => $this->request->data['flon'],
			// 		  'lon' => $this->request->data['flat'],
			// 	),
			// 	array('lat' => $this->request->data['tlon'],
			// 		  'lon' => $this->request->data['tlat'],
			// 	)
			// );
	//デバッグ用
			$results = $this->YourNavi->geoRelationship(
				array('lat' => 141.346733,
					  'lon' => 43.078692,
				),
				array('lat' => 141.335286,
					  'lon' => 42.984495,
				)
			);

			$this->response->statusCode(200);
			$this->viewClass = 'Json';
			$this->set('results', $results);
			$this->set('_serialize', array('results'));


		} else {
				$results = array( 'error' => 'POSTでないか、ajaxでのリクエストではありません。' );
				$this->response->statusCode(400);
				$this->viewClass = 'Json';
				$this->set('results', $results);
				$this->set('_serialize', array('results'));
				return ;
		}

	}


/**
 * getYoriSpots method
 *
 * @method POST
 * @param flat, flon, tlat, tlon, targetTime
 * @return links
 */


	public function getYoriSpots () {
		if ( true ){ //$this->request->is('ajax') && $this->request->isPost() ) {

			//request check
			// if( !(
			// 	  !empty($this->request->data['flat']) &&
			// 	  !empty($this->request->data['flon']) &&
			// 	  !empty($this->request->data['tlat']) &&
			// 	  !empty($this->request->data['tlon']) &&
			// 	  !empty($this->request->data['targetTime']) &&
			// 	  is_numeric($this->request->data['flat']) &&
			// 	  is_numeric($this->request->data['flon']) &&
			// 	  is_numeric($this->request->data['tlat']) &&
			// 	  is_numeric($this->request->data['tlon'])
			// 	) ) {
			// 	$results = array( 'error' => 'POSTデータがおかしいです。' );
			// 	$this->response->statusCode(400);
			// 	$this->viewClass = 'Json';
			// 	$this->set('results', $results);
			// 	$this->set('_serialize', array('results'));
			// 	return ;
			// }

			// $goaltime = new DateTime($this->request->data['targetTime']);
			// $now = new DateTime();
			// $allowtime = ( strtotime($goaltime->format('Y-m-d H:i:s')) - strtotime($now->format('Y-m-d H:i:s')) ) / 60;


			// $results = $this->YourNavi->nearestSpots(
			// 	array('lat' => $this->request->data['flon'],
			// 		  'lon' => $this->request->data['flat'],
			// 	),
			// 	array('lat' => $this->request->data['tlon'],
			// 		  'lon' => $this->request->data['tlat'],
			// 	),
			// 	$allowtime
			// );
	//デバッグ用
			$results = $this->YourNavi->nearestSpots(
				array('lat' => 141.339387,
					  'lon' => 43.077587,
				),
				array('lat' => 142.416404,
					  'lon' => 43.405047,
				),
				300
			);
			debug($results);
			$this->response->statusCode(200);
			// $this->viewClass = 'Json';
			$this->set('results', $results);
			$this->set('_serialize', array('results'));


		} else {
				$results = array( 'error' => 'POSTでないか、ajaxでのリクエストではありません。' );
				$this->response->statusCode(400);
				$this->viewClass = 'Json';
				$this->set('results', $results);
				$this->set('_serialize', array('results'));
				return ;
		}

	}



}
