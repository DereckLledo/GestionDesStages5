<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InternshipOffers Controller
 *
 * @property \App\Model\Table\InternshipOffersTable $InternshipOffers
 *
 * @method \App\Model\Entity\InternshipOffer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipOffersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $internshipOffers = $this->paginate($this->InternshipOffers);

        $this->set(compact('internshipOffers'));
    }

    /**
     * View method
     *
     * @param string|null $id Internship Offer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $internshipOffer = $this->InternshipOffers->get($id, [
            'contain' => []
        ]);

        $this->set('internshipOffer', $internshipOffer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $internshipOffer = $this->InternshipOffers->newEntity();
        if ($this->request->is('post')) {
            $internshipOffer = $this->InternshipOffers->patchEntity($internshipOffer, $this->request->getData());
            if ($this->InternshipOffers->save($internshipOffer)) {
                $this->Flash->success(__('The internship offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship offer could not be saved. Please, try again.'));
        }
        $this->set(compact('internshipOffer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Internship Offer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $internshipOffer = $this->InternshipOffers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internshipOffer = $this->InternshipOffers->patchEntity($internshipOffer, $this->request->getData());
            if ($this->InternshipOffers->save($internshipOffer)) {
                $this->Flash->success(__('The internship offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship offer could not be saved. Please, try again.'));
        }
        $this->set(compact('internshipOffer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internship Offer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $internshipOffer = $this->InternshipOffers->get($id);
        if ($this->InternshipOffers->delete($internshipOffer)) {
            $this->Flash->success(__('The internship offer has been deleted.'));
        } else {
            $this->Flash->error(__('The internship offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
