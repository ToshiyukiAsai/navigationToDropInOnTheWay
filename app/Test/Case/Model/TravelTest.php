<?php
App::uses('Travel', 'Model');

/**
 * Travel Test Case
 *
 */
class TravelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.travel',
		'app.log'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Travel = ClassRegistry::init('Travel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Travel);

		parent::tearDown();
	}

}
