<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 *
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{
	
			public function initialize() {
				parent::initialize();
				$this->Auth->allow(['logout','autocomplete', 'findEditors']);
			}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Authors', 'Provinces']
        ];
        $books = $this->paginate($this->Books);

        $this->set(compact('books'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['Authors', 'Provinces', 'Categories']
        ]);

        $this->set('book', $book);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEntity();
        if ($this->request->is('post')) {
			
			
            $book = $this->Books->patchEntity($book, $this->request->getData());
			$editor = $this->Books->Editors->findByName($this->request->getData('editor_id'))->first();
			$book->editor_id=$editor['id'];
			
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
		
		$this->loadModel('Countries');
		$countries = $this->Countries->find('list', ['limit' => 200]);
		$countries = $countries->toArray();
        reset($countries);
        $country_id = key($countries);
		$provinces = $this->Books->provinces->find('list', [
            'conditions' => ['Provinces.country_id' => $country_id],
        ]);
        $authors = $this->Books->Authors->find('list', ['limit' => 200]);
        $categories = $this->Books->Categories->find('list', ['limit' => 200]);
		$editors = $this->Books->Editors->find('list', ['limit' => 200]);
        $this->set(compact('book', 'authors', 'provinces', 'categories', 'countries','editors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
		$this->loadModel('Countries');
		$countries = $this->Countries->find('list', ['limit' => 200]);
		$countries = $countries->toArray();
        reset($countries);
        $country_id = key($countries);
		$provinces = $this->Books->provinces->find('list', [
            'conditions' => ['Provinces.country_id' => $country_id],
        ]);
        $authors = $this->Books->Authors->find('list', ['limit' => 200]);
        $categories = $this->Books->Categories->find('list', ['limit' => 200]);
        $this->set(compact('book', 'authors', 'provinces', 'categories', 'countries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function findEditors() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Books->Editors->find('all', array(
                'conditions' => array('Editors.name LIKE ' => '%' . $name . '%')
            ));
            
            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['name']);
            }
            echo json_encode($resultArr);
        }
    }
	
	public function autocomplete() {
        
    }
}
