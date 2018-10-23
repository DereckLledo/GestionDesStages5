<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Officials Controller
 *
 * @property \App\Model\Table\OfficialsTable $Officials
 *
 * @method \App\Model\Entity\Official[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OfficialsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
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
    public function view($id = null) {
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
    public function add() {
        $official = $this->Officials->newEntity();
        if ($this->request->is('post')) {
            $official = $this->Officials->patchEntity($official, $this->request->getData());

            $official->user_id = $this->Auth->user('id');

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
    public function edit($id = null) {
        $official = $this->Officials->get($id, [
            'contain' => []
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $official = $this->Officials->patchEntity($official, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Officials->save($official)) {
                $this->Flash->success(__('The official has been saved.'));

                //TODO: Rediriger vers le view du official qui vient d'être modifier
                return $this->redirect('\\');
            }
            $this->Flash->error(__('The official could not be saved. Please, try again.'));
        }
        $this->set(compact('official'));
    }

    public function miseAJour($id = null) {
        $official = $this->Officials->get($id, [
            'contain' => []
        ]);

        $official['verifier'] = 1;

        if ($this->Officials->save($official)) {
            return $this->redirect(['controller'=>'Emails', 'action'=>'verifierMiseAJour']);
        }
        $this->Flash->error(__('The official could not be saved. Please, try again.'));
    }

    public function modifier() {
        //id du user connecté
        $id_user = $this->Auth->user('id');


        $officialsTable = TableRegistry::get('Officials');
        $query = $officialsTable->find()->select(['id'])->where(['id_user' => $id_user]);

        foreach ($query as $row) {
            $id_official = $row['id'];
        }
        //redirection
        return $this->redirect('/Officials/Edit/' . $id_official);
    }

    /**
     * Delete method
     *
     * @param string|null $id Official id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $official = $this->Officials->get($id);
        if ($this->Officials->delete($official)) {
            $this->Flash->success(__('The official has been deleted.'));
        } else {
            $this->Flash->error(__('The official could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {


        $action = $this->request->getParam('action');

        //coordinators ont le droit de modifier les officials
        if ($user['type'] == "1") {
            return true;

            //les Officials ont seulement le droit de modifier leur propres profil
        } else if ($user['type'] == "2") {

            if (in_array($action, ['view', 'edit'])) {

                $id_official = $this->request->getParam('pass.0');
                $id_user = $user['id'];

                $official = $this->Officials->get($id_official, [
                    'contain' => []
                ]);

                //si la foreing key du official 'id_user' est = au ID du user en cours, il est autorisé à modifier
                if ($official['id_user'] == $id_user) {
                    return true;
                } else {
                    return false;
                }
            }
        } else if ($user['type'] == "0") {
            return false;
        }

        // authorize l'access a modifier() pour les officials
        if (in_array($action, ['modifier']) && $user['type'] == "2") {
            return true;
        }

        return false;
    }

}
