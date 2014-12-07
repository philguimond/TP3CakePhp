<?php

App::uses('AppController', 'Controller');

/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $helpers = array('Js');
    public $components = array('Paginator', 'Session', 'RequestHandler');

    /**
     * index method
     *
     * @return void
     */
	 
	 
    public function index() {
        $this->Product->contain('Sale', 'User', 'Subcategory');
        $this->set('products', $this->paginate());
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $productId = (int) $this->request->params['pass'][0];
            if ($this->Product->isOwnedBy($productId, $user['id'])) {
                return true;
            }

            if (!(isset($user['role']) && $user['role'] === 'admin')) {
                $this->Session->setFlash('This products doesn\'t belong to you', 'flash/error');
            }
        }

        return parent::isAuthorized($user);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $this->set('product', $this->Product->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $productNames = $this->Product->getProductNames($term);
            $this->set(compact('productNames'));
            $this->set('_serialize', 'productNames');
        }

        if ($this->request->is('post')) {
            $this->Product->create();
            $this->request->data['Product']['user_id'] = $this->Auth->user('id');
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $categories = $this->Product->Subcategory->Category->find('list');
        $subcategories = array('Choisir categorie');
        
        $users = $this->Product->User->find('list');
        $sales = $this->Product->Sale->find('list');
		
        $this->set(compact('users', 'sales','categories', 'subcategories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
	if($this->Session->read('Auth.User.active') == 1){
			$this->Product->id = $id;
			if (!$this->Product->exists($id)) {
				throw new NotFoundException(__('Invalid product'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {

				if ($this->Product->save($this->request->data)) {

					$this->Session->setFlash(__('The product has been saved'), 'flash/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash/error');
				}
			} else {
				$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
				$this->request->data = $this->Product->find('first', $options);
			}
			$categories = $this->Product->Subcategory->Category->find('list');
			$subcategories = array('Choisir categorie');
			$users = $this->Product->User->find('list');
			$sales = $this->Product->Sale->find('list');
			$this->set(compact('users', 'sales','categories', 'subcategories'));
		} else{
			$this->redirect(array('controller' => 'users','action' => 'restriction'));
		}
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->Product->delete()) {
            $this->Session->setFlash(__('Product deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Product was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Product->recursive = 0;
        $this->set('products', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $this->set('product', $this->Product->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Product->create();
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $users = $this->Product->User->find('list');
        $sales = $this->Product->Sale->find('list');
        $this->set(compact('users', 'sales'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
            $this->request->data = $this->Product->find('first', $options);
        }
        $users = $this->Product->User->find('list');
        $sales = $this->Product->Sale->find('list');
        $this->set(compact('users', 'sales'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->Product->delete()) {
            $this->Session->setFlash(__('Product deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Product was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
