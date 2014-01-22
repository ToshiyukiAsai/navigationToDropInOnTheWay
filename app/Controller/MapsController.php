<?php
App::uses('AppController', 'Controller');
/**
 * Maps Controller
 *
 */

class MapsController extends AppController {


	public function index() {
		$this->layout = 'maps';
	}
}