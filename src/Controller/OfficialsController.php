<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Officials Controller
 *
 * @property \App\Model\Table\OfficialsTable $Officials
 *
 * @method \App\Model\Entity\Official[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OfficialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $officials = $this->paginate($this->Officials);

        $this->set(compact('officials'));
    }

    /**
     * View method
     *
     * @param string|null $id Official id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $official = $this->Officials->get($id, [
            'contain' => []
        ]);

        $this->set('official', $official);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $official = $this->Officials->newEntity();
        if ($this->request->is('post')) {
            $official = $this->Officials->patchEntity($official, $this->request->getData());
            if ($this->Officials->save($official)) {
                $this->Flash->success(__('The official has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The official could not be saved. Please, try again.'));
        }
        $this->set(compact('official'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Official id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $official = $this->Officials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $official = $this->Officials->patchEntity($official, $this->request->getData());
            if ($this->Officials->save($official)) {
                $this->Flash->success(__('The official has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The official could not be saved. Please, try again.'));
        }
        $this->set(compact('official'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Official id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $official = $this->Officials->get($id);
        if ($this->Officials->delete($official)) {
            $this->Flash->success(__('The official has been deleted.'));
        } else {
            $this->Flash->error(__('The official could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
