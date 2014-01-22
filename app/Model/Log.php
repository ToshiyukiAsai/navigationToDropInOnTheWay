<?php
App::uses('AppModel', 'Model');
/**
 * Log Model
 *
 * @property Travel $Travel
 */
class Log extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Travel' => array(
			'className' => 'Travel',
			'foreignKey' => 'travel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
