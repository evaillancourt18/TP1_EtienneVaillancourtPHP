<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Provinces Controller
 *
 * @property \App\Model\Table\ProvincesTable $Provinces
 *
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProvincesController extends AppController
{
	
	 public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByCountry']);
    }
	
    public function getByCountry() {
        $country_id = $this->request->query('country_id');

        $provinces = $this->Provinces->find('all', [
            'conditions' => ['provinces.country_id' => $country_id],
        ]);
        $this->set('provinces', $provinces);
        $this->set('_serialize', ['provinces']);
    }	

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countries']
        ];
        $provinces = $this->paginate($this->Provinces);

        $this->set(compact('provinces'));
    }

    /**
     * View method
     *
     * @param string|null $id Province id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $province = $this->Provinces->get($id, [
            'contain' => ['Countries', 'Books']
        ]);

        $this->set('province', $province);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $province = $this->Provinces->newEntity();
        if ($this->request->is('post')) {
            $province = $this->Provinces->patchEntity($province, $this->request->getData());
            if ($this->Provinces->save($province)) {
                $this->Flash->success(__('The province has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The province could not be saved. Please, try again.'));
        }
        $countries = $this->Provinces->Countries->find('list', ['limit' => 200]);
        $this->set(compact('province', 'countries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Province id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $province = $this->Provinces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $province = $this->Provinces->patchEntity($province, $this->request->getData());
            if ($this->Provinces->save($province)) {
                $this->Flash->success(__('The province has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The province could not be saved. Please, try again.'));
        }
        $countries = $this->Provinces->Countries->find('list', ['limit' => 200]);
        $this->set(compact('province', 'countries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Province id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $province = $this->Provinces->get($id);
        if ($this->Provinces->delete($province)) {
            $this->Flash->success(__('The province has been deleted.'));
        } else {
            $this->Flash->error(__('The province could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
