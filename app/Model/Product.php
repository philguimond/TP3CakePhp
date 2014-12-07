<?php

App::uses('AppModel', 'Model');

/**
 * Product Model
 *
 * @property User $User
 * @property Sale $Sale
 */
class Product extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'description' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'price' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'image_file' => array(
            'rule1' => array(
                'rule' => array('fileSize', '<=', '1MB'),
                'message' => 'Le fichier doit être de 1MB ou moins',
            ),
            'rule2' => array(
                'rule' => array('fileExtension', array('jpg', 'jpeg', 'png', 'gif')),
                'message' => 'Vous ne pouvez envoyer qe des jpg, png et gif',
                'allowEmpty' => true
            )
        )
    );

    public function getProductNames($term = null) {
        if (!empty($term)) {
            $products = $this->find('list', array(
                'conditions' => array(
                    'name LIKE' => trim($term) . '%'
                )
            ));
            return $products;
        }
        return false;
    }

    public function fileExtension($check, $extensions, $allowEmpty = true) {
        $file = current($check);
        if ($allowEmpty && empty($file['tmp_name'])) {
            return true;
        }

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        return in_array($extension, $extensions);
    }

    public function beforeDelete($cascade = true) {
        $oldExtension = $this->field('image');
        $oldFile = IMAGES . 'imgProduit' . DS . $this->id . '.' . $oldExtension;
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }
    }

    public function afterSave($created, $options = Array()) {
        if (isset($this->data[$this->alias]['image_file']['tmp_name'])) {
            $file = $this->data[$this->alias]['image_file'];
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if (!empty($file['tmp_name'])) {
                $oldExtension = $this->field('image');
                $oldFile = IMAGES . 'imgProduit' . DS . $this->id . '.' . $oldExtension;
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
                move_uploaded_file($file['tmp_name'], IMAGES . 'imgProduit' . DS . $this->id . '.' . $extension);
                $this->saveField('image', $extension);
            }
        }
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'subcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $actsAs = array('Containable');
    public $hasAndBelongsToMany = array(
        'Sale' => array(
            'className' => 'Sale',
            'joinTable' => 'products_sales',
            'foreignKey' => 'product_id',
            'associationForeignKey' => 'sale_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

    public function isOwnedBy($product, $user) {
        return $this->field('id', array('id' => $product, 'user_id' => $user)) !== false;
    }

}
