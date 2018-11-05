<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Editors Controller
 *
 * @property \App\Model\Table\EditorsTable $Editors
 *
 * @method \App\Model\Entity\Editor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EditorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $editors = $this->paginate($this->Editors);

        $this->set(compact('editors'));
    }

    /**
     * View method
     *
     * @param string|null $id Editor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $editor = $this->Editors->get($id, [
            'contain' => []
        ]);

        $this->set('editor', $editor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $editor = $this->Editors->newEntity();
        if ($this->request->is('post')) {
            $editor = $this->Editors->patchEntity($editor, $this->request->getData());
            if ($this->Editors->save($editor)) {
                $this->Flash->success(__('The editor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The editor could not be saved. Please, try again.'));
        }
        $this->set(compact('editor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Editor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $editor = $this->Editors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $editor = $this->Editors->patchEntity($editor, $this->request->getData());
            if ($this->Editors->save($editor)) {
                $this->Flash->success(__('The editor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The editor could not be saved. Please, try again.'));
        }
        $this->set(compact('editor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Editor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $editor = $this->Editors->get($id);
        if ($this->Editors->delete($editor)) {
            $this->Flash->success(__('The editor has been deleted.'));
        } else {
            $this->Flash->error(__('The editor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
