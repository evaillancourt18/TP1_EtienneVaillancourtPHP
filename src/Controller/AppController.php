<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

use Cake\Event\Event;

use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	
	use \Crud\Controller\ControllerTrait;

    public $components = [
        'RequestHandler',
        'Crud.Crud' => [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete'
            ],
        ]
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
		I18n::setLocale($this->request->session()->read('Config.language'));
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
    $this->loadComponent('Auth', [
        // Added this line
        'authorize'=> 'Controller',
        'authenticate' => [
            'Form' => [
                'fields' => [
                    'username' => 'email',
                    'password' => 'password'
                ]
            ]
        ],
        'loginAction' => [
            'controller' => 'Users',
            'action' => 'login'
        ],
         // If unauthorized, return them to page they were just on
        'unauthorizedRedirect' => $this->referer()
    ]);

    // Allow the display action so our pages controller
    // continues to work. Also enable the read only actions.
    $this->Auth->allow(['display','changelang','addVisitor','aPropos','activate','login','categoryAction','getCountries']);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        $this->loadComponent('Security');
    }
    
    public function isAuthorized($user){
	
	$action = $this->request->getParam('action');
	

	if(in_array($action,['add'])){
       
		if ($user['type']==5 || $user['type']==2){
                    return true;
                }
                
        }else if(in_array($action,['edit','delete'])){
            if ($user['type']==2){
                return true;
            }
            
        }else if(in_array($action,['view','index'])){
			if ($user!=null){
            return true;
			}
        else{
            return false;
        }
        }
    }
	
	public function changeLang($lang = 'en_US') {
    I18n::setLocale($lang);
    $this->request->session()->write('Config.language', $lang);
    return $this->redirect($this->request->referer());
}
}
                
