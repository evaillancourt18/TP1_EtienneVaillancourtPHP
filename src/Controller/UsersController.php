<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Authors']
        ]);

        $this->set('user', $user);
    }
	
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'Books','action' =>  'index']);
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
	
	    public function logout() {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
	

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            $user->activation_key = $activation_key = Text::uuid();
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user);
                if($this->sendEmail($user)) {
                    $this->Flash->success(__('The user has been saved and an activation email has been sent.'));
                } else {
                    $this->Flash->error(__("The user has been saved, but the activation email could not be sent."));
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
	
	    public function addVisitor()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            $user->activation_key = $activation_key = Text::uuid();
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user);
                if($this->sendEmail($user)) {
                    $this->Flash->success(__('The user has been saved and an activation email has been sent.'));
                } else {
                    $this->Flash->error(__("The user has been saved, but the activation email could not be sent."));
                }
                return $this->redirect(['controller' => 'books' , 'action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    



    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	 public function isAuthorized($user){
		 
		 $action = $this->request->getParam('action');

			if(in_array($action,['add','edit','delete','view','index'])){
       
				if ($user['type']==2){
                    return true;
        }else{
            return false;
        }
        
		 
			}
	 }
	 
	 public function aPropos()
    {

    }
	
	public function activate($activation_key = null) {
        $user = $this->Users->findByActivationKey($activation_key)->first();
		$user->type=1;
		

            if($this->Users->save($user)) {
                $this->Flash->success(__('The account ' . $user->email  . ' has been activated.'));
				$this->Auth->setUser($user);
				return $this->redirect(['controller'=>'books','action' => 'index']);

            
        }
		$this->Flash->error(__("The account could not be found or it's activated already."));
    }
	
	public function sendEmail($user){
		$success = true;
		$confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/activate/" . $user->activation_key;
		
		try{
			$email = new Email('default');
            $email->to($user->email);
            $email->subject(__('Activate your account'));
            $email->send(__('Activation link:') . ' ' . $confirmation_link);
		} catch (Exception $ex){
			$success = false;
		}
		return $success;
	}
}
