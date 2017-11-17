<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

/**
 * Parks Controller
 *
 * @property Park $Park
 * @property PaginatorComponent $Paginator
 */
class ParksController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    public $paginate = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        if (isset($this->Auth)) {
            $this->Auth->allow(array('map', 'points'));
        }
    }
    
    public function points() {
        $parks = $this->Park->find('all', array(
            'fields' => array(
                'Park.id', 'Park.name', 'Park.longitude', 'Park.latitude',
            ),
            'conditions' => array(
                'Park.longitude IS NOT NULL',
            ),
            'contain' => array(
                'Issue' => array(
                    'fields' => array('Issue.id')
                ),
            ),
        ));
        echo json_encode($parks);
        exit();
    }
    
    public function map() {
        $this->layout = 'map';
    }
    

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index($name = null) {
        $keywords = array();
        $scope = array();
        if (!empty($name)) {
            $name = Sanitize::clean($name);
            $keywords = explode(' ', $name);
            $keywordCount = 0;
            foreach ($keywords AS $k => $keyword) {
                if (++$keywordCount < 5) {
                    $scope[]['OR'] = array(
                        'Park.name LIKE' => "%{$keyword}%",
                        'Park.location LIKE' => "%{$keyword}%",
                    );
                } else {
                    unset($keywords[$k]);
                }
            }
        }
        $this->set('keywords', implode(' ', $keywords));
        
        $this->set('parks', $this->Paginator->paginate($this->Park, $scope));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Park->exists($id)) {
            throw new NotFoundException(__('Invalid park'));
        }
        $options = array('conditions' => array('Park.' . $this->Park->primaryKey => $id));
        $this->set('park', $this->Park->find('first', $options));
        $this->paginate['Issue'] = array(
            'limit' => 24,
            'order' => array('Issue.modified' => 'DESC'),
        );
        $scope = array(
            'Issue.is_active' => 1,
            'Issue.park_id' => $id,
        );
        $this->set('items', $this->paginate($this->Park->Issue, $scope));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Park->create();
            if ($this->Park->save($this->request->data)) {
                $this->Flash->success(__('The park has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The park could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Park->exists($id)) {
            throw new NotFoundException(__('Invalid park'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Park->save($this->request->data)) {
                $this->Flash->success(__('The park has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The park could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Park.' . $this->Park->primaryKey => $id));
            $this->request->data = $this->Park->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Park->id = $id;
        if (!$this->Park->exists()) {
            throw new NotFoundException(__('Invalid park'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Park->delete()) {
            $this->Flash->success(__('The park has been deleted.'));
        } else {
            $this->Flash->error(__('The park could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_api($term = '') {
        echo json_encode($this->Park->find('all', array(
                    'conditions' => array(
                        'name LIKE' => "%{$term}%",
                    ),
                    'limit' => 20,
        )));
        exit();
    }

}
