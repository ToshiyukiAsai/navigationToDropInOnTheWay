<?php
App::uses('AppController', 'Controller');
/**
 * Routes Controller
 *
 * @property Route $Route
 * @property PaginatorComponent $Paginator
 */
class RoutesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Route->recursive = 0;
		$this->set('routes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Route->exists($id)) {
			throw new NotFoundException(__('Invalid route'));
		}
		$options = array('conditions' => array('Route.' . $this->Route->primaryKey => $id));
		$this->set('route', $this->Route->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Route->create();
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		}
		$links = $this->Route->Link->find('list');
		$this->set(compact('links'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Route->exists($id)) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Route.' . $this->Route->primaryKey => $id));
			$this->request->data = $this->Route->find('first', $options);
		}
		$links = $this->Route->Link->find('list');
		$this->set(compact('links'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Route->delete()) {
			$this->Session->setFlash(__('The route has been deleted.'));
		} else {
			$this->Session->setFlash(__('The route could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
