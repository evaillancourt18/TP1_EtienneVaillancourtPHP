<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{

      public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'sortWhitelist' => [
            'id', 'name', 'created', 'modified'
        ]
    ];
}
