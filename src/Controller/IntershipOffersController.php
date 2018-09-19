<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IntershipOffers Controller
 *
 * @property \App\Model\Table\IntershipOffersTable $IntershipOffers
 *
 * @method \App\Model\Entity\IntershipOffer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IntershipOffersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $intershipOffers = $this->paginate($this->IntershipOffers);

        $this->set(compact('intershipOffers'));
    }

    /**
     * View method
     *
     * @param string|null $id Intership Offer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $intershipOffer = $this->IntershipOffers->get($id, [
            'contain' => []
        ]);

        $this->set('intershipOffer', $intershipOffer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $intershipOffer = $this->IntershipOffers->newEntity();
        if ($this->request->is('post')) {
            $intershipOffer = $this->IntershipOffers->patchEntity($intershipOffer, $this->request->getData());
            if ($this->IntershipOffers->save($intershipOffer)) {
                $this->Flash->success(__('The intership offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intership offer could not be saved. Please, try again.'));
        }
        $this->set(compact('intershipOffer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Intership Offer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $intershipOffer = $this->IntershipOffers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intershipOffer = $this->IntershipOffers->patchEntity($intershipOffer, $this->request->getData());
            if ($this->IntershipOffers->save($intershipOffer)) {
                $this->Flash->success(__('The intership offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intership offer could not be saved. Please, try again.'));
        }
        $this->set(compact('intershipOffer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Intership Offer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intershipOffer = $this->IntershipOffers->get($id);
        if ($this->IntershipOffers->delete($intershipOffer)) {
            $this->Flash->success(__('The intership offer has been deleted.'));
        } else {
            $this->Flash->error(__('The intership offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
