<?php
App::uses('AppController', 'Controller');

class ColorsController extends AppController {

    public $components = array('RequestHandler');

    public function index(){
         if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $colorNames = $this->Color->getColorNames('B');
            $this->set(compact('colorNames'));
            $this->set('_serialize', 'colorNames');
        } else {
            $term = $this->request->query('term');
            $colorNames = $this->Color->getColorNames('B');
            $this->set(compact('colorNames'));
            $this->set('_serialize', 'colorNames');
        }
    }
    
    public function get_Color_Names() {
        if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $colorNames = $this->Color->getColorNames($term);
            $this->set(compact('colorNames'));
            $this->set('_serialize', 'colorNames');
        }
    }

}
