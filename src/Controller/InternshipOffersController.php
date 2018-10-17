<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * InternshipOffers Controller
 *
 * @property \App\Model\Table\InternshipOffersTable $InternshipOffers
 *
 * @method \App\Model\Entity\InternshipOffer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipOffersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
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
    public function view($id = null) {
        $internshipOffer = $this->InternshipOffers->get($id, [
            'contain' => []
        ]);
        
        $id_official = $internshipOffer['id_official'];
        //trouver le id_official avec le id du internshipOffer
          $officialsTable = TableRegistry::get('Officials');
          $official = $officialsTable->get($id_official,[
              'contain' => []
          ]);
          
        
        

        //ceci permet de transférer des données
        $this->set('internshipOffer', $internshipOffer);
        $this->set('official', $official);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $internshipOffer = $this->InternshipOffers->newEntity();
        if ($this->request->is('post')) {
            $internshipOffer = $this->InternshipOffers->patchEntity($internshipOffer, $this->request->getData());

            $id_user = $this->Auth->user('id');
            
            
          //trouver le id_official avec le id_user
          $officialsTable = TableRegistry::get('Officials');
          $query = $officialsTable->find()->select(['id'])->where(['id_user' => $id_user ]); 
  
          foreach ($query as $off) {
              $id_official = $off['id'];
          }

          //ajout des informations cachées dans le formulaire (id_user ET id_official)
          $internshipOffer->id_user = $id_user;
          $internshipOffer->id_official = $id_official;

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
    public function edit($id = null) {
        $internshipOffer = $this->InternshipOffers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internshipOffer = $this->InternshipOffers->patchEntity($internshipOffer, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);


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
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $internshipOffer = $this->InternshipOffers->get($id);
        if ($this->InternshipOffers->delete($internshipOffer)) {
            $this->Flash->success(__('The internship offer has been deleted.'));
        } else {
            $this->Flash->error(__('The internship offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        if ($user['type'] == "1") {
            if (in_array($action, ['view'])) {
                return true;
            }
        } else if ($user['type'] == "0") {
            // The add and tags actions are always allowed to logged in users.
            if (in_array($action, ['view'])) {
                return true;
            }
        } else if ($user['type'] == "2") {
            // users de type Officials peuvent add et view
            if (in_array($action, ['add', 'view'])) {
                return true;
            }
        }
        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the article belongs to the current user.
        $internshipOffer = $this->InternshipOffers->get($id);
        return $internshipOffer->id_user === $user['id'];
    }

}
