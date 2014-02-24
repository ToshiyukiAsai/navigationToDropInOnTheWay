<?php
App::uses('AppModel', 'Model');
/**
 * Spot Model
 *
 * @property Information $Information
 */
class Spot extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $virtualFields = array(
    	'point' => "CONCAT(X(Spot.latlng), ' ', Y(Spot.latlng))"
	);



/**
 *
 * getAroundSpotsMethods method
 * @param array , int, string
 * @return method
 * */

	public function getAroundSpotsMethods(array $latlons, $method, $find='all') {
		//プラスマイナスのオフセット決定
		$offset = 0.1;

		switch ($method) {
			case 0:

				$flat = $latlons[0]['lat'];
				$flon = $latlons[0]['lon'];
				$tlat = $latlons[1]['lat'];
				$tlon = $latlons[1]['lon'];
				if($flat < $tlat) {
					// $offset = $tlat - $flat;
					$flat = $flat - $offset;
					$tlat = $tlat + $offset;
				} elseif ($flat > $tlat) {
					// $offset = $flat - $tlat;
					$flat = $flat + $offset;
					$tlat = $tlat - $offset;
				} else {
					$flat = $flat - $offset;
					$tlat = $tlat + $offset;
				}

				if($flon < $tlon) {
					// $offset = $tlon - $flon;
					$flon = $flon - $offset;
					$tlon = $tlon + $offset;
				} elseif ($flon > $tlon) {
					// $offset = $flon - $tlon;
					$flon = $flon + $offset;
					$tlon = $tlon - $offset;
				} else {
					$flon = $flon - $offset;
					$tlon = $tlon + $offset;
				}

				if ($find == 'all') {
					return $this->squareArounds(array(
							$flat." ".$flon,
							$tlat." ".$tlon
						));
				} elseif ($find == 'list') {
					return $this->squareAroundsList(array(
							$flat." ".$flon,
							$tlat." ".$tlon
						));
				} else {
					return $this->squareArounds(array(
							$flat." ".$flon,
							$tlat." ".$tlon
						));
				}

			 break;

			case 3:

				$flat = $latlons[0]['lat'];
				$flon = $latlons[0]['lon'];
				$tlat = $latlons[1]['lat'];
				$tlon = $latlons[1]['lon'];
				if($flat < $tlat) {
					// $offset = ($tlat - $flat) / 2;
					$flat = $flat - $offset;
					$tlat = $tlat + $offset;
				} elseif ($flat > $tlat) {
					// $offset = ($flat - $tlat) / 2;
					$flat = $flat + $offset;
					$tlat = $tlat - $offset;
				} else {
					$flat = $flat - $offset;
					$tlat = $tlat + $offset;
				}

				if($flon < $tlon) {
					// $offset = ($tlon - $flon) / 2;
					$flon = $flon - $offset;
					$tlon = $tlon + $offset;
				} elseif ($flon > $tlon) {
					// $offset = ($flon - $tlon) / 2;
					$flon = $flon + $offset;
					$tlon = $tlon - $offset;
				} else {
					$flon = $flon - $offset;
					$tlon = $tlon + $offset;
				}

				if ($find == 'all') {
					return $this->squareAroundMiddles(array(
							$flat." ".$flon,
							$tlat." ".$tlon
						));
				} elseif ($find == 'list') {
					return $this->squareAroundsList(array(
							$flat." ".$flon,
							$tlat." ".$tlon
						));
				} else {
					return $this->squareAroundMiddles(array(
							$flat." ".$flon,
							$tlat." ".$tlon
						));
				}

				break;
			case 1:
				break;
			case 2:
				break;

			default: //　0と一緒

				$flat = $latlons[0]['lat'];
				$flon = $latlons[0]['lon'];
				$tlat = $latlons[1]['lat'];
				$tlon = $latlons[1]['lon'];
				if($flat < $tlat) {
					// $offset = $tlat - $flat;
					$flat = $flat - $offset;
					$tlat = $tlat + $offset;
				} elseif ($flat > $tlat) {
					// $offset = $flat - $tlat;
					$flat = $flat + $offset;
					$tlat = $tlat - $offset;
				} else {
					$flat = $flat - $offset;
					$tlat = $tlat + $offset;
				}

				if($flon < $tlon) {
					// $offset = $tlon - $flon;
					$flon = $flon - $offset;
					$tlon = $tlon + $offset;
				} elseif ($flon > $tlon) {
					// $offset = $flon - $tlon;
					$flon = $flon + $offset;
					$tlon = $tlon - $offset;
				} else {
					$flon = $flon - $offset;
					$tlon = $tlon + $offset;
				}

				if ($find == 'all') {
					return $this->squareArounds(array(
							$flat." ".$flon,
							$tlat." ".$tlon
						));
				} elseif ($find == 'list') {
					return $this->squareAroundsList(array(
							$flat." ".$flon,
							$tlat." ".$tlon
						));
				} else {
					return $this->squareArounds(array(
							$flat." ".$flon,
							$tlat." ".$tlon
						));
				}

				break;
		}

	}


/**
 *
 * squareArounds method
 *
 * @param array ( string (lat lan), string (lat lon) )
 * @return array spots
 *
 * */

	public function squareArounds(array $square) {
		$con = implode(',', $square);
		return $this->find('all', array(
				'conditions' => array(
					"MBRContains(GeomFromText('LINESTRING({$con})'), `Spot`.`latlng`)"
				)
			)
		);
	}


	public function squareAroundMiddles(array $square) {
		$con = implode(',', $square);
		return $this->find('all', array(
				'conditions' => array(
					"MBRContains(GeomFromText('LINESTRING({$con})'), `Spot`.`latlng`)"
				),
				'fields' => array(
					    	"GLength(GeomFromText(CONCAT('LineString(".$square[0].",', X(Spot.latlng), ' ', Y(Spot.latlng),')'))) AS len",
							"`Spot`.`id`",
							" `Spot`.`big_category`",
							" `Spot`.`middle_category`",
							" `Spot`.`small_category`",
							" `Spot`.`big_area`",
							" `Spot`.`small_area`",
							" `Spot`.`information_id`",
							" `Spot`.`kana`",
							" `Spot`.`name`",
							" `Spot`.`introduce`",
							" `Spot`.`passcode`",
							" `Spot`.`address`",
							" `Spot`.`phone`",
							" `Spot`.`fax`",
							" `Spot`.`referrer`",
							" `Spot`.`airport1`",
							" `Spot`.`airport2`",
							" `Spot`.`airport3`",
							" `Spot`.`station1`",
							" `Spot`.`station2`",
							" `Spot`.`station3`",
							" `Spot`.`bus1`",
							" `Spot`.`bus2`",
							" `Spot`.`bus3`",
							" `Spot`.`parking_flag`",
							" `Spot`.`parking_fee`",
							" `Spot`.`access1`",
							" `Spot`.`access2`",
							" `Spot`.`access3`",
							" `Spot`.`manager`",
							" `Spot`.`business_day`",
							" `Spot`.`business_hour`",
							" `Spot`.`url`",
							" `Spot`.`establishment1`",
							" `Spot`.`establishment2`",
							" `Spot`.`establishment3`",
							"X(Spot.latlng) AS lat",
							"Y(Spot.latlng) AS lon",
							"Spot.point"
				),
				'order' => array(
					'len'
				)
			)
		);
	}



	public function squareAroundsList(array $square) {
		$con = implode(',', $square);
		return $this->find('list', array(
				'conditions' => array(
					"MBRContains(GeomFromText('LINESTRING({$con})'), `Spot`.`latlng`)"
				)
			)
		);
	}



	public function circleArounds() {



		//２点間の中心座標
		//半径
		//その1.5倍の半径で計算
	}


/**
 * belongsTo associations
 *
 * @var array
 */
}
